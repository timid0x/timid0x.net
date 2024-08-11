<?php
###### Sat Jun 3 12:02:22 COT 2023

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedalType extends Model
{
    use HasFactory;

    protected $table = 'medaltypes';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
