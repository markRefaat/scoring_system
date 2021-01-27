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

                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif

                    {{ __('Your score') }}
                    <div class="alert alert-success">{{$user->score}}</div>
                </div>
                
                
                
                
                @if ($user->staticScore >= 200)
            </div>
            </div>
            </div>
            </div>
            <br>
                <div  class="container text-center">
                    <h2 class="alert alert-info" > الفئات</h2>
                <div class="row justify-content-around">
                    <div onclick="location.href='/products/chocolates'" class="card" style="width: 18rem; margin-bottom: 2%">
                        <img class="card-img-top" src="/categories/chocolates.jpg" alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">شيكولاتات</p>
                        </div>
                      </div>
                      <div class="card" onclick="location.href='/products/home-appliances'" style="width: 18rem; margin-bottom: 2%">
                        <img class="card-img-top" height="80%" src="/categories/home4.jpeg" alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">ادوات منزلية و قسائم شراء</p>
                        </div>
                      </div>
                      <div class="card" onclick="location.href='/products/electronics'" style="width: 18rem; margin-bottom: 2%">
                        <img class="card-img-top" src="/categories/electronics.jpg" alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">اليكترونيات</p>
                        </div>
                   
                      </div>
                </div>
                
                </div>
                @else
                <div class="card-footer">
                    <div class="btn btn-primary">ليس لديك نقاط كافية - الحد الادني 200 نقطة</div>
                    <br><img width="50%" src="/empty.svg" alt="My SVG Icon">
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<br>


@endsection



