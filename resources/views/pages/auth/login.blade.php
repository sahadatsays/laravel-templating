@extends('layout')

@section('title', 'Login Page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('login.submit') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Login </h2>
                        </div>
                        <div class="card-body">
                            <div class="justify-content-center row">
                                <div class="col-md-4">
                                    @if ($errors->has('login_fail'))
                                        <strong class="text-danger">{{ $errors->first('login_fail') }}</strong>
                                    @endif
                                    <div class="mb-4">
                                        <label for="email">Email</label>
                                        <input type="text" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Enter Email">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-4">
                                        <label for="password">Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="*******">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <button class="btn btn-success" type="submit">Login </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
