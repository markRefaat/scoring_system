@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">

                    {{-- <div class="alert alert-info text-center">
                        <b>سوف يتم فتح تسجيل الهدايا يوم السبت بعد انتهاء المؤتمر</b>
                    </div> --}}

                    {{-- <div class="alert alert-info text-center"><b>تم انتهاء موعد حجز الهدايا</b></div>
                    <div class="alert alert-warning text-center" role="alert">
                        أستلام الهدايا من الكنيسة يوم الاحد 23/8 من الساعة 4 الى 8 امام مبنى الانبا ونس
                        <br>
                        لمن لا يناسبه الموعد برجاء مراسلة فيلوباتير على الواتساب على الرقم 01203566808
                    </div> --}}


                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username"
                                class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror"
                                    style="text-transform:uppercase;" on
                                    keyup="javascript:this.value=this.value.toUpperCase();" name="username"
                                    value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
