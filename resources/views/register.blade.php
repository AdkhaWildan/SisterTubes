@extends('layout.main')

@section('container')

<div class="container">
    <div class="row content">
        <div class="col-md-6 mb-3 m-lg-auto px-5">
            <img src="asset/logo.png" class="img-fluid" alt="image">
        </div>
        <div class="col-md-4">
            <h3 class="signin-text mb-5"> Sign Up </h3>
            <form class="space-y-6" action="/register" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label for="name" class="@error('username') is-invalid @enderror">Name</label>
                    <input type="text" id="name" name="name" required value="{{ old('name') }}" required
                        class="form-control">
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="email" class="text-slate-700 text-sm @error('email') is-invalid @enderror">Email</label>
                    <input type="email" id="email" name="email" required value="{{ old('email') }}" required
                        class="form-control">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required class="form-control">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="password"
                        class="text-slate-700 text-sm @error('password') is-invalid @enderror">Password
                        Confirmation</label>
                    <input type="password" id="password" name="password_confirmation" required class="form-control">
                </div>
                <button class="btn btn-class mb-2" type="submit">Sign
                    Up</button>
                <div class="form-group mb-4">
                    <label class="label">Already have an account? <a href="/login">Sign In</a></label>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection