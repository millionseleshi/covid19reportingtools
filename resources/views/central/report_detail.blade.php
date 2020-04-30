@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Daily Report Detail')}}</div>

                    <div class="card-body">
                        <div class="form-group row col-md-12">

                            <label for="node_city"
                                   class="col-md-3 col-form-label float-left">{{__('New Case Count') }}</label>

                            <div class="col-md-7">
                                <input id="node_city" type="text"
                                       class="form-control"
                                       value={{$responses["new_case_count"]}}  disabled autofocus>
                            </div>
                        </div>

                        <div class="form-group row col-md-12">

                            <label for="node_city"
                                   class="col-md-3 col-form-label float-left">{{__('Fatality Count') }}</label>

                            <div class="col-md-7">
                                <input id="node_city" type="text"
                                       class="form-control"
                                       value="{{$responses["fatality_count"]}}"  disabled autofocus>
                            </div>
                        </div>

                        <div class="form-group row col-md-12">

                            <label for="node_city"
                                   class="col-md-3 col-form-label float-left">{{__('Summary') }}</label>

                            <div class="col-md-7">
                                <input id="node_city" type="text"
                                       class="form-control"
                                       value="{{$responses["summary"]}}"  disabled autofocus>
                            </div>
                        </div>

                        <div class="form-group row col-md-12">

                            <label for="node_city"
                                   class="col-md-3 col-form-label float-left">{{__('Node Manager') }}</label>

                            <div class="col-md-7">
                                <input id="node_city" type="text"
                                       class="form-control"
                                       value="{{$responses["node_manager"]}}"  disabled autofocus>
                            </div>
                        </div>

                        <div class="form-group row col-md-12">

                            <label for="node_city"
                                   class="col-md-3 col-form-label float-left">{{__('Node City') }}</label>

                            <div class="col-md-7">
                                <input id="node_city" type="text"
                                       class="form-control"
                                       value="{{$responses["node_city"]}}"  disabled autofocus>
                            </div>
                        </div>

                        <div class="form-group row col-md-12">

                            <label for="node_city"
                                   class="col-md-3 col-form-label float-left">{{__('Node SubCity') }}</label>

                            <div class="col-md-7">
                                <input id="node_city" type="text"
                                       class="form-control"
                                       value="{{$responses["node_subcity"]}}" disabled autofocus>
                            </div>
                        </div>

                        <div class="form-group row col-md-12">

                            <label for="node_city"
                                   class="col-md-3 col-form-label float-left">{{__('Node Woreda') }}</label>

                            <div class="col-md-7">
                                <input id="node_city" type="text"
                                       class="form-control"
                                       value="{{$responses["node_woreda"]}}" disabled autofocus>
                            </div>
                        </div>

                        <div class="form-group row col-md-12">

                            <label for="node_city"
                                   class="col-md-3 col-form-label float-left">{{__('Node Kebele') }}</label>

                            <div class="col-md-7">
                                <input id="node_city" type="text"
                                       class="form-control"
                                       value="{{$responses["node_kebela"]}}" disabled autofocus>
                            </div>
                        </div>

                        <div class="form-group row col-md-12">

                            <label for="node_city"
                                   class="col-md-3 col-form-label float-left">{{__('Node Name') }}</label>

                            <div class="col-md-7">
                                <input id="node_city" type="text"
                                       class="form-control"
                                       value="{{$responses["node_name"]}}"  disabled autofocus>
                            </div>
                        </div>

                        <div class="form-group row col-md-12">

                            <label for="node_city"
                                   class="col-md-3 col-form-label float-left">{{__('Node Contact Number') }}</label>

                            <div class="col-md-7">
                                <input id="node_city" type="text"
                                       class="form-control"
                                       value="{{$responses["node_contact"]}}" disabled autofocus>
                            </div>
                        </div>

                        <div class="form-group row col-md-auto">


                            <div class="form-group row col-md-12">
                                <div class="col-md-7"></div>
                                <div class="col-md-auto float-right">
                                    <button class="btn btn-outline-info entypo-upload-cloud"
                                            type="submit">{{__('Print')}}</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
