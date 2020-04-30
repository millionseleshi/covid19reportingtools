@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if(auth()->user()->role != 'child_node_manager')
            <div class="row justify-content-center col-md-12">

                <div class="card card-info col-md-10">
                    <div class="card-header">
                        <h3 class="card-title">Monthly New Case</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="newCaseByMonthBarChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>

                <div class="card card-info col-md-10">
                    <div class="card-header">
                        <h3 class="card-title">Daily New Case</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="newCaseByDayBarChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>

                <div class="card card-info col-md-10">
                    <div class="card-header">
                        <h3 class="card-title">Fatality Monthly Count</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="fatalityByMonthBarChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>

                <div class="card card-info col-md-10">
                    <div class="card-header">
                        <h3 class="card-title">Fatality Daily Count</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="fatalityByDayBarChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        @endif
    </div>
@endsection
