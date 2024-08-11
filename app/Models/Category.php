<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'family_id'
    ];

    //Relación 1 a muchos inversa, de Categoría a Family
    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    //Relación 1 a muchos Categoría a Subcategoría
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

}
