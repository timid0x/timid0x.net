<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type'
    ];

    //scope para Filter Livewire
    public function scopeVerifyFamily($query, $family_id)
    {
        $query->when($family_id, function ($query) use ($family_id) {
            $query->whereHas('products.subcategory.category', function ($query) use ($family_id) {
                $query->where('family_id', $family_id);
            })->with([
                'features' => function ($query) use ($family_id) {
                    $query->whereHas('variants.product.subcategory.category', function ($query) use ($family_id) {
                        $query->where('family_id', $family_id);
                    });
                }

            ]);
        });
    }

    //scope para Filter Livewire
    public function scopeVerifyCategory($query, $category_id)
    {
        $query->when($category_id, function ($query) use ($category_id){
            $query->whereHas('products.subcategory', function ($query)use ($category_id) {
                $query->where('category_id', $category_id);
            })->with([
                'features' => function ($query) use ($category_id){
                    $query->whereHas('variants.product.subcategory', function ($query) use ($category_id){
                        $query->where('category_id', $category_id);
                    });
                }

            ]);
        });
    }


    //scope para Filter Livewire
    public function scopeVerifySubcategory($query, $subcategory_id)
    {
        $query->when($subcategory_id, function ($query) use ($subcategory_id){
            $query->whereHas('products', function ($query)use ($subcategory_id) {
                $query->where('subcategory_id', $subcategory_id);
            })->with([
                'features' => function ($query) use ($subcategory_id) {
                    $query->whereHas('variants.product', function ($query) use ($subcategory_id){
                        $query->where('subcategory_id', $subcategory_id);
                    });
                }

            ]);
        });
    }



    //Relación muchos a muchos, de prod a opcions
    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->using(OptionProduct::class)
            ->withPivot('features')
            ->withTimestamps();
    }

    //Relación muchos a muchos, de opt a feat
    public function features()
    {
        return $this->hasMany(Feature::class);
    }
}
