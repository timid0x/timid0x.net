<?php
###### Mon Jun 5 09:42:27 COT 2023

namespace App\Http\Controllers;

use App\Models\Medal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChartJsController extends Controller
{
    public function showMain()
    {
        $currentUserId = Auth::user()->id;

        //TotalXP;
        $thisYearTotalXP = Medal::query()
            ->whereYear('created_at', date('Y'))
            ->where('user_id', $currentUserId)
            ->selectRaw('MONTH(created_at) as month')
            ->selectRaw('MAX(total_xp) as total_xp')
            ->groupby('month')
            ->orderby('month')
            ->pluck('total_xp', 'month')
            ->values()
            ->toArray();

        $lastYearTotalXP = Medal::query()
            ->whereYear('created_at', date('Y') - 1)
            ->where('user_id', $currentUserId)
            ->selectRaw('MONTH(created_at) as month')
            ->selectRaw('MAX(total_xp) as total_xp')
            ->groupby('month')
            ->orderby('month')
            ->pluck('total_xp', 'month')
            ->values()
            ->toArray();

        //dd($thisYearTotalXP);

        // SELECT MONTH(created_at) as month, total_xp
        // from medals where user_id = 1 and YEAR(created_at) = '2022'
        // GROUP by month
        // ORDER by month


        //Stardust;
        $thisYearStardust = Medal::query()
            ->whereYear('created_at', date('Y'))
            ->where('user_id', $currentUserId)
            ->selectRaw('MONTH(created_at) as month')
            ->selectRaw('MAX(actual_stardust) as stardust')
            ->groupby('month')
            ->orderby('month')
            ->pluck('stardust', 'month')
            ->values()
            ->toArray();

        $lastYearStardust = Medal::query()
            ->whereYear('created_at', date('Y') - 1)
            ->where('user_id', $currentUserId)
            ->selectRaw('MONTH(created_at) as month')
            ->selectRaw('MAX(actual_stardust) as stardust')
            ->groupby('month')
            ->orderby('month')
            ->pluck('stardust', 'month')
            ->values()
            ->toArray();

        //Collector;
        $thisYearCollector = Medal::query()
            ->whereYear('created_at', date('Y'))
            ->where('user_id', $currentUserId)
            ->selectRaw('MONTH(created_at) as month')
            ->selectRaw('MAX(collector) as collector')
            ->groupby('month')
            ->orderby('month')
            ->pluck('collector', 'month')
            ->values()
            ->toArray();

        $lastYearCollector = Medal::query()
            ->whereYear('created_at', date('Y') - 1)
            ->where('user_id', $currentUserId)
            ->selectRaw('MONTH(created_at) as month')
            ->selectRaw('MAX(collector) as collector')
            ->groupby('month')
            ->orderby('month')
            ->pluck('collector', 'month')
            ->values()
            ->toArray();

        //Battle Legend;
        $thisYearBattleLegend = Medal::query()
            ->whereYear('created_at', date('Y'))
            ->where('user_id', $currentUserId)
            ->selectRaw('MONTH(created_at) as month')
            ->selectRaw('MAX(battle_legend) as battle_legend')
            ->groupby('month')
            ->orderby('month')
            ->pluck('battle_legend', 'month')
            ->values()
            ->toArray();

        $lastYearBattleLegend = Medal::query()
            ->whereYear('created_at', date('Y') - 1)
            ->where('user_id', $currentUserId)
            ->selectRaw('MONTH(created_at) as month')
            ->selectRaw('MAX(battle_legend) as battle_legend')
            ->groupby('month')
            ->orderby('month')
            ->pluck('battle_legend', 'month')
            ->values()
            ->toArray();

        //Great;
        $thisYearGreat = Medal::query()
            ->whereYear('created_at', date('Y'))
            ->where('user_id', $currentUserId)
            ->selectRaw('MONTH(created_at) as month')
            ->selectRaw('MAX(great_league_veteran) as great_league_veteran')
            ->groupby('month')
            ->orderby('month')
            ->pluck('great_league_veteran', 'month')
            ->values()
            ->toArray();

        $lastYearGreat = Medal::query()
            ->whereYear('created_at', date('Y') - 1)
            ->where('user_id', $currentUserId)
            ->selectRaw('MONTH(created_at) as month')
            ->selectRaw('MAX(great_league_veteran) as great_league_veteran')
            ->groupby('month')
            ->orderby('month')
            ->pluck('great_league_veteran', 'month')
            ->values()
            ->toArray();


        //Buddy;
        $thisYearBuddy = Medal::query()
            ->whereYear('created_at', date('Y'))
            ->where('user_id', $currentUserId)
            ->selectRaw('MONTH(created_at) as month')
            ->selectRaw('MAX(best_buddy) as best_buddy')
            ->groupby('month')
            ->orderby('month')
            ->pluck('best_buddy', 'month')
            ->values()
            ->toArray();

        $lastYearBuddy = Medal::query()
            ->whereYear('created_at', date('Y') - 1)
            ->where('user_id', $currentUserId)
            ->selectRaw('MONTH(created_at) as month')
            ->selectRaw('MAX(best_buddy) as best_buddy')
            ->groupby('month')
            ->orderby('month')
            ->pluck('best_buddy', 'month')
            ->values()
            ->toArray();




        return view('main', [
            'thisYearTotalXP' => $thisYearTotalXP,
            'lastYearTotalXP' => $lastYearTotalXP,
            'thisYearStardust' => $thisYearStardust,
            'lastYearStardust' => $lastYearStardust,
            'thisYearCollector' => $thisYearCollector,
            'lastYearCollector' => $lastYearCollector,
            'thisYearBattleLegend' => $thisYearBattleLegend,
            'lastYearBattleLegend' => $lastYearBattleLegend,
            'thisYearGreat' => $thisYearGreat,
            'lastYearGreat' => $lastYearGreat,
            'thisYearBuddy' => $thisYearBuddy,
            'lastYearBuddy' => $lastYearBuddy,

        ]);
    }


    public function showLeaderboard()
    {

        $totalxps = DB::table('medals')
            ->join('users', 'medals.user_id', '=', 'users.id')
            ->join('countries', 'users.country_id', '=', 'countries.id')
            ->selectRAW('users.name As username,countries.code As country, Max(medals.total_xp) As max_xp')
            ->groupby('users.name', 'countries.code', 'medals.user_id')
            ->orderBy('max_xp', 'desc')
            ->limit(10)
            ->get();


        //  $collectors = Medal::selectRaw("user_id, max(collector) as collector")
        //  ->OrderBy('collector', 'desc')
        //  ->groupby('user_id')
        //  ->take(10)
        //  ->get();

        //     Select 
        //     tl50data_db.users.name As username,
        //     tl50data_db.countries.code As country,
        //     Max(tl50data_db.medals.total_xp) As max_xp
        // From
        //     tl50data_db.medals Inner Join
        //     tl50data_db.users On tl50data_db.medals.user_id = tl50data_db.users.id Inner Join
        //     tl50data_db.countries On tl50data_db.users.country_id = tl50data_db.countries.id
        // Group By
        //     tl50data_db.users.name,
        //     tl50data_db.countries.code,
        //     tl50data_db.medals.user_id
        // Order By
        //     max_xp Desc
        //  limit 10;

        $stardusts = DB::table('medals')
            ->join('users', 'medals.user_id', '=', 'users.id')
            ->join('countries', 'users.country_id', '=', 'countries.id')
            ->selectRAW('users.name As username,countries.code As country, Max(medals.actual_stardust) As max_stardust')
            ->groupby('users.name', 'countries.code', 'medals.user_id')
            ->orderBy('max_stardust', 'desc')
            ->limit(10)
            ->get();

        $collectors = DB::table('medals')
            ->join('users', 'medals.user_id', '=', 'users.id')
            ->join('countries', 'users.country_id', '=', 'countries.id')
            ->selectRAW('users.name As username,countries.code As country, Max(medals.collector) As max_collector')
            ->groupby('users.name', 'countries.code', 'medals.user_id')
            ->orderBy('max_collector', 'desc')
            ->limit(10)
            ->get();

        $legends = DB::table('medals')
            ->join('users', 'medals.user_id', '=', 'users.id')
            ->join('countries', 'users.country_id', '=', 'countries.id')
            ->selectRAW('users.name As username,countries.code As country, Max(medals.battle_legend) As max_legend')
            ->groupby('users.name', 'countries.code', 'medals.user_id')
            ->orderBy('max_legend', 'desc')
            ->limit(10)
            ->get();

        $greats = DB::table('medals')
            ->join('users', 'medals.user_id', '=', 'users.id')
            ->join('countries', 'users.country_id', '=', 'countries.id')
            ->selectRAW('users.name As username,countries.code As country, Max(medals.great_league_veteran) As max_great')
            ->groupby('users.name', 'countries.code', 'medals.user_id')
            ->orderBy('max_great', 'desc')
            ->limit(10)
            ->get();

        $ultras = DB::table('medals')
            ->join('users', 'medals.user_id', '=', 'users.id')
            ->join('countries', 'users.country_id', '=', 'countries.id')
            ->selectRAW('users.name As username,countries.code As country, Max(medals.ultra_league_veteran) As max_ultra')
            ->groupby('users.name', 'countries.code', 'medals.user_id')
            ->orderBy('max_ultra', 'desc')
            ->limit(10)
            ->get();

        $masters = DB::table('medals')
            ->join('users', 'medals.user_id', '=', 'users.id')
            ->join('countries', 'users.country_id', '=', 'countries.id')
            ->selectRAW('users.name As username,countries.code As country, Max(medals.master_league_veteran) As max_master')
            ->groupby('users.name', 'countries.code', 'medals.user_id')
            ->orderBy('max_master', 'desc')
            ->limit(10)
            ->get();


        //dd($collectors);
        return view('leaderboard', compact(
            'totalxps',
            'stardusts',
            'collectors',
            'legends',
            'greats',
            'ultras',
            'masters'
        ));
    }
}
