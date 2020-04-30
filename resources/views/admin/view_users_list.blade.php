@extends('layouts.app')
@section('content')
    <div class="card-body container-fluid">
        <p class="text-capitalize"><strong>
                Todays Reports
            </strong></p>
        <table class="table table-bordered table-striped dataTable" id="users_list_table">
            <thead>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Alternative Phone Number</th>
            <th>Job Title</th>
            </thead>
            <tbody>

            @foreach($users as $item)
                <tr class="">
                    <td>{{$item->id}}</td>
                    <td>{{$item->first_name}}</td>
                    <td>{{$item->last_name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone_number}}</td>
                    <td>{{$item->alternative_phone_number}}</td>
                    <td>{{str_replace('_',' ',$item->role)}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    @endsection
