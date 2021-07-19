@extends('layout.app')
@section('title', 'Instagram-signup')
@section('mainpart')
    <div class="login-box">
        <div class="card">
            <h2>Instagram</h2>
            <p>Sign up to see photos and videos from your friends</p>
            <div class="facebook">
                <button class=" btn btn-primary fb"><span>Log in with Facebook</span></button>
            </div>
            <div class="divide">
                <hr><span>OR</span>
                <hr>
            </div>
            <form action="{{route('instagram.register')}}" method="POST">
            @if(Session::get('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::get('error'))
                        <div class="alert alert-success">{{Session::get('error')}}</div>
                    @endif
                @csrf
                <div class="form-group">
                <span class="error">@error('fullname'){{$message}} @enderror</span>
                <input type="text" class="form-control" name="fullname" placeholder="Fullname" value="{{old('fullname' )}}">
                </div>
                <div class="form-group">
                <span class="error">@error('email'){{$message}} @enderror</span>
                <input type="text" class="form-control" name="email" placeholder="Email@mail.com" value="{{old('email')}}">
                </div>
                <div class="form-group">
                <span class="error">@error('phone'){{$message}} @enderror</span>
                <input type="text" class="form-control" name="phone" placeholder="Phone No." value="{{old('phone')}}">
                </div>
                <div class="form-group">
                <span class="error">@error('username'){{$message}} @enderror</span>
                <input type="text" class="form-control" name="username" placeholder="Username" value="{{old('username')}}">
                </div>
                <div class="form-group">
                <span class="error">@error('password'){{$message}} @enderror</span>
                <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="btn-container">
                <button class="btn btn-block btn-primary" type="submit">Sign up</button>
                </div>
            </form>
            <div class="paragraph">
                <p>By signing up, you agree to our Terms , Data Policy and Cookies Policy .</p>
            </div>
        </div>
        <div class="card card2">
            <div class="login">
                <p> Have an account? <a href="{{ route('instagram.login')}}"><span class="signup">Log in</span></p></a>
            </div>
        </div>
    </div>
@endsection
