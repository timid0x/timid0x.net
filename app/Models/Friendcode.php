<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friendcode extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id', 'team_id', 'trainer_type', 'code'
    ];

    public function country_code()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function scopeSearchOnFriendcodes($query, array $params)
    {
        $query->where(function($query) use ($params){
            $query->when($params['team_id2'] ?? false, function($query, $team_id2){
                $query->where('team_id', '=', $team_id2);
        });

        })
        ->when($params['country_id2'] ?? false, function($query , $country_id2){
            $query -> whereExists(function($query) use ($country_id2){
                $query -> from('countries')
                ->whereColumn('countries.id','friendcodes.country_id')
                ->where('countries.name','LIKE', '%'.$country_id2 .'%' );
            });
        });
    }
}
