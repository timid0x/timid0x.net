<?php
### TIMID0x - 2023-11-14T13:25:32.000-05:00
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Friendcode;
use App\Models\Country;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    //



    public function showCodes(Request $request)
    {

        $result = Friendcode::all()->count();

        if ($result > 0) {

            //dd(request()->all);
            $codes = Friendcode::query()
                ->with('country_code')
                ->orderBy('updated_at', 'DESC')
                ->SearchOnFriendcodes(request(['team_id2','country_id2']))
                ->paginate(15);

            //dd($queryBuilder);

             /*if (request('team_id2') ?? false) {
                $query->when($params['name'] ?? false, function($query, $name) {
                    $filters = explode(' ', $name);
                    $query->where('first_name','LIKE','%'.$filters[0].'%')
                        ->orWhere('last_name','LIKE','%'.$filters[1].'%');
                }); 
              //test code video youtube
            }*/

          
            //$codes = Friendcode::get()->toQuery()->orderBy('updated_at', 'desc')->paginate(10);

        } else {
            $codes = null;
        }
        //dd( $codes);
        $countries = Country::all();

        $request->session()->put('selected_team_id2', $request->input('team_id2'));
        $request->session()->put('selected_country_id2', $request->input('country_id2'));

        return view("friendcode.list-code", compact('codes', 'countries'));
    }

    public function createCodes(Request $request)
    {
        //dd( $request);
        $registro = request()->all();
        $registro['code'] = Str::replace(' ', '', $registro['code']);
        $registro['team_id'] = Str::replace(' ', '', $registro['team_id']);
        $registro['country_id'] = Str::replace(' ', '', $registro['country_id']);
        $registro['trainer_type'] = Str::replace(' ', '', $registro['trainer_type']);

        request()->replace($registro);

        $incomingFields = $request->validate([
            'code' => 'required|digits:12',
            'team_id' => 'required',
            'country_id' => 'required',
            'trainer_type' => 'required',

        ]);

        //dd($incomingFields);

        $incomingFields['code'] = strip_tags($incomingFields['code']);
        $incomingFields['team_id'] = strip_tags($incomingFields['team_id']);
        $incomingFields['country_id'] = strip_tags($incomingFields['country_id']);
        $incomingFields['trainer_type'] = strip_tags($incomingFields['trainer_type']);

        //dd($incomingFields);
        $flight = Friendcode::updateOrCreate(
            ['code' => $incomingFields['code']],
            [
                'team_id' => $incomingFields['team_id'],
                'country_id' => $incomingFields['country_id'],
                'trainer_type' => $incomingFields['trainer_type'],
                'updated_at' =>  now(),


            ]


        );
        $flight->touch();


        //Friendcode::create($incomingFields);
        return redirect('/friendcode')->with('success', 'Thanks you for adding!!');
    }
}
