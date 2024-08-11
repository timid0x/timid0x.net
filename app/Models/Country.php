<?php
###### Sat Jun 3 12:02:10 COT 2023

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model

{
    use HasFactory;

    protected $fillable = [
        'name', 'code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function friend_code()
    {
        return $this->hasMany(Friendcode::class, 'country_id');
    }
}
