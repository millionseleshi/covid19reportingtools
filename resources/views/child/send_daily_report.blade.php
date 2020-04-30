<?php
/**
 * Created by PhpStorm.
 * User: Million
 * Date: 3/13/2019
 * Time: 10:16 PM
 */
?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Claims Form')}}</div>

                    <div class="card-body">

                        <form method="POST" action="{{route('SendReport')}}">
                            @csrf

                            <div class="form-group row col-md-12">

                                <label for="new_case_count"
                                       class="col-md-3 col-form-label float-left">{{__('New case Count') }}</label>

                                <div class="col-md-7">
                                    <input id="new_case_count" type="number" min="0"
                                           class="form-control{{ $errors->has('new_case_count') ? ' is-invalid' : '' }}"
                                           name="new_case_count" placeholder="Enter new case count"
                                           value="{{ old('new_case_count') }}" required autofocus>

                                    @error('new_case_count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_case_count') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row col-md-12">

                                <label for="new_case_count"
                                       class="col-md-3 col-form-label float-left">{{__('New Fatality Count') }}</label>

                                <div class="col-md-7">
                                    <input id="fatality_count" type="number" min="0"
                                           class="form-control{{ $errors->has('fatality_count') ? ' is-invalid' : '' }}"
                                           name="fatality_count" placeholder="Enter new fatality count"
                                           value="{{ old('fatality_count') }}" required autofocus>

                                    @error('fatality_count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fatality_count') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row col-md-12">

                                <div class="col-md-auto">
                                    <textarea id="editor1" placeholder="{{__('Remark')}}" name="summary" style="width: 100%" cols="74" rows="4"
                                              class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row col-md-auto">


                                <div class="form-group row col-md-12">
                                    <div class="col-md-7"></div>
                                    <div class="col-md-auto float-right">
                                        <button class="btn btn-outline-info entypo-upload-cloud"
                                                type="submit">{{__('Send Report')}}</button>
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
