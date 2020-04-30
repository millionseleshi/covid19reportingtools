@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('AddUser') }}">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="first_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" placeholder="First Name"
                                           class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                           name="first_name" value="{{ old('first_name') }}" required autofocus>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" placeholder="Father's Name"
                                           class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                           name="last_name" value="{{ old('last_name') }}" required autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="number"
                                           class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                           name="phone_number" value="{{ old('phone_number') }}" required autofocus>

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="alternative_phone_number"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Addition PhoneNumber') }}</label>

                                <div class="col-md-6">
                                    <input id="alternative_phone_number" type="number"
                                           class="form-control{{ $errors->has('alternative_phone_number') ? ' is-invalid' : '' }}"
                                           name="alternative_phone_number" value="{{ old('alternative_phone_number') }}"
                                           autofocus>

                                    @error('alternative_phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alternative_phone_number') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="central_node_type"
                                       class="col-form-label float-md-left mr-3">{{__('Central Node Manager') }}</label>

                                <div class="col-md-3">
                                    <input id="central_node_type" type="radio" class="form-control icheckbox_flat-aero"
                                           name="role" value="central_node_manager" required>
                                </div>

                                <div class="col-md-3">
                                    <input id="child_node_type" type="radio" class="form-control icheckbox_flat-aero"
                                           name="role" value="child_node_manager" required>
                                </div>

                                <label for="child_node_type"
                                       class="col-form-label text-md-right">{{__('Child Node Manager') }}</label>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
