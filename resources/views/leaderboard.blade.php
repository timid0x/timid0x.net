<!--
### TIMID0x - 2023-08-15T17:11:25.000-05:00
-->

<?php
#    Output easy-to-read numbers
#    by james at bandit.co.nz
function bd_nice_number($n)
{
    // first strip any formatting;
    $n = 0 + str_replace(',', '', $n);

    // is this a number?
    if (!is_numeric($n)) {
        return false;
    }

    // now filter it;
    if ($n > 1000000000000) {
        return round($n / 1000000000000, 1) . ' T';
    } elseif ($n > 1000000000) {
        return round($n / 1000000000, 1) . ' B';
    } elseif ($n > 1000000) {
        return round($n / 1000000, 1) . ' M';
    } elseif ($n > 1000) {
        return round($n / 1000, 1) . ' K';
    }

    return number_format($n);
}
?>


@extends('layouts.template-core')

@section('title', 'Leaderboard')

@section('leaderboard-link', 'active')

@section('contenido')

    <main>


        <div class="container m-1">
            <h1 class="mt-3">{{ __('Leaderboard') }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">{{ __('Top by Medals') }}</li>
            </ol>

            <div class="row row-cols-1 row-cols-md-2 g-4">

                {{-- table total_xp --}}
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            {{ __('Total XP - Top 10') }}
                        </div>
                        <div class="card-body">

                            <table id="table1" class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>{{ __('Rank') }}</th>
                                        <th>{{ __('User') }}</th>
                                        <th>{{ __('Country') }}</th>
                                        <th>
                                            <div class="text-wrap text-truncate text-break">
                                                {{ __('Total XP') }}
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($totalxps as $totalxp)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $totalxp->username }}</td>
                                            <td><span class="fi fi-{{ strtolower($totalxp->country) }}"></span></td>
                                            <td>{{ bd_nice_number($totalxp->max_xp) }}
                                                <a href="" data-toggle="tooltip"
                                                    title="{{ number_format($totalxp->max_xp, 0, '', ',') }}">
                                                    <i class="fa-solid fa-circle-info"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                {{-- table stardust --}}
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            {{ __('Stardust - Top 10') }}
                        </div>
                        <div class="card-body">

                            <table id="table1" class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>{{ __('Rank') }}</th>
                                        <th>{{ __('User') }}</th>
                                        <th>{{ __('Country') }}</th>
                                        <th>
                                            <div class="text-wrap text-truncate text-break">
                                                {{ __('Stardust') }}
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stardusts as $stardust)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $stardust->username }}</td>
                                            <td><span class="fi fi-{{ strtolower($stardust->country) }}"></span></td>
                                            <td>{{ bd_nice_number($stardust->max_stardust) }}
                                                <a href="" data-toggle="tooltip"
                                                    title="{{ number_format($stardust->max_stardust, 0, '', ',') }}">
                                                    <i class="fa-solid fa-circle-info"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- table collector --}}
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            {{ __('Collector - Top 10') }}
                        </div>
                        <div class="card-body">

                            <table id="table3" class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>{{ __('Rank') }}</th>
                                        <th>{{ __('User') }}</th>
                                        <th>{{ __('Country') }}</th>
                                        <th>
                                            <div class="text-wrap text-truncate text-break">
                                                {{ __('Collector') }}
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collectors as $collector)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $collector->username }}</td>
                                            <td><span class="fi fi-{{ strtolower($collector->country) }}"></span></td>
                                            <td>{{ bd_nice_number($collector->max_collector) }}
                                                <a href="" data-toggle="tooltip"
                                                    title="{{ number_format($collector->max_collector, 0, '', ',') }}">
                                                    <i class="fa-solid fa-circle-info"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- table battle legend --}}
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            {{ __('Battle Legend - Top 10') }}
                        </div>
                        <div class="card-body">

                            <table id="table4" class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>{{ __('Rank') }}</th>
                                        <th>{{ __('User') }}</th>
                                        <th>{{ __('Country') }}</th>
                                        <th>
                                            <div class="text-wrap text-truncate text-break">
                                                {{ __('Battle Legend') }}
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($legends as $legend)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $legend->username }}</td>
                                            <td><span class="fi fi-{{ strtolower($legend->country) }}"></span></td>
                                            <td>{{ bd_nice_number($legend->max_legend) }}
                                                <a href="" data-toggle="tooltip"
                                                    title="{{ number_format($legend->max_legend, 0, '', ',') }}">
                                                    <i class="fa-solid fa-circle-info"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- table great --}}
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            {{ __('Great League - Top 10') }}
                        </div>
                        <div class="card-body">

                            <table id="table5" class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>{{ __('Rank') }}</th>
                                        <th>{{ __('User') }}</th>
                                        <th>{{ __('Country') }}</th>
                                        <th>
                                            <div class="text-wrap text-truncate text-break">
                                                {{ __('Great League') }}
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($greats as $great)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $great->username }}</td>
                                            <td><span class="fi fi-{{ strtolower($great->country) }}"></span></td>
                                            <td>{{ bd_nice_number($great->max_great) }}
                                                <a href="" data-toggle="tooltip"
                                                    title="{{ number_format($great->max_great, 0, '', ',') }}">
                                                    <i class="fa-solid fa-circle-info"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- table ultra --}}
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            {{ __('Ultra League - Top 10') }}
                        </div>
                        <div class="card-body">

                            <table id="table6" class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>{{ __('Rank') }}</th>
                                        <th>{{ __('User') }}</th>
                                        <th>{{ __('Country') }}</th>
                                        <th>
                                            <div class="text-wrap text-truncate text-break">
                                                {{ __('Ultra League') }}
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ultras as $ultra)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $ultra->username }}</td>
                                            <td><span class="fi fi-{{ strtolower($ultra->country) }}"></span></td>
                                            <td>{{ bd_nice_number($ultra->max_ultra) }}
                                                <a href="" data-toggle="tooltip"
                                                    title="{{ number_format($ultra->max_ultra, 0, '', ',') }}">
                                                    <i class="fa-solid fa-circle-info"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- table master --}}
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            {{ __('Master League - Top 10') }}
                        </div>
                        <div class="card-body">

                            <table id="table7" class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>{{ __('Rank') }}</th>
                                        <th>{{ __('User') }}</th>
                                        <th>{{ __('Country') }}</th>
                                        <th>
                                            <div class="text-wrap text-truncate text-break">
                                                {{ __('Master League') }}
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($masters as $master)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $master->username }}</td>
                                            <td><span class="fi fi-{{ strtolower($master->country) }}"></span></td>
                                            <td>
                                                <div class="container">
                                                    {{ bd_nice_number($master->max_master) }}
                                                    <a href="" data-toggle="tooltip"
                                                        title="{{ number_format($master->max_master, 0, '', ',') }}">
                                                        <i class="fa-solid fa-circle-info"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>




        </div>


    @section('scripts')

        {{-- JS Jquery Datatables --}}
        <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
        {{-- JS Datatables BS --}}
        <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
        {{-- CSS Datatables BS --}}
        <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">

        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>

        <script>
            //table collector
            $(document).ready(function() {
                $('#table1').DataTable({
                    "paging": false,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": true,
                    "responsive": true

                });

                $('#table2').DataTable({
                    "paging": false,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": true,
                    "responsive": true
                });

                $('#table3').DataTable({
                    "paging": false,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": true,
                    "responsive": true
                });

                $('#table4').DataTable({
                    "paging": false,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": true,
                    "responsive": true
                });

                $('#table5').DataTable({
                    "paging": false,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": true,
                    "responsive": true
                });

                $('#table6').DataTable({
                    "paging": false,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": true,
                    "responsive": true
                });

                $('#table7').DataTable({
                    "paging": false,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": true,
                    "responsive": true
                });


            });
        </script>

    @endsection

</main>
@endsection
