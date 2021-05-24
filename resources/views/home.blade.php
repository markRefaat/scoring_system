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
                        <img src="/images/ranks/{{$rankData['rank']}}.svg" style="max-height: 80px" alt="">
                        <br>
                       <h4 style=" font-family: 'Times New Roman', Times, serif;">{{ $rankData['rank'] }}</h4> 
                      
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
                    !! Now check the gifts categories below and find what you like. <span style="font-size: 30px; font-weight: bold"> Your score will be updated next Monday at 9 pm </span>
                </p>
                <hr>
                <p class="mb-0">اهلا يا {{ $user->name }} علشان انت دخلت الويب سايت مستر كلوك مديلك هدية <span
                        style="font-size: 30px; font-weight: bold"> 50 </span> .مومينتو بونص &#128516; &#129321; &#129321;
                    يلا انزل تحت واتفرج على الهدايا وشوف ايه اللى عجبك </p>
                    <span style="font-size: 30px; font-weight: bold"> السكور بتاعك هيتجدد يوم الاثنين القادم الساعة 9 مساء  </span>
            </div>
        </div>
    @endif
    <br>
    <div class="container d-flex justify-content-center">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-12 text-center">
                    <div class="card-body">
                        {{-- <img style="border-radius: 70px" height="90px" width="90px" src="/mrclock.jpeg" alt="..." class="img-fluid" /> --}}
                        <h5 class="card-title">Mr clock sent you a message</h5>
                        <p class="card-text">
                            Hello {{ $user->name }} welcome to my gifts store. Here you will find your total score and your level.
                            remember to visit every week to see your score progress and the unlocked gifts.
                        </p>
                        <h4 class="text-center text-muted">Levels</h4>
                        <div class="row">
                            <div class="col-3">
                      
                                    <img style="max-height: 100px" src="/images/ranks/Bronze I.svg" alt="">
                                    <p class="text-center" style=" font-size:10px; font-family: 'Times New Roman', Times, serif;">BRONZE I</p> 
                                
                             
                                    <img style="max-height: 100px" src="/images/ranks/Bronze II.svg" alt="">
                                    <p class="text-center" style=" font-size:10px; font-family: 'Times New Roman', Times, serif;">BRONZE II</p> 
                               
                            </div>

                            <div class="col-3">
                              
                                    <img style="max-height: 100px" src="/images/ranks/Silver I.svg" alt="">
                                    <p class="text-center" style=" font-size:10px; font-family: 'Times New Roman', Times, serif;">SILVER I</p> 
                               
                            
                                    <img style="max-height: 100px" src="/images/ranks/Silver II.svg" alt="">
                                    <p class="text-center" style=" font-size:10px; font-family: 'Times New Roman', Times, serif;">SILVER II</p> 
                          
                            </div>

                            <div class="col-3">
                           
                                    <img style="max-height: 100px" src="/images/ranks/Gold I.svg" alt="">
                                    <p class="text-center" style=" font-size:10px; font-family: 'Times New Roman', Times, serif;">GOLD I</p> 
                             
                      
                                    <img style="max-height: 100px" src="/images/ranks/Gold II.svg" alt="">
                                    <p class="text-center" style=" font-size:10px; font-family: 'Times New Roman', Times, serif;">GOLD II</p> 
                             
                            </div>

                            <div class="col-3">
                          
                                    <img style="max-height: 100px" src="/images/ranks/Platinium I.svg" alt="">
                                    <p class="text-center" style=" font-size:10px; font-family: 'Times New Roman', Times, serif;">PLATINIUM I</p> 
                          
                       
                                    <img style="max-height: 100px" src="/images/ranks/Platinium II.svg" alt="">
                                    <p class="text-center" style=" font-size:10px; font-family: 'Times New Roman', Times, serif;">PLATINIUM II</p> 
                            
                            </div>
                        </div>
                        <hr>
                        <p dir="rtl" style="text-align: center" class="card-text">
                            اهلا يا {{ $user->name }} فى موقع الهدايا بتاعى هنا هتلاقى السكور بتاعك وصل لحد فين وتشوف الهدايا اللى المستوى اللى وصلت له بيفتحها. بس افتكر
                            تدخل كل اسبوع علشان تشوف السكور بتاعك وصل لحد فين
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
                <div style="width: 99% margin-top:2%" onclick="location.href='/products/church'" class="card"
                    style="width: 18rem; margin-bottom: 2%">
                    <img class="card-img-top" height="200px" src="/categories/church.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">روحى</p>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 mol-md-10">
                <div style="width: 99%; margin-top:2%" class="card" onclick="location.href='/products/games'"
                    style="width: 18rem; margin-bottom: 2%">
                    <img class="card-img-top" height="200px" src="/categories/games.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Games and others</p>
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
    <footer style="margin-top: 1%" class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <div>Icons made by <a href="https://www.flaticon.com/authors/dimitry-miroliubov" title="Dimitry Miroliubov">Dimitry Miroliubov</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
          <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
      </footer>
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
