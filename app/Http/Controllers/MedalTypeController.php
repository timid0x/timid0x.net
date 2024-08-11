<?php
### TIMID0x - 2023-06-12T17:04:55.000-05:00

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\MedalType;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;



class MedalTypeController extends Controller
{


    public function deleteMedalType(MedalType $medaltype)
    {

        if (auth()->user()->id === $medaltype['user_id']) {
            $medaltype->delete();
        }

        return redirect('/medaltype');
    }


    public function showMedalType(MedalType $medaltypes)
    {
        /*    if(auth()->user()->id !==$medal['user_id']){
            return redirect('/');
        } */
        $medals = MedalType::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $lastRecordDate = MedalType::where('user_id', Auth::user()->id)->select('created_at')->latest('created_at')->first();

        if (!$lastRecordDate) {
            // handle the case where the 'date' parameter is missing
        } else {
            $lastRecordDate = Carbon::parse($lastRecordDate['created_at'])->format('Y-m-d');
        }


        return view('main-medaltype', compact('medals', 'lastRecordDate'));
    }

    public function showCreateMedalType(MedalType $medaltypes)
    {
        /*    if(auth()->user()->id !==$medal['user_id']){
               return redirect('/');
           } */
        $medals = MedalType::where('user_id', Auth::user()->id)->latest('created_at')->first();


        return view('main-medaltype-create', compact('medals'));
    }

    public function createMedalType(Request $request)
    {

        $medals = request()->all();
        // $medals['schoolkid'] = trim($medals['schoolkid']);
        $medals['schoolkid'] = Str::replace(' ', '', $medals['schoolkid']);
        $medals['black_belt'] = Str::replace(' ', '', $medals['black_belt']);
        $medals['bird_keeper'] = Str::replace(' ', '', $medals['bird_keeper']);
        $medals['punk_girl'] = Str::replace(' ', '', $medals['punk_girl']);
        $medals['ruin_maniac'] = Str::replace(' ', '', $medals['ruin_maniac']);
        $medals['hiker'] = Str::replace(' ', '', $medals['hiker']);
        $medals['bug_catcher'] = Str::replace(' ', '', $medals['bug_catcher']);
        $medals['hex_maniac'] = Str::replace(' ', '', $medals['hex_maniac']);
        $medals['rail_staff'] = Str::replace(' ', '', $medals['rail_staff']);
        $medals['schoolkid'] = Str::replace(' ', '', $medals['schoolkid']);
        $medals['kindler'] = Str::replace(' ', '', $medals['kindler']);
        $medals['swimmer'] = Str::replace(' ', '', $medals['swimmer']);
        $medals['gardener'] = Str::replace(' ', '', $medals['gardener']);
        $medals['rocker'] = Str::replace(' ', '', $medals['rocker']);
        $medals['psychic'] = Str::replace(' ', '', $medals['psychic']);
        $medals['skier'] = Str::replace(' ', '', $medals['skier']);
        $medals['dragon_tamer'] = Str::replace(' ', '', $medals['dragon_tamer']);
        $medals['delinquent'] = Str::replace(' ', '', $medals['delinquent']);
        $medals['fairytale_girl'] = Str::replace(' ', '', $medals['fairytale_girl']);
        request()->replace($medals);
        //dd($medals );


        $medals = MedalType::where('user_id', Auth::user()->id)->latest('created_at')->first();

        if (empty($medals)) {
            $medals = new MedalType([
                'schoolkid' => 0,
                'black_belt' => 0,
                'bird_keeper' => 0,
                'punk_girl' => 0,
                'ruin_maniac' => 0,
                'hiker' => 0,
                'bug_catcher' => 0,
                'hex_maniac' => 0,
                'rail_staff' => 0,
                'kindler' => 0,
                'swimmer' => 0,
                'gardener' => 0,
                'rocker' => 0,
                'psychic' => 0,
                'skier' => 0,
                'dragon_tamer' => 0,
                'delinquent' => 0,
                'fairytale_girl' => 0

            ]);

            //dd($medals->schoolkid);
        }


        $incomingFields = $request->validate([
            'schoolkid' => 'required|integer|min:' . $medals->schoolkid,
            'black_belt' => 'required|integer|min:' . $medals->black_belt,
            'bird_keeper' => 'required|integer|min:' . $medals->bird_keeper,
            'punk_girl' => 'required|integer|min:' . $medals->punk_girl,
            'ruin_maniac' => 'required|integer|min:' . $medals->ruin_maniac,
            'hiker' => 'required|integer|min:' . $medals->hiker,
            'bug_catcher' => 'required|integer|min:' . $medals->bug_catcher,
            'hex_maniac' => 'required|integer|min:' . $medals->hex_maniac,
            'rail_staff' => 'required|integer|min:' . $medals->rail_staff,
            'kindler' => 'required|integer|min:' . $medals->kindler,
            'swimmer' => 'required|integer|min:' . $medals->swimmer,
            'gardener' => 'required|integer|min:' . $medals->gardener,
            'rocker' => 'required|integer|min:' . $medals->rocker,
            'psychic' => 'required|integer|min:' . $medals->psychic,
            'skier' => 'required|integer|min:' . $medals->skier,
            'dragon_tamer' => 'required|integer|min:' . $medals->dragon_tamer,
            'delinquent' => 'required|integer|min:' . $medals->delinquent,
            'fairytale_girl' => 'required|integer|min:' . $medals->fairytale_girl,

            'checkbox' => ['required', 'accepted'],
        ]);


        $incomingFields['user_id'] = auth()->id();

        MedalType::create($incomingFields);
        return redirect('/medaltype');
    }
}
