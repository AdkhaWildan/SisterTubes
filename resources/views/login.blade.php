@extends('layout.main')

@section('container')

<style>
#login {
    display: none
}
</style>


@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show w-100" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container">
    <div class="row content">
        <div class="col-md-6 mb-3 m-lg-auto px-5">
            <img src="asset/logo.png" class="img-fluid" alt="image">
        </div>
        <div class="col-md-4">
            <h3 class="signin-text mb-5"> Sign In </h3>
            <form class="mt-8 space-y-6" action="/login" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group form-check mb-4">
                    <input type="checkbox" name="checkbox" id="checkbox" class="form-check-input">
                    <label for="checkbox" class="form-check-label">Remember me</label>
                </div>
                <button class="btn btn-class">Login</button>
                <div class="form-group mb-4">
                    <label class="label">Dont't have an account? <a href="/register">Sign Up</a></label>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection