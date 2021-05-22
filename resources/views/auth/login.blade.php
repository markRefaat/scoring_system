@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">

                    @php
                    $date = \Carbon\Carbon::create(2021, 5, 22, 21, 0, 0,"Africa/Cairo");
                    @endphp
                    @if(\Carbon\Carbon::now("Africa/Cairo")->lessThan($date))

                    <div class="alert alert-info text-center">
                        The webiste will open at 9 PM 
                        <hr>
                        الويب سايت هيفتح الساعة 9 مساء
                    </div>

                    @else 
                      <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>

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
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

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
                    @endif
                </div>
            </div>
        </div>
        <img width="50%" src="gift1.svg" alt="My SVG Icon">
    </div>
</div>
@endsection
