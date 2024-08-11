<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    //Relación 1 a muchos
    public function categories(){
        return $this->hasMany(Category::class);
    }

}
