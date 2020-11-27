@extends('layouts.main',['name' => 'home'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
                        @can('permission.index')
                            <li class="nav-item">
                                <a class="nav-link" href="{!!  route('user.index') !!}"><i
                                        class="fa fa-list mr-2"></i>{{ __('User List') }}</a>
                            </li>
                        @endcan
                        @can('permission.create')
                            <li class="nav-item">
                                <a class="nav-link active" href="{!!  route('user.create') !!}"><i
                                        class="fa fa-plus mr-2"></i>{{ __('Create') }}</a>
                            </li>
                        @endcan
                    </ul>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.new') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Please Enter Your Name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Please Enter Your Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" name="username" id="username"
                                class="form-control @error('username') is-invalid @enderror"
                                placeholder="Please choose username or leave blank" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="number">Number</label>
                            <input type="tel" name="number" id="number"
                                class="form-control @error('number') is-invalid @enderror"
                                placeholder="Please Enter Your Number" value="{{ old('number') }}">
                            @error('number')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                                <option value="">Please Choose a Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Please Enter Password">
                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                placeholder="Please Confirm Password">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-lg btn-primary w-100">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
