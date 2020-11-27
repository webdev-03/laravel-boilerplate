@extends('auth.app',['class'=>'register-page'])
@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="{{route('home')}}">
        <img src="{{asset('assets/images/logo/logo.png')}}" height="50">
    </a>
  </div>
  <div class="card card-outline card-primary">
    <div class="card-header ">
      <h3 class="card-title float-none text-center">Register a new membership </h3>
    </div>
    <div class="card-body register-card-body ">
      <form action="" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Full name" autofocus="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user "></span>
            </div>
          </div>
          @error('name')
            <div class="invalid-feedback">
                <strong>{{$message}}</strong>
            </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control @error('name') is-invalid @enderror" value="{{old('email')}}" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope "></span>
            </div>
          </div>
          @error('email')
              <div class="invalid-feedback">
                <strong>{{$message}}</strong>
            </div>
          @enderror
        </div>
        <div class="input-group mb-3">
            <input type="tel" name="number" class="form-control @error('name') is-invalid @enderror" value="{{old('number')}}" placeholder="Number">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone-alt"></span>
              </div>
            </div>
            @error('number')
                <div class="invalid-feedback">
                  <strong>{{$message}}</strong>
              </div>
            @enderror
          </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock "></span>
            </div>
          </div>
          @error('password')
              <div class="invalid-feedback">
                <strong>{{$message}}</strong>
            </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock "></span>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-block btn-flat btn-primary"><span class="fas fa-user-plus"></span>Register</button>
      </form>
    </div>
    <div class="card-footer">
      <p class="my-0"><a href="{{route('login')}}">I already have a membership</a></p>
    </div>
  </div>
</div>
@endsection