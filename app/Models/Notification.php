<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    const TYPES = [
        'order_confirmation' => 'Confirmation de commande',
        'manager_alert' => 'Alerte gestionnaire',
        'invoice' => 'Facture'
    ];

    protected $fillable = [
        'user_id',
        'type',
        'content',
        'sent_at'
    ];

    protected $casts = [
        'sent_at' => 'datetime'
    ];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopeUnsent($query)
    {
        return $query->whereNull('sent_at');
    }

    public function getTypeLabelAttribute()
    {
        return self::TYPES[$this->type] ?? $this->type;
    }
}