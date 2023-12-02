@extends('welcome')

@section('title', 'register page')

@section('content')
    @if (Session::has('msg'))
        <p class="text-center text-danger">{{ Session::get('msg') }}!</p>
    @endif
    <div class="container">
        <form action="{{ route('register_post') }}" method="post" class="container form mt-5 card col-6 p-3">
            @csrf
            @method('post')
            <h4 class="card-title mb-3">Registration Form</h4>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" class="m-1 form-control">
                @error('username')
                    <p class="text-danger">*{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="m-1 form-control">
            </div>
            @error('email')
                <p class="text-danger">*{{ $message }}</p>
            @enderror
            <div class="form-group mt-2">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                     class="form-control">
                @error('password_confirmation')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="checkbox" name="check" id="check" class="m-1">
                <label for="check">remember me</label>
            </div>
            <div class="form-group">
                <input type="submit" value="register" class="m-3 btn btn-primary">
            </div>
            <a href="{{ route('login') }}">Already have an account?Login</a>
        </form>
    </div>
@endsection
