@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$response["total_case"]}}</h3>

                    <p>Case Count</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$response["node_count"]}}</h3>

                    <p>Node Count</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$response["total_manager"]}}</h3>

                    <p>Node Managers</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$response["total_fatality_count"]}}</h3>

                    <p>Total Fatality Count</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="container">
                    <div class="card-header">Node Managers List</div>
                    <div class="card-body container-fluid">
                        <table class="table table-bordered table-striped" id="user_table">
                            <thead>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Alternative Phone Number</th>
                            <th>Email</th>
                            </thead>
                            <tbody>
                            @foreach(\App\User::all()->where('role','!=','admin') as $item)
                                <tr class="">
                                    <td>{{$item->first_name." ".$item->last_name}}</td>
                                    <td>{{$item->phone_number}}</td>
                                    <td>{{$item->alternative_phone_number}}</td>
                                    <td>{{$item->email}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="container">
                    <div class="card-header">Control Node List</div>

                    <div class="card-body container-fluid">
                        <table class="table table-bordered table-striped" id="control_node_table">
                            <thead>
                            <th>Node City</th>
                            <th>Node SubCity</th>
                            <th>Node Woreda</th>
                            <th>Node Kebele</th>
                            <th>Node Manager</th>
                            </thead>
                            <tbody>
                            @foreach(\App\ControlNode::all() as $item)
                                <tr class="">
                                    <td>{{$item->node_city}}</td>
                                    <td>{{$item->node_subcity}}</td>
                                    <td>{{$item->node_woreda}}</td>
                                    <td>{{$item->node_kebela}}</td>
                                    <td>{{\App\User::where('id',$item->node_manager)->value('first_name')." ".
                    \App\User::where('id',$item->node_manager)->value('last_name')
                    }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
