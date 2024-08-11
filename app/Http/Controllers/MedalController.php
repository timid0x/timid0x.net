<?php
### TIMID0x - 20240520

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Medal;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;




class MedalController extends Controller
{




    public function deleteMedal(Medal $medal)
    {

        if (auth()->user()->id === $medal['user_id']) {
            $medal->delete();
        }
        return redirect('/medal');
    }

    public function actualEditMedal(Medal $medal, Request $request)
    {
        if (auth()->user()->id !== $medal['user_id']) {
            return redirect('/');
        }
        $incomingFields = $request->validate([
            'backpacker' => 'required|integer|min:1',
            'jogger' => 'required|integer|min:1',

        ]);
        $incomingFields['backpacker'] = strip_tags($incomingFields['backpacker']);
        $incomingFields['jogger'] = strip_tags($incomingFields['jogger']);

        //$medal->update($incomingFields);
        return redirect('/');
    }

    public function showEditMedal(Medal $medal)
    {
        if (auth()->user()->id !== $medal['user_id']) {
            return redirect('/tl50data');
        }

        return view('edit-medal', ['medal' => $medal]);
    }

    public function showMedal(Medal $medal)
    {
        /*    if(auth()->user()->id !==$medal['user_id']){
            return redirect('/');
        } */
        $medals = Medal::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        $lastRecordDate = Medal::where('user_id', Auth::user()->id)->select('created_at')->latest('created_at')->first();

        if (!$lastRecordDate) {
            // handle the case where the 'date' parameter is missing
        } else {
            $lastRecordDate = Carbon::parse($lastRecordDate['created_at'])->format('Y-m-d');
        }

        //dd($lastRecordDate);
        return view('main-medal', compact('medals', 'lastRecordDate'));
    }

    public function showCreateMedal(Medal $medal)
    {
        /*    if(auth()->user()->id !==$medal['user_id']){
               return redirect('/');
           } */
        $medals = Medal::where('user_id', Auth::user()->id)->latest('created_at')->first();

        return view('main-medal-create', compact('medals'));
    }

    public function createMedal(Request $request)
    {

        $medals = request()->all();
        // $medals['schoolkid'] = trim($medals['schoolkid']);
        $medals['total_xp'] = Str::replace(' ', '', $medals['total_xp']);
        $medals['actual_stardust'] = Str::replace(' ', '', $medals['actual_stardust']);
        $medals['elite_collector'] = Str::replace(' ', '', $medals['elite_collector']);
        $medals['jogger'] = Str::replace(' ', '', $medals['jogger']);
        $medals['kanto'] = Str::replace(' ', '', $medals['kanto']);
        $medals['collector'] = Str::replace(' ', '', $medals['collector']);
        $medals['scientist'] = Str::replace(' ', '', $medals['scientist']);
        $medals['breeder'] = Str::replace(' ', '', $medals['breeder']);
        $medals['backpacker'] = Str::replace(' ', '', $medals['backpacker']);
        $medals['sightseer'] = Str::replace(' ', '', $medals['sightseer']);
        $medals['fisher'] = Str::replace(' ', '', $medals['fisher']);
        $medals['battle_girl'] = Str::replace(' ', '', $medals['battle_girl']);
        $medals['ace_trainer'] = Str::replace(' ', '', $medals['ace_trainer']);
        $medals['youngster'] = Str::replace(' ', '', $medals['youngster']);
        $medals['pikachu_fan'] = Str::replace(' ', '', $medals['pikachu_fan']);
        $medals['unown'] = Str::replace(' ', '', $medals['unown']);
        $medals['johto'] = Str::replace(' ', '', $medals['johto']);
        $medals['champion'] = Str::replace(' ', '', $medals['champion']);
        $medals['battle_legend'] = Str::replace(' ', '', $medals['battle_legend']);
        $medals['berry_master'] = Str::replace(' ', '', $medals['berry_master']);
        $medals['gym_leader'] = Str::replace(' ', '', $medals['gym_leader']);
        $medals['hoenn'] = Str::replace(' ', '', $medals['hoenn']);
        $medals['pokemon_ranger'] = Str::replace(' ', '', $medals['pokemon_ranger']);
        $medals['idol'] = Str::replace(' ', '', $medals['idol']);
        $medals['gentleman'] = Str::replace(' ', '', $medals['gentleman']);
        $medals['pilot'] = Str::replace(' ', '', $medals['pilot']);
        $medals['sinnoh'] = Str::replace(' ', '', $medals['sinnoh']);
        $medals['great_league_veteran'] = Str::replace(' ', '', $medals['great_league_veteran']);
        $medals['ultra_league_veteran'] = Str::replace(' ', '', $medals['ultra_league_veteran']);
        $medals['master_league_veteran'] = Str::replace(' ', '', $medals['master_league_veteran']);
        $medals['cameraman'] = Str::replace(' ', '', $medals['cameraman']);
        $medals['unova'] = Str::replace(' ', '', $medals['unova']);
        $medals['purifier'] = Str::replace(' ', '', $medals['purifier']);
        $medals['hero'] = Str::replace(' ', '', $medals['hero']);
        $medals['ultra_hero'] = Str::replace(' ', '', $medals['ultra_hero']);
        $medals['best_buddy'] = Str::replace(' ', '', $medals['best_buddy']);
        $medals['wayfarer'] = Str::replace(' ', '', $medals['wayfarer']);
        $medals['kalos'] = Str::replace(' ', '', $medals['kalos']);
        $medals['alola'] = Str::replace(' ', '', $medals['alola']);
        $medals['galar'] = Str::replace(' ', '', $medals['galar']);
        $medals['hisui'] = Str::replace(' ', '', $medals['hisui']);
        $medals['triathlete'] = Str::replace(' ', '', $medals['triathlete']);
        $medals['rising_star'] = Str::replace(' ', '', $medals['rising_star']);
        $medals['rising_star_duo'] = Str::replace(' ', '', $medals['rising_star_duo']);
        $medals['picnicker'] = Str::replace(' ', '', $medals['picnicker']);
        $medals['successor'] = Str::replace(' ', '', $medals['successor']);
        $medals['mega_evolution_guru'] = Str::replace(' ', '', $medals['mega_evolution_guru']);
        $medals['friend_finder'] = Str::replace(' ', '', $medals['friend_finder']);
        $medals['raid_expert'] = Str::replace(' ', '', $medals['raid_expert']);
        $medals['tiny_pokemon_collector'] = Str::replace(' ', '', $medals['tiny_pokemon_collector']);
        $medals['jumbo_pokemon_collector'] = Str::replace(' ', '', $medals['jumbo_pokemon_collector']);
        $medals['vivillon_collector'] = Str::replace(' ', '', $medals['vivillon_collector']);
        $medals['showcase_star'] = Str::replace(' ', '', $medals['showcase_star']);
        $medals['paldea'] = Str::replace(' ', '', $medals['paldea']);
        $medals['expert_navigator'] = Str::replace(' ', '', $medals['expert_navigator']);

        request()->replace($medals);
        //dd($medals );

        $medals = Medal::where('user_id', Auth::user()->id)->latest('created_at')->first();

        if (empty($medals)) {
            $medals = new Medal([
                'total_xp' => 0,
                'actual_stardust' => 0,
                'elite_collector' => 0,
                'jogger' => 0,
                'kanto' => 0,
                'collector' => 0,
                'scientist' => 0,
                'breeder' => 0,
                'backpacker' => 0,
                'sightseer' => 0,
                'fisher' => 0,
                'battle_girl' => 0,
                'ace_trainer' => 0,
                'youngster' => 0,
                'pikachu_fan' => 0,
                'unown' => 0,
                'johto' => 0,
                'champion' => 0,
                'battle_legend' => 0,
                'berry_master' => 0,
                'gym_leader' => 0,
                'hoenn' => 0,
                'pokemon_ranger' => 0,
                'idol' => 0,
                'gentleman' => 0,
                'pilot' => 0,
                'sinnoh' => 0,
                'great_league_veteran' => 0,
                'ultra_league_veteran' => 0,
                'master_league_veteran' => 0,
                'cameraman' => 0,
                'unova' => 0,
                'purifier' => 0,
                'hero' => 0,
                'ultra_hero' => 0,
                'best_buddy' => 0,
                'wayfarer' => 0,
                'kalos' => 0,
                'alola' => 0,
                'galar' => 0,
                'hisui' => 0,
                'triathlete' => 0,
                'rising_star' => 0,
                'rising_star_duo' => 0,
                'picnicker' => 0,
                'successor' => 0,
                'mega_evolution_guru' => 0,
                'friend_finder' => 0,
                'raid_expert' => 0,
                'tiny_pokemon_collector' => 0,
                'jumbo_pokemon_collector' => 0,
                'vivillon_collector' => 0,
                'showcase_star' => 0,
                'paldea' => 0,
                'expert_navigator' => 0,


            ]);

            //dd($medals->total_xp);
        }

        $incomingFields = $request->validate([
            'total_xp' => 'required|integer|min:' . $medals->total_xp,
            'actual_stardust' => 'required|integer|min:' . 0,
            'elite_collector' => 'required|integer|min:' . $medals->elite_collector,
            'jogger' => 'required|integer|min:' . $medals->jogger,
            'kanto' => 'required|integer|min:' . $medals->kanto,
            'collector' => 'required|integer|min:' . $medals->collector,
            'scientist' => 'required|integer|min:' . $medals->scientist,
            'breeder' => 'required|integer|min:' . $medals->breeder,
            'backpacker' => 'required|integer|min:' . $medals->backpacker,
            'sightseer' => 'required|integer|min:' . $medals->sightseer,
            'fisher' => 'required|integer|min:' . $medals->fisher,
            'battle_girl' => 'required|integer|min:' . $medals->battle_girl,
            'ace_trainer' => 'required|integer|min:' . $medals->ace_trainer,
            'youngster' => 'required|integer|min:' . $medals->youngster,
            'pikachu_fan' => 'required|integer|min:' . $medals->pikachu_fan,
            'unown' => 'required|integer|min:' . $medals->unown,
            'johto' => 'required|integer|min:' . $medals->johto,
            'champion' => 'required|integer|min:' . $medals->champion,
            'battle_legend' => 'required|integer|min:' . $medals->battle_legend,
            'berry_master' => 'required|integer|min:' . $medals->berry_master,
            'gym_leader' => 'required|integer|min:' . $medals->gym_leader,
            'hoenn' => 'required|integer|min:' . $medals->hoenn,
            'pokemon_ranger' => 'required|integer|min:' . $medals->pokemon_ranger,
            'idol' => 'required|integer|min:' . $medals->idol,
            'gentleman' => 'required|integer|min:' . $medals->gentleman,
            'pilot' => 'required|integer|min:' . $medals->pilot,
            'sinnoh' => 'required|integer|min:' . $medals->sinnoh,
            'great_league_veteran' => 'required|integer|min:' . $medals->great_league_veteran,
            'ultra_league_veteran' => 'required|integer|min:' . $medals->ultra_league_veteran,
            'master_league_veteran' => 'required|integer|min:' . $medals->master_league_veteran,
            'cameraman' => 'required|integer|min:' . $medals->cameraman,
            'unova' => 'required|integer|min:' . $medals->unova,
            'purifier' => 'required|integer|min:' . $medals->purifier,
            'hero' => 'required|integer|min:' . $medals->hero,
            'ultra_hero' => 'required|integer|min:' . $medals->ultra_hero,
            'best_buddy' => 'required|integer|min:' . $medals->best_buddy,
            'wayfarer' => 'required|integer|min:' . $medals->wayfarer,
            'kalos' => 'required|integer|min:' . $medals->kalos,
            'alola' => 'required|integer|min:' . $medals->alola,
            'galar' => 'required|integer|min:' . $medals->galar,
            'hisui' => 'required|integer|min:' . $medals->hisui,
            'triathlete' => 'required|integer|min:' . $medals->triathlete,
            'rising_star' => 'required|integer|min:' . $medals->rising_star,
            'rising_star_duo' => 'required|integer|min:' . $medals->rising_star_duo,
            'picnicker' => 'required|integer|min:' . $medals->picnicker,
            'successor' => 'required|integer|min:' . $medals->successor,
            'mega_evolution_guru' => 'required|integer|min:' . $medals->mega_evolution_guru,
            'friend_finder' => 'required|integer|min:' . $medals->friend_finder,
            'raid_expert' => 'required|integer|min:' . $medals->raid_expert,
            'tiny_pokemon_collector' => 'required|integer|min:' . $medals->tiny_pokemon_collector,
            'jumbo_pokemon_collector' => 'required|integer|min:' . $medals->jumbo_pokemon_collector,
            'vivillon_collector' => 'required|integer|min:' . $medals->vivillon_collector,
            'showcase_star' => 'required|integer|min:' . $medals->showcase_star,
            'paldea' => 'required|integer|min:' . $medals->paldea,
            'expert_navigator' => 'required|integer|min:' . $medals->expert_navigator,


            'checkbox' => ['required', 'accepted'],
        ]);


        $incomingFields['user_id'] = auth()->id();

        Medal::create($incomingFields);
        return redirect('/medal');
    }
}
