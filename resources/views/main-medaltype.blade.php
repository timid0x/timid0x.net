<!--
### TIMID0x - 2023-07-08T10:23:09.000-05:00
-->
@extends('layouts.template-core')

@section('title', 'Medal Types')

@section('medaltypes-link', 'active')

@section('contenido')
    <main>

        <div class="container m-1">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="mt-3 pull-left">
                        <h2>{{ __('Medals Types') }}</h2>
                    </div>

                    @if ($lastRecordDate === null)
                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{ route('medaltype.getcreate') }}">{{ __('New') }}</a>
                        </div>
                    @elseif (date('Ym', strtotime($lastRecordDate)) != date('Ym'))
                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{ route('medaltype.getcreate') }}">{{ __('New') }}</a>
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
                            <th>{{ __('Schoolkid') }}</th>
                            <th>{{ __('Black Belt') }}</th>
                            <th>{{ __('Bird Keeper') }}</th>
                            <th>{{ __('Punk Girl') }}</th>
                            <th>{{ __('Ruin Maniac') }}</th>
                            <th>{{ __('Hiker') }}</th>
                            <th>{{ __('Bug Catcher') }}</th>
                            <th>{{ __('Hex Maniac') }}</th>
                            <th>{{ __('Rail Staff') }}</th>
                            <th>{{ __('Kindler') }}</th>
                            <th>{{ __('Swimmer') }}</th>
                            <th>{{ __('Gardener') }}</th>
                            <th>{{ __('Rocker') }}</th>
                            <th>{{ __('Psychic') }}</th>
                            <th>{{ __('Skier') }}</th>
                            <th>{{ __('Dragon Tamer') }}</th>
                            <th>{{ __('Delinquent') }}</th>
                            <th>{{ __('Fairy Tale Girl') }}</th>
                            <th style="min-width:130px;">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medals as $medaltypes)
                            <tr>
                                <td>{{ $medaltypes->id }}</td>
                                <td>{{ date('Y-M', strtotime($medaltypes->created_at)) }}</td>
                                <td>{{ number_format($medaltypes->schoolkid, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->black_belt, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->bird_keeper, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->punk_girl, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->ruin_maniac, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->hiker, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->bug_catcher, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->hex_maniac, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->rail_staff, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->kindler, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->swimmer, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->gardener, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->rocker, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->psychic, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->skier, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->dragon_tamer, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->delinquent, 0, '', ',') }}</td>
                                <td>{{ number_format($medaltypes->fairytale_girl, 0, '', ',') }}</td>

                                <td>
                                    <form onclick="return confirm('Are you sure you want to DELETE it?')" action="{{ route('medaltype.deletemedaltype', $medaltypes->id) }}"
                                        method="POST">
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


        @if ($errors->any())
            &lt;div class="alert alert-danger"&gt;
            &lt;ul&gt;
            @foreach ($errors->all() as $error)
                &lt;li&gt;{{ $error }} &lt;/li&gt;
            @endforeach
            &lt;/ul&gt;
            &lt;/div&gt;
        @endif


    </main>
@endsection

@section('scripts')
   {{-- JS JQuery Datatable --}}
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    {{-- JS Datatable BS--}}
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    {{-- CSS Datatable BS--}}
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">

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
