<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku', 'name', 'image_path', 'product_id','stock'
    ];

    protected function image():Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->image_path ? Storage::url($this->image_path): asset('assets/images/image-notfound.png'), 
        );
        
    }

    //Relación 1 a muchos inversa, de prod a subcat
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //Relación M a muchos , de feat a var
    public function features()
    {
        return $this->belongsToMany(Feature::class)
            ->withTimestamps();
    }


}
