@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">{{ __('Welcome') }} {{ $user->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Your score') }}
                    <div class="alert alert-success">{{$user->score}}</div>
                </div>
                @if ($user->score >= 250)
                <div class="card-footer">
                    <a class="btn btn-primary" href="/store">Choose Gift</a>
                </div>
                @else
                <div class="card-footer">
                    <div class="btn btn-primary">ليس لديك نقاط كافية - الحد الادني 250 نقطة</div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<br>

<div class="container-fluid text-center">
    <h2 class="alert alert-info"> الهدايا</h2>
    <img src="gifts/1.jpeg" class="img-fluid" alt="Responsive image">
    <img src="gifts/2.jpeg" class="img-fluid" alt="Responsive image">
    <img src="gifts/3.jpeg" class="img-fluid" alt="Responsive image">
    <img src="gifts/4.jpeg" class="img-fluid" alt="Responsive image">
    <img src="gifts/5.jpeg" class="img-fluid" alt="Responsive image">
    <img src="gifts/6.jpeg" class="img-fluid" alt="Responsive image">
    <img src="gifts/7.jpeg" class="img-fluid" alt="Responsive image">
</div>

@endsection
