@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Login Form') }}</div>

                <div class="card-body">
                    <form action="{{ url('login') }}" method="POST">
                        @csrf

                        <div>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                                required>
                            @error('email')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div>
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" name="password" required>
                            @error('password')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group row mt-2">
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    @endsection