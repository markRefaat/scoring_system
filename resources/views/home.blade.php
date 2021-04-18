@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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

            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">{{ __('Welcome') }} {{ $user->name }}
                    </div>

                    <div class="card-body">
                        {{ $rankData['rank'] }}
                        <br>
                        {{ __('Your score') }}
                        <div class="alert alert-success">{{ $user->score }}</div>
                        <br>
                        <div class="progress">
                          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{$user->staticScore}}" aria-valuemin="0" aria-valuemax="{{$user->staticScore+$rankData['points_to_next']}}" style="width:{{$user->staticScore / ($user->staticScore+$rankData['points_to_next'])*100}}%"></div>
                        </div>
                        {{$rankData['points_to_next']}} remaining for rank {{$rankData['next_rank']}}
                    </div>



                </div>
            </div>

        </div>
    </div>
    @if ($welcome)
        <div style="margin-top: 2%" class="container text-center">
            <div class="alert alert-success text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="alert-heading">Welcome to Mr.clock's gift store!</h4>
                <p>hello {{ $user->name }} welcome, because you logged in for the first time mr.clock has given you a
                    <span style="font-size: 30px; font-weight: bold"> 50 </span> momento bonus &#128516; &#129321; &#129321;
                    !! Now check the gifts categories below and find what you like.
                </p>
                <hr>
                <p class="mb-0">اهلا يا {{ $user->name }} علشان انت دخلت الويب سايت مستر كلوك مديلك هدية <span
                        style="font-size: 30px; font-weight: bold"> 50 </span> .مومينتو بونص &#128516; &#129321; &#129321;
                    يلا انزل تحت واتفرج على الهدايا وشوف ايه اللى عجبك </p>
            </div>
        </div>
    @endif
    <br>
    <div class="container d-flex justify-content-center">
        <div class="card mb-3" style="width: 70%">
            <div class="row g-0">
                <div class="col-md-4">
                    <img height="100%" src="/mrclock.jpeg" alt="..." class="img-fluid" />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Mr clock sent you a message</h5>
                        <p class="card-text">
                            Hello {{ $user->name }} welcome to my gifts store. Here you will find your total score.
                            remember to visit every week to see your score progress and the gifts prices.
                        </p>
                        <p class="card-text">
                            but take care gifts prices could change from time to time some could increase <svg
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-graph-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M0 0h1v15h15v1H0V0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5z" />
                            </svg> and others decrease <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="currentColor" class="bi bi-graph-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M0 0h1v15h15v1H0V0zm10 11.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-1 0v2.6l-3.613-4.417a.5.5 0 0 0-.74-.037L7.06 8.233 3.404 3.206a.5.5 0 0 0-.808.588l4 5.5a.5.5 0 0 0 .758.06l2.609-2.61L13.445 11H10.5a.5.5 0 0 0-.5.5z" />
                            </svg>
                        </p>
                        <hr>
                        <p dir="rtl" style="text-align: right" class="card-text">
                            اهلا يا {{ $user->name }} فى موقع الهدايا بتاعى هنا هتلاقى السكور بتاعك وصل لحد فين. بس افتكر
                            تدخل كل اسبوع علشان تشوف الجديد فى السكور و الهدايا
                        </p>
                        <p dir="rtl" style="text-align: right" class="card-text">
                            بس خد بالك اسعار الهدايا ممكن تختلف من وقت للتانى. ساعات ممكن هدايا تزيد وهدايا ثانية تقل
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
