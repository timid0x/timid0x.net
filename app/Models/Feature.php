<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'value', 'description','order','option_id'
    ];

    //Relación 1 a muchos inversa, de feat a opt
    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    //Relación M a muchos , de feat a var
    public function variants()
    {
        return $this->belongsToMany(Variant::class)
            ->withTimestamps();
    }


}
