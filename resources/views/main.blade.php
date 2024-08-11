<!--
### TIMID0x - 2023-11-11T12:31:48.000-05:00
-->
@extends('layouts.template-core')

@section('title', 'Dashboard')

@section('dashboard-link', 'active')

@section('contenido')

    <main>


        <div class="container m-1">
            <h1 class="mt-3">{{ __('Dashboard') }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">{{ __('Charts') }}</li>
            </ol>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            {{ __('Total XP') }}
                        </div>
                        <div class="card-body" style="height: 400px;">
                            <canvas id="totalxp"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            {{ __('Stardust') }}
                        </div>
                        <div class="card-body" style="height: 400px;">
                            <canvas id="stardust"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            {{ __('Collector') }}
                        </div>
                        <div class="card-body" style="height: 400px;">
                            <canvas id="collector"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            {{ __('Battle Legend') }}
                        </div>
                        <div class="card-body" style="height: 400px;">
                            <canvas id="battle_legend"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            {{ __('Great League Veteran') }}
                        </div>
                        <div class="card-body" style="height: 400px;">
                            <canvas id="great"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            {{ __('Best Buddy') }}
                        </div>
                        <div class="card-body" style="height: 400px;">
                            <canvas id="buddy"></canvas>
                        </div>
                    </div>
                </div>



            </div>
        </div>


    @section('scripts')

        <script src="{{ asset('assets/js/chart.umd.js') }}"></script>

        <script>
            //total xp
            const ctx1 = document.getElementById('totalxp');
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                            label: 'Last Year',
                            data: {{ Js::from($lastYearTotalXP) }}, //data: {{ json_encode($thisYearTotalXP) }} ,
                            backgroundColor: 'lightgray',
                            borderWidth: 1
                        },
                        {
                            label: 'This Year',
                            data: {{ Js::from($thisYearTotalXP) }}, //data: {{ json_encode($thisYearTotalXP) }} ,
                            backgroundColor: 'lightgreen',
                            borderWidth: 1
                        }


                    ]
                },
                options: {

                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            //stardust
            const ctx2 = document.getElementById('stardust');
            new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                            label: 'Last Year',
                            data: {{ Js::from($lastYearStardust) }},
                            backgroundColor: 'lightgray',
                            borderWidth: 2,
                            fill: false,
                            borderColor: 'lightgray',
                            tension: 0.1

                        },
                        {
                            label: 'This Year',
                            data: {{ Js::from($thisYearStardust) }},
                            backgroundColor: 'rgba(109, 118, 237, 0.54)',
                            borderWidth: 2,
                            fill: false,
                            borderColor: 'rgba(109, 118, 237, 0.54)',
                            tension: 0.1
                        }


                    ]
                },
                options: {

                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            //collector
            const ctx3 = document.getElementById('collector');
            new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                            label: 'Last Year',
                            data: {{ Js::from($lastYearCollector) }},
                            backgroundColor: 'lightgray',
                            borderWidth: 1
                        },
                        {
                            label: 'This Year',
                            data: {{ Js::from($thisYearCollector) }},
                            backgroundColor: 'rgba(255, 141, 0, 0.62)',
                            borderWidth: 1
                        }


                    ]
                },
                options: {

                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            //battle legend
            const ctx4 = document.getElementById('battle_legend');
            new Chart(ctx4, {
                type: 'bar',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                            label: 'Last Year',
                            data: {{ Js::from($lastYearBattleLegend) }},
                            backgroundColor: 'lightgray',
                            borderWidth: 1
                        },
                        {
                            label: 'This Year',
                            data: {{ Js::from($thisYearBattleLegend) }},
                            backgroundColor: 'rgba(143, 31, 243, 0.5)',
                            borderWidth: 1
                        }


                    ]
                },
                options: {

                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            //Great
            const ctx5 = document.getElementById('great');
            new Chart(ctx5, {
                type: 'bar',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                            label: 'Last Year',
                            data: {{ Js::from($lastYearGreat) }},
                            backgroundColor: 'lightgray',
                            borderWidth: 1
                        },
                        {
                            label: 'This Year',
                            data: {{ Js::from($thisYearGreat) }},
                            backgroundColor: 'rgba(250, 198, 65, 0.56)',
                            borderWidth: 1
                        }


                    ]
                },
                options: {

                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            //Great
            const ctx6 = document.getElementById('buddy');
            new Chart(ctx6, {
                type: 'bar',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                            label: 'Last Year',
                            data: {{ Js::from($lastYearBuddy) }},
                            backgroundColor: 'lightgray',
                            borderWidth: 1
                        },
                        {
                            label: 'This Year',
                            data: {{ Js::from($thisYearBuddy) }},
                            backgroundColor: 'rgba(255, 0, 24, 0.62)',
                            borderWidth: 1
                        }


                    ]
                },
                options: {

                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endsection

</main>
@endsection
