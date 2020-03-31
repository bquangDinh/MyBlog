@extends('layouts.main_layout')

@section('title')
Login
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
@endsection

@section('main-content')
<div style="margin-top: 70px"></div>
<div class="login-container w-100 py-5">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form id="login-form" class="d-flex justify-content-center align-items-center flex-column" action="{{ route('login') }}" method="post">
                @csrf
                <div class="point-deep-shadow" style="top: 10px; left: 10px"></div>
                <div class="point-deep-shadow" style="top: 10px; right: 10px"></div>
                <div class="point-deep-shadow" style="bottom: 10px; left: 10px"></div>
                <div class="point-deep-shadow" style="bottom: 10px; right: 10px"></div>
                @error('auth')
                {{$message}}
                @enderror
                <div class="row form-group">
                    <div class="col-3">
                        <div class="input-icon d-flex justify-content-center align-items-center">
                            <i class="fas fa-user-ninja"></i>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="field d-flex justify-content-center align-items-center">
                                <input type="email" placeholder="Email" name="email">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-3">
                        <div class="input-icon d-flex justify-content-center align-items-center">
                            <i class="fas fa-key"></i>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="field d-flex justify-content-center align-items-center">
                                <input type="password" placeholder="Password" name="password">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" id="login-btn">Login</button>
                    </div>               
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
@endsection

@section('js')
@endsection