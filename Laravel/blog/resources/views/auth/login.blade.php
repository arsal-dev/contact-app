@extends('layouts')


@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>login</h1>
                        <span class="subheading">Login to admin panel</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <h3>login</h3>
        <form action="{{ route('login') }}" method="POST" class="p-2">
            @csrf
            <div>
                <label for="email">email</label>
                <input type="email" id="email" value="{{ old('email') }}" name="email" class="form-control">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password">password</label>
                <input type="password" id="password" name="password" class="form-control">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <input type="submit" value="login" name="submit" class="btn btn-primary mt-3">

            <p>Don't have an account? <a href="{{ route('register') }}">register</a></p>
        </form>
    </div>
@endsection
