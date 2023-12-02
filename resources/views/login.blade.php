@extends('welcome')

@section('title', 'login page')

@section('content')
@if (Session::has('msg'))
    <p class="text-center text-danger">{{Session::get('msg')}}!</p>
@endif
    <div class="container">
        <form action="{{route('login_post')}}" method="post" class="form container mt-5 card col-6 p-3">
           @csrf
           @method('post')
            <h4 class="card-title mb-3">Login Form</h4>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="m-1 form-control">
                @error('username')
                <p class="text-danger">*{{ $message }}</p>
            @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="m-1 form-control">
                @error('password')
                    <p class="text-danger">*{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="checkbox" name="check" id="check" class="m-1">
                <label for="check">remember me</label>
            </div>
            <div class="form-group">
                <input type="submit" value="Login" class="m-3 btn btn-primary">
            </div>
            <a href="{{route('register')}}">Not a user?Create Account</a>
        </form>
    </div>
@endsection
