@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Control Node Form')}}</div>

                    <div class="card-body">

                        <form method="POST" action="{{route('AddNode')}}">
                            @csrf
                            <div class="form-group row col-md-12">

                                <label for="node_city"
                                       class="col-md-3 col-form-label float-left">{{__('Node City') }}</label>

                                <div class="col-md-7">
                                    <input id="node_city" type="text"
                                           class="form-control{{ $errors->has('node_city') ? ' is-invalid' : '' }}"
                                           name="node_city" placeholder="Enter Node City"
                                           value="{{ old('node_city') }}" required autofocus>

                                    @error('node_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('node_city') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row col-md-12">

                                <label for="node_city"
                                       class="col-md-3 col-form-label float-left">{{__('Node SubCity') }}</label>

                                <div class="col-md-7">
                                    <input id="node_subcity" type="text"
                                           class="form-control{{ $errors->has('node_subcity') ? ' is-invalid' : '' }}"
                                           name="node_subcity" placeholder="Enter Node Subcity"
                                           value="{{ old('node_subcity') }}" required autofocus>

                                    @error('node_subcity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('node_subcity') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row col-md-12">

                                <label for="node_woreda"
                                       class="col-md-3 col-form-label float-left">{{__('Node Woreda') }}</label>

                                <div class="col-md-7">
                                    <input id="node_woreda" type="text"
                                           class="form-control{{ $errors->has('node_woreda') ? ' is-invalid' : '' }}"
                                           name="node_woreda" placeholder="Enter Node Woreda"
                                           value="{{ old('node_woreda') }}" required autofocus>

                                    @error('node_woreda')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('node_woreda') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row col-md-12">

                                <label for="node_kebela"
                                       class="col-md-3 col-form-label float-left">{{__('Node Kebele') }}</label>

                                <div class="col-md-7">
                                    <input id="node_kebela" type="text"
                                           class="form-control{{ $errors->has('node_kebela') ? ' is-invalid' : '' }}"
                                           name="node_kebela" placeholder="Enter Node Kebele"
                                           value="{{ old('node_kebela') }}" required autofocus>

                                    @error('node_kebela')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('node_kebela') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row col-md-12">

                                <label for="node_name"
                                       class="col-md-3 col-form-label float-left">{{__('Node Name') }}</label>

                                <div class="col-md-7">
                                    <input id="node_name" type="text"
                                           class="form-control{{ $errors->has('node_name') ? ' is-invalid' : '' }}"
                                           name="node_name" placeholder="Enter Node Name"
                                           value="{{ old('node_name') }}" required autofocus>

                                    @error('node_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('node_name') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row col-md-12">

                                <div class="col-md-auto">
                                    <textarea id="editor1" placeholder="{{__('Additional Information')}}"
                                              name="node_detail" style="width: 100%" cols="74" rows="4"
                                              class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row col-md-12">
                                <label for="irregularity"
                                       class="col-md-3 col-form-label float-left">{{__('Node Manager') }}</label>

                                <div class="col-md-7">
                                    <select id="node_manager"
                                            class="form-control select2  {{ $errors->has('node_manager') ? ' is-invalid' : '' }}"
                                            name="node_manager"
                                            value="{{ old('node_manager') }}"
                                            style="width: 100%;">
                                        @foreach($users as $user)
                                            <option
                                                value="{{$user->id}}">{{$user->first_name." ".$user->last_name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('node_manager'))
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('node_manager') }}</strong>
                                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row col-md-8">


                                <label for="central_node_type"
                                       class="col-form-label float-md-left mr-3">{{__('Central') }}</label>

                                <div class="col-md-3">
                                    <input id="central_node_type" type="radio" class="form-control icheckbox_flat-aero"
                                           name="node_type" value="central" required>
                                </div>

                                <label for="child_node_type"
                                       class="col-form-label text-md-right">{{__('Child') }}</label>

                                <div class="col-md-3">
                                    <input id="child_node_type" type="radio" class="form-control icheckbox_flat-aero"
                                           name="node_type" value="child" required>
                                </div>


                            </div>

                            <div class="form-group row col-md-auto">


                                <div class="form-group row col-md-12">
                                    <div class="col-md-7"></div>
                                    <div class="col-md-auto float-right">
                                        <button class="btn btn-outline-info entypo-upload-cloud"
                                                type="submit">{{__('Add Node')}}</button>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
