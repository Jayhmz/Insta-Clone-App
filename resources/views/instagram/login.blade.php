@extends('layout.app')
@section('title', 'Instagram-login')
@section('mainpart')
    <div class="container-fluid">
        <div class="login-box">
        <div class="card">
            <h2>Instagram</h2>
            <div class="card-body">
                <form action="{{route('instagram.login')}}" method="POST">

                   @if(Session::get('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::get('error'))
                        <div class="alert alert-success">{{Session::get('error')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <span class="text-danger error">@error('username'){{$message}} @enderror</span>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{old('username')}}">
                        </div>
                        <div class="form-group">
                            <span class="text-danger error">@error('password'){{$message}} @enderror</span>
                            <input type="text" class="form-control" name="password" placeholder="Password" value="{{old('password' )}}">
                        </div>
                    <button class="btn btn-block btn-primary" type="submit">Log In</button>
                </form>
                <div class="divide">
                    <hr><span>OR</span>
                    <hr>
                </div>
                <div class="facebook">
                    <button class=" btn logo"><span>Log in with Facebook</span></button>
                </div>
                <div class="forgot">
                    <a href="passwordRecovery"><span class="fpass">Forgot password?</span></a>
                </div>
            </div>
        </div>
        <div class="card card2">
            <div class="register">
                <p>Don't have an account? <a href="{{route('instagram.signup')}}"><span class="signup">Sign up</span></p></a>
            </div>
        </div>
        </div>
    </div>
@endsection
