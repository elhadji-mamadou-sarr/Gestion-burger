<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUSES = [
        'pending' => 'En attente',
        'preparing' => 'En préparation',
        'ready' => 'Prête',
        'paid' => 'Payée'
    ];
    

    protected $fillable = [
        'user_id',
        'status',
        'total_amount'
    ];

    protected $casts = [
        'status' => 'string',
        'total_amount' => 'decimal:2',
        'created_at' => 'datetime:Y-m-d H:i:s'
    ];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot('quantity');
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    // Méthodes personnalisées
    public function getStatusLabelAttribute()
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }

    public function isPaid()
    {
        return $this->status === 'paid';
    }

    public function updateStatus(string $status) {
        $this->update(['status' => $status]);
    }
    
    public function restoreStock() {
        $this->products->each(function ($product) {
            $product->increment('stock', $product->pivot->quantity);
            $product->updateAvailability();
        });
    }
    
    public function recordPayment(array $data) {
        $this->payment()->create([
            'amount' => $data['amount'],
            'method' => 'cash',
            'payment_date' => $data['payment_date']
        ]);
        
        $this->update(['status' => 'paid']);
    }




}