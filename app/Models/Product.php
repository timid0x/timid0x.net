<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'sku', 'name', 'description', 'image_path', 'price', 'subcategory_id', 'stock'
    ];


    //factorizar query Filter
    public function scopeVerifyFamily($query, $family_id)
    {
        $query->when($family_id, function ($query) use ($family_id) {
            $query->whereHas('subcategory.category', function ($query) use ($family_id) {
                $query->where('family_id', $family_id);
            });
        });
    }

    //factorizar query Filter
    public function scopeVerifyCategory($query, $category_id)
    {
        $query->when($category_id, function ($query) use ($category_id) {
            $query->whereHas('subcategory', function ($query) use ($category_id) {
                $query->where('category_id', $category_id);
            });
        });
    }


    //factorizar query Filter
    public function scopeVerifySubcategory($query, $subcategory_id)
    {
        $query->when($subcategory_id, function ($query) use ($subcategory_id) {
            $query->where('subcategory_id', $subcategory_id);
        });
    }


    //factorizar query Filter
    public function scopeVerifySelectFeatures($query, $selected_features)
    {
        $query->when($selected_features, function ($query) use ($selected_features){
            $query->whereHas('variants.features', function ($query) use ($selected_features){
                $query->whereIn('features.id', $selected_features);
            });
        });
    }


    //factorizar query Filter
    public function scopeCustomOrder($query, $orderBy)
    {
        $query->when($orderBy == 1, function ($query) {
            $query->orderBy('created_at', 'desc');
        })
            ->when($orderBy == 2, function ($query) {
                $query->orderBy('price', 'desc');
            })
            ->when($orderBy == 3, function ($query) {
                $query->orderBy('price', 'asc');
            });
    }


    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn () => Storage::url($this->image_path),
        );
    }

    //Relación 1 a muchos inversa, de prod a subcat
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    //Relación 1 a muchos , de prod a var
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }


    //Relación muchos a muchos , de prod a opt
    public function options()
    {
        return $this->belongsToMany(Option::class)
            ->using(OptionProduct::class)
            ->withPivot('features')
            ->withTimestamps();
    }

    public function producto_imagenes()
    {
        return $this->hasMany(ProductImage::class);
    }


}
