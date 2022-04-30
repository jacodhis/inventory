
@extends('layouts.app')
@section('content')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <div class="card">
                <form  method="POST" action="{{ route('login') }}" class="box">
                @csrf
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your login and password!</p>
                    <input type="text" name="email" placeholder="Email" class="form-control">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                     <input type="submit" name="" value="Login" href="#">
                     <center> <a class="forgot text-muted "  href="#">Forgot password?</a></center>

                </form>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
@endsection

