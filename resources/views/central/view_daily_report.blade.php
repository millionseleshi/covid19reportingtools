@extends('layouts.app')
@section('content')
    {{--    Today report--}}
    <div class="card-body container-fluid">
        <p class="text-capitalize"><strong>
                Todays Reports
            </strong></p>
        <table class="table table-bordered table-striped dataTable" id="today_report">
            <thead>
            <th>New Case Count</th>
            <th>Fatality Count</th>
            <th>Node city</th>
            <th>Node Manager</th>
            <th>See More...</th>
            </thead>
            <tbody>

            @foreach($today_reports as $item)
                <tr class="">
                    <td>{{$item->new_case_count}}</td>
                    <td>{{$item->fatality_count}}</td>
                    <td>{{\Illuminate\Support\Facades\DB::table('control_nodes')->where('id',$item->control_node_id)->value('node_city')}}</td>
                    <td>{{\Illuminate\Support\Facades\DB::table('users')->where('id',
                   \Illuminate\Support\Facades\DB::table('control_nodes')->where('id',$item->control_node_id)->value('node_manager'))->value('first_name')
                        ." ".
                        \Illuminate\Support\Facades\DB::table('users')->where('id',
                     \Illuminate\Support\Facades\DB::table('control_nodes')->where('id',$item->control_node_id)->value('node_manager'))->value('last_name')
                        }}
                    </td>
                    <td><a href="{{route('ReportDetail',$item->id)}}">Detail</a></td>
                </tr>
            @endforeach
        </table>
    </div>

    {{--    All Reports Sent--}}
    <div class="card-body container-fluid">
        <p class="text-capitalize"><strong>
                All Daily Reports
            </strong></p>
        <table class="table table-bordered table-striped" id="all_daily_report">
            <thead>
            <th>New Case Count</th>
            <th>Fatality Count</th>
            <th>Node city</th>
            <th>Sent Date</th>
            <th>Node Manager</th>
            <th>See More...</th>
            </thead>
            <tbody>

            @foreach($daily_reports as $item)
                <tr class="">
                    <td>{{$item->new_case_count}}</td>
                    <td>{{$item->fatality_count}}</td>
                    <td>{{\Illuminate\Support\Facades\DB::table('control_nodes')->where('id',$item->control_node_id)->value('node_city')}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{\Illuminate\Support\Facades\DB::table('users')->where('id',
                   \Illuminate\Support\Facades\DB::table('control_nodes')->where('id',$item->control_node_id)->value('node_manager'))->value('first_name')
                        ." ".
                        \Illuminate\Support\Facades\DB::table('users')->where('id',
                     \Illuminate\Support\Facades\DB::table('control_nodes')->where('id',$item->control_node_id)->value('node_manager'))->value('last_name')
                        }}
                    </td>
                    <td><a href="{{route('ReportDetail',$item->id)}}">Detail</a></td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
