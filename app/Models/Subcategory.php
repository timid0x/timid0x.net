<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category_id'
    ];

    //Relación 1 a muchos inversa, de Subcat a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Relación 1 a muchos, de subcat a productos
    public function products()
    {
        return $this->hasMany(Product::class);
    }



}
