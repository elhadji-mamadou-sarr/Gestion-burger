<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;


    protected $table = 'categories'; // Nom de la table

    protected $fillable = ['nom', 'description']; // Champs modifiables

    /**
     * Relation avec les burgers (si une catégorie a plusieurs burgers)
     */
    public function burgers()
    {
        return $this->hasMany(Product::class);
    }
    

}
