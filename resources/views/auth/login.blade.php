
@extends('layouts.app')
<style>
body{
    /* background-color: rgba(8, 8, 6, 0.904); */

   direction:rtl;

 }
 .loginback{
    background-image: url("{{ asset('img/loginbackground.jpg') }}");
    width: 100%;
    height: 100%;
 }


</style>
<!-- rgb(203 203 203 / 27%) -->
@section('content')
<div  class="loginback">
<div class="container">
    <div class="row justify-content-center" style="padding-top: 120px;">
<div class="col-lg-4 col-md-8">
    <div class="card" style=" border:1px solid black;">
        <div class="card-header" style="text-align: center; font-size:50px; background: rgb(0 53 82); color:rgb(248, 248, 245)"><h3>{{ __('تسجيل الدخول') }}</h3></div>

        <div class="card-body" style="background:rgb(203 203 203 / 27%);">
            <form method="POST" action="{{ route('login') }}" >
                @csrf
                <div class="form-group row" style=" font-size:25px;">
                  

                  <div class="col-lg-12 col-md-6">
                      <input id="user_name" type="username" placeholder="{{ __('اسم المستخدم') }}" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

                      @error('user_nsme')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

                <div class="form-group row" style=" font-size:25px;">
                     

                    <div class="col-lg-12 col-md-6">
                        <input id="password" type="password" placeholder="{{ __('كلمة المرور') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
<!-- 
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4" style="font-size:20px; padding:2px;" >
                        <div class="form-check" >
                            <label class="form-check-label" for="remember" style="padding-right:20px;" >
                                {{ __('  تذكرني') }}
                            </label>
                             &nbsp
                           
                            <input class="form-check-input" type="checkbox"   name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                       
                            
                        </div>
                    </div>
                </div> -->

                <div class="form-group row mb-0">
                    <div class="col-lg-8 col-md-8 m-auto  offset-md-4">
                        <button type="submit" class="btn btn-primary col-lg-12" style="background: rgb(0 53 82);">
                            {{ __('تسجيل') }}
                        </button>

                        {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
</div>

</div>
@endsection 

