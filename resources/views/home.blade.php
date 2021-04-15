@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">{{ __('Welcome') }} {{ $user->name }}</div>

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
                        <div class="alert alert-success">{{ $user->score }}</div>
                    </div>



                </div>
            </div>

        </div>
    </div>
    @if($welcome)
    <div style="margin-top: 2%" class="container text-center">
      <div class="alert alert-success text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading">Welcome to Mr.clock's gift store!</h4>
        <p>hello {{$user->name}} welcome, because you logged in for the first time mr.clock has given you a <span style="font-size: 30px; font-weight: bold">  50  </span> momento bonus &#128516; &#129321; &#129321; !! Now check the gifts categories below and find what you like.</p>
        <hr>
        <p class="mb-0">اهلا يا {{$user->name}} علشان انت دخلت الويب سايت مستر كلوك مديلك هدية <span style="font-size: 30px; font-weight: bold">  50  </span>   .مومينتو بونص &#128516; &#129321; &#129321; يلا انزل تحت واتفرج على الهدايا وشوف ايه اللى عجبك  </p>
      </div>
    </div>
    @endif
    <br>
    <div class="container text-center">
        <h2 class="alert alert-info"> Categories</h2>
        <div class="row justify-content-around">
            <div class="col-lg-3 mol-md-10">
                <div style="width: 99% margin-top:2%" onclick="location.href='/products/chocolates'" class="card"
                    style="width: 18rem; margin-bottom: 2%">
                    <img class="card-img-top" height="200px" src="/categories/chocolates.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">chocolates</p>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 mol-md-10">
                <div style="width: 99%; margin-top:2%" class="card" onclick="location.href='/products/games'"
                    style="width: 18rem; margin-bottom: 2%">
                    <img class="card-img-top" height="200px" src="/categories/games.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Games</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mol-md-10">
                <div style="width: 99%; margin-top:2%" class="card" onclick="location.href='/products/electronics'"
                    style="width: 18rem; margin-bottom: 2%">
                    <img class="card-img-top" height="200px" src="/categories/electronics.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Electronics and accessories</p>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 mol-md-10">
                <div style="width: 99%; margin-top:2%" class="card" onclick="location.href='/products/sports'"
                    style="width: 18rem; margin-bottom: 2%">
                    <img class="card-img-top" height="200px" src="/categories/sports.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Sports</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- <div class="container">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="alert alert-dark text-center">
                      Latest News
                    </div>
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100 slider-image" src="/categories/electronics.jpg" alt="First slide" />
                        <div class="carousel-caption d-none d-md-block">
                          <p style="" class="overlay-color">
                            important announcment
                          </p>
                          <p class="overlay-color">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam incidunt consequatur sit libero vol
                          </p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100 slider-image" src="/categories/electronics.jpg" alt="Second slide" />
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100 slider-image" src="/categories/electronics.jpg" alt="Third slide" />
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>

                </div>

<style>
  .carousel {
  width: 95%;
  float: right;
  box-shadow: 10px 10px 12px rgba(0, 0, 0, 0.2), 0 4px 8px rgba(0, 0, 0, 0.5);
  cursor: pointer;
}
.carousel-caption {
  left: 0;
  right: 0;
  bottom: 0;
  padding: 30px;
  background: rgba(0, 0, 0, 0.6);
  text-shadow: none;
}
.slider-image {
  width: auto;
  height: 225px;
  max-height: 225px;
}
</style> --}}
@endsection
