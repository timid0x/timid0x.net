<!--
### TIMID0x - 20241214
-->
@extends('layouts.template-core')

@section('title', 'Medal')

@section('medal-link', 'active')

@section('contenido')
    <main>

        <div class="container m-1">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="mt-3 pull-left">
                        <h2>{{ __('Medals') }}</h2>
                    </div>

                    @if ($lastRecordDate === null)
                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{ route('medal.getcreate') }}">{{ __('New') }}</a>
                        </div>
                    @elseif (date('Ym', strtotime($lastRecordDate)) != date('Ym'))
                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{ route('medal.getcreate') }}">{{ __('New') }}</a>
                        </div>
                    @endif

                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="mt-4">
                <table id="example" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>{{ __('YY/MMM') }}</th>
                            <th>{{ __('Total XP') }}</th>
                            <th>{{ __('Actual Stardust') }}</th>
                            <th>{{ __('Elite Collector') }}</th>
                            <th>{{ __('Jogger') }}</th>
                            <th>{{ __('Kanto') }}</th>
                            <th>{{ __('Collector') }}</th>
                            <th>{{ __('Scientist') }}</th>
                            <th>{{ __('Breeder') }}</th>
                            <th>{{ __('Backpacker') }}</th>
                            <th>{{ __('Sightseer') }}</th>
                            <th>{{ __('Fisher') }}</th>
                            <th>{{ __('Battle Girl') }}</th>
                            <th>{{ __('Ace Trainer') }}</th>
                            <th>{{ __('Youngster') }}</th>
                            <th>{{ __('Pikachu Fan') }}</th>
                            <th>{{ __('Unown') }}</th>
                            <th>{{ __('Johto') }}</th>
                            <th>{{ __('Champion') }}</th>
                            <th>{{ __('Battle Legend') }}</th>
                            <th>{{ __('Berry Master') }}</th>
                            <th>{{ __('Gym Leader') }}</th>
                            <th>{{ __('Hoenn') }}</th>
                            <th>{{ __('Pokemon Ranger') }}</th>
                            <th>{{ __('Idol') }}</th>
                            <th>{{ __('Gentleman') }}</th>
                            <th>{{ __('Pilot') }}</th>
                            <th>{{ __('Sinnoh') }}</th>
                            <th>{{ __('Great League Veteran') }}</th>
                            <th>{{ __('Ultra League Veteran') }}</th>
                            <th>{{ __('Master League Veteran') }}</th>
                            <th>{{ __('Cameraman') }}</th>
                            <th>{{ __('Unova') }}</th>
                            <th>{{ __('Purifier') }}</th>
                            <th>{{ __('Hero') }}</th>
                            <th>{{ __('Ultra Hero') }}</th>
                            <th>{{ __('Best Buddy') }}</th>
                            <th>{{ __('Wayfarer') }}</th>
                            <th>{{ __('Kalos') }}</th>
                            <th>{{ __('Alola') }}</th>
                            <th>{{ __('Galar') }}</th>
                            <th>{{ __('Paldea') }}</th>
                            <th>{{ __('Hisui') }}</th>
                            <th>{{ __('Triathlete') }}</th>
                            <th>{{ __('Rising Star') }}</th>
                            <th>{{ __('Rising Star Duo') }}</th>
                            <th>{{ __('Picnicker') }}</th>
                            <th>{{ __('Successor') }}</th>
                            <th>{{ __('Mega Evolution Guru') }}</th>
                            <th>{{ __('Friend Finder') }}</th>
                            <th>{{ __('Raid Expert') }}</th>
                            <th>{{ __('Tiny Pokémon Collector') }}</th>
                            <th>{{ __('Jumbo Pokémon Collector') }}</th>
                            <th>{{ __('Vivillon Collector') }}</th>
                            <th>{{ __('Showcase Star') }}</th>
                            <th>{{ __('Expert Navigator') }}</th>
                            <th>{{ __('Live of the Party') }}</th>
                            <th>{{ __('Community Member') }}</th>
                            <th style="min-width:130px;">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medals as $medal)
                            <tr>
                                <td>{{ $medal->id }}</td>
                                <td>{{ date('Y-M', strtotime($medal->created_at)) }}</td>
                                <td>{{ number_format($medal->total_xp, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->actual_stardust, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->elite_collector, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->jogger, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->kanto, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->collector, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->scientist, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->breeder, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->backpacker, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->sightseer, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->fisher, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->battle_girl, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->ace_trainer, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->youngster, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->pikachu_fan, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->unown, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->johto, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->champion, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->battle_legend, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->berry_master, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->gym_leader, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->hoenn, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->pokemon_ranger, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->idol, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->gentleman, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->pilot, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->sinnoh, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->great_league_veteran, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->ultra_league_veteran, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->master_league_veteran, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->cameraman, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->unova, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->purifier, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->hero, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->ultra_hero, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->best_buddy, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->wayfarer, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->kalos, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->alola, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->galar, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->paldea, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->hisui, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->triathlete, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->rising_star, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->rising_star_duo, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->picnicker, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->successor, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->mega_evolution_guru, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->friend_finder, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->raid_expert, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->tiny_pokemon_collector, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->jumbo_pokemon_collector, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->vivillon_collector, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->showcase_star, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->expert_navigator, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->live_party, 0, '', ',') }}</td>
                                <td>{{ number_format($medal->community_member, 0, '', ',') }}</td>


                                <td>
                                    <form onclick="return confirm('Are you sure you want to DELETE it?')"
                                        action="{{ route('medal.deletemedal', $medal->id) }}" method="POST">
                                        {{-- <a class="btn btn-primary btn-xs" href="#">Edit</a> --}}
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs">{{ trans('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>



    </main>
@endsection

@section('scripts')
    {{-- JS Jquery DataTables--}}
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    {{-- JS DataTable BS --}}
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    {{-- CSS DataTable BS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}"  >

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                scrollX: true,
                searching: false,
                ordering: false,
                "lengthMenu": [
                    [25, 50, -1],
                    [25, 50, "All"]
                ]
            });
        });
    </script>


@endsection
