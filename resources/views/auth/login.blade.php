@extends('layouts.auth')

@section('content')
<div class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
            <div class="card auth-card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="text-center mb-1">
                        <h1 class="display-5">Login</h1>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                            @csrf

                            <fieldset class="form-group position-relative auth-form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail address" value="{{ old('email') }}" required autofocus/>
                            </fieldset> 
                             <fieldset class="form-group position-relative auth-form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autocomplete="current-password" />
                            </fieldset>                            
                             <fieldset class="form-group position-relative auth-form-group">
                                <label for="remember_me">
                                    <input type="checkbox" id="remember_me" class="form-checkbox">
                                    <span>Remember Me</span>
                                </label>
                            </fieldset> 

                            <div class="form-group auth-form-group row">
                                @if (Route::has('password.request'))
                                    <div class="col-md-6 col-12 text-center text-sm-left"></div>
                                    <div class="col-md-6 col-12 float-sm-left text-center text-sm-right">
                                        <a href="{{ route('password.request') }}" class="card-link">Forgot Password?</a>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group auth-form-group text-center">
                                <button type="submit" class="btn auth-btn col-12 mr-1 mb-1">Login</button>
                            </div>

                            <hr />

                            <p class="card-subtitle text-muted text-right mx-2 my-1">
                                Don't have an account? <a href="{{ route('register') }}" class="card-link">Sign Up</a>!
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection