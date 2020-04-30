@extends('layouts.app')
@section('content')
    <div class="card-body container-fluid">
        <p class="text-capitalize"><strong>
                Sent Reports
            </strong></p>
        <table class="table table-bordered table-striped dataTable" id="sent_report_table">
            <thead>
            <th>Id</th>
            <th>New Case Count</th>
            <th>Fatality Count</th>
            <th>Summery</th>
            <th>Action</th>
            </thead>
            <tbody>
            @foreach($daily_reports as $item)
                <tr class="">
                    <td>{{$item->id}}</td>
                    <td>{{$item->new_case_count}}</td>
                    <td>{{$item->fatality_count}}</td>
                    <td>{{$item->summary}}</td>
                    <td>
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#setEditModal"
                                data-reportid="{{$item->id}}"
                                data-newcasecount="{{$item->new_case_count}}"
                                data-fatalitycount="{{$item->fatality_count}}"
                                data-summary="{{$item->summary}}">
                            Edit
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="modal fade" id="setEditModal" tabindex="-1" role="dialog" aria-labelledby="SentReportModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('EditReport')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input name="id" id="report_id" hidden>
                            @error('new_case_count')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                            @enderror
                            <label for="recipient-name" class="col-form-label">New Case Count:</label>
                            <input type="text" class="form-control" name="new_case_count" id="new_case_count">
                            @error('new_case_count')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_case_count') }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Fatality Count:</label>
                            <input type="text" class="form-control" name="fatality_count" id="fatality_count">
                            @error('fatality_count')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fatality_count') }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Summary:</label>
                            <textarea class="form-control" name="summary" id="summary"></textarea>
                        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Report</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
