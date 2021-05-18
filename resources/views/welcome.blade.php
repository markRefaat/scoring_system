@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="welcome container text-center">
      @php
      $date = \Carbon\Carbon::create(2021, 5, 22, 21, 0, 0,"Africa/Cairo");
      @endphp
      @if(\Carbon\Carbon::now("Africa/Cairo")->lessThan($date))
      <div class="alert alert-secondary">
        <h3>Countdown</h3>
        <br>
        <h2>Saturday 22 May 9 PM</h2>
        <script class="bfee5df0a230e659ce5819cf0b480a56" src="https://w.promofeatures.com/js/timer/bfee5df0a230e659ce5819cf0b480a56.js?v=1621368304" ></script>
      </div>
      @endif    
      <div class="card mb">
            <div class="row g-0 d-flex align-items-center">
              <div class="col-md-4">
                <img
                  src="logo-lion.png"
                  alt="..."
                  class="img-fluid"
                />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p class="card-text">
                  
                    <h3>Welcome To Abaa Family Mr.Clock's Gifts Store</h3> 
                  </p>
                  <div>
                    <br>
                    @if(\Carbon\Carbon::now("Africa/Cairo")->lessThan($date))
               
                      <div class="alert alert-info" style="direction: rtl"> الويب سايت هيفتح يوم السبت الساعة 9 بالليل و الusername و الpassword ممكن تاخدهم من الخادم يوم السبت بعد العشية</div>
                     @else 
                     @auth
                     <a class="btn btn-primary btn-rounded btn-lg" href="{{ url('/home') }}">Home</a>
                   @else
                     <a class="btn btn-primary btn-rounded btn-lg" href="{{ route('login') }}">Login</a>
                     @endauth
                     @endif 
                    </div>
                </div>
              </div>
            </div>
          </div>

 
</div>
<style>
    .welcome{
        padding: 10px;
        margin-top: 2%;
    }
    .img-fluid{
        padding: 10px;
    }
    .btn{
        border-radius: 10px;
    }
</style>
@endsection

