@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="welcome container text-center">
        
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
                    @auth
                      <a class="btn btn-primary btn-rounded btn-lg" href="{{ url('/home') }}">Home</a>
                    @else
                      <a class="btn btn-primary btn-rounded btn-lg" href="{{ route('login') }}">Login</a>
                      @endauth
                    </div>
                </div>
              </div>
            </div>
          </div>

 
</div>
<style>
    .welcome{
        padding: 30px;
        margin: 3%;
    }
    .img-fluid{
        padding: 10px;
    }
    .btn{
        border-radius: 10px;
    }
</style>
@endsection

