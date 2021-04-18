@extends('layouts.app')

@section('content')
  
        @if (session('error'))
            <div style="text-align: center" class="alert alert-danger" role="alert">
                <strong>{{ session('error') }}</strong>
            </div>
        @endif
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif


        <div class="container">
            <div class="row justify-content-center">
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
        </div>
        <br>
        <div class="container">
            <ul class="nav nav-pills nav-fill mb-6" id="ex1" role="tablist">

                <li class="nav-item" style="padding: 1%" role="presentation">
                    <a class="nav-link active blue" href="/store" role="tab" aria-selected="false">All Gifts</a>
                </li>

                <li class="nav-item" style="padding: 1%" role="presentation">
                    <a class="nav-link active purple" href="/products/chocolates" role="tab"
                        aria-selected="false">Chocolates</a>
                </li>
                <li class="nav-item" style="padding: 1%" role="presentation">
                    <a class="nav-link active cyan" data-mdb-toggle="pill" href="/products/games" role="tab"
                        aria-selected="false">Games and toys</a>
                </li>
                <li class="nav-item" style="padding: 1%" role="presentation">
                    <a class="nav-link active" id="ex2-tab-3" data-mdb-toggle="pill" href="/products/electronics" role="tab"
                        aria-selected="false">Electronics</a>
                </li>

            </ul>
        </div>
        <div class="container text-center">
            <h2 class="alert alert-info"> Gifts</h2>
            <div class="row justify-content-around">

                @forelse ($gifts as $gift)
                    <div class="card" style="width: 18rem; margin-top: 1%">
                        <img class="card-img-top" style="height: 170px" src="/images/{{ $gift->id }}.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">{{ $gift->name }}</p>
                            @if($buyGifts->value == "true" && $gift->price < $rankData['current_rank_max'])
                            <h3 style="color: lime">{{ $gift->price }}</h3>
                            @endif
                        </div>
                        <div class="modal-footer">

                            @if($gift->price < $rankData['ranks_start'][0])
                            🥉<span style="background-color: rgb(185, 123, 8); color: rgb(185, 123, 8)" class="badge badge-bronze">Bronze</span>
                            @endif
                            
                            @if($gift->price >= $rankData['ranks_start'][0] && $gift->price < $rankData['ranks_start'][1])
                            🥈<span style="background-color: rgb(192,192,192); color: rgb(192,192,192)" class="badge badge-silver">Silver</span>
                            @endif

                            @if($gift->price >= $rankData['ranks_start'][1] && $gift->price < $rankData['ranks_start'][2])
                            🥇<span  class="badge badge-warning">Gold</span>
                            @endif

                            @if($gift->price >= $rankData['ranks_start'][2] && $gift->price <= $rankData['ranks_start'][3])
                            🥇🥇<span  class="badge badge-light">Platinum</span>
                            @endif


                            @if($gift->quantity > 0)
                            
                            @if($gift->quantity < 10)
                            <span class="badge badge-info">Limited Quantity</span>
                            @endif
                           

                            @if($gift->price < $rankData['current_rank_max'] )
                            <button type="button"
                                onclick="buygift({{ $gift->id }},'{{ $gift->name }}','{{ $gift->description }}','{{$gift->quantity}}')"
                                class="btn btn-primary btn-block">view</button>
                            @else
                            <button type="button"
                            disabled
                            class="btn btn-dark btn-block">&#128274; Locked</button>
                            @endif
                            
                            
                            
                            @else
                            <div class="col-12 text-center">
                                <div class="alert alert-info">
                                    sold out
                                    <hr>
                                    تم نفاذ الكمية 
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="container">
                        <div class="alert alert-warning">No gifts available to show</div>
                        <div class="alert alert-warning">لا يوحد هدايا متوفرة</div>
                        <img width="40%" src="/sorry.svg" alt="My SVG Icon">
                        <br>
                        <br>
                    </div>
    @endforelse
    </div>
    </div>






    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="" height="30%" width="50%" id="productimage" alt="">
                    <p id="producttitle"></p>
                    <p id="productdesc"></p>
                    <form action="/redeem" method="POST">
                        <input type="hidden" name="gift" id="formgift">
                </div>
                <div class="modal-footer">
                    @if ($buyGifts->value=='true')
                   
                    @if ($user->staticScore >= 1000)
                    
                  
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    <button type="submit" onclick="return confirm('هل انت متأكد من شراء الهدية؟')"
                    class="btn btn-primary">Buy</button>
                   
                 
                    @else
                    <div class="col text-center">
                        <div class="alert alert-info">
                            Minimum score for buying is 1000 momentos
                            <hr>
                            الحد الادنى 1000 مومينتو لشراء الهدايا 
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    </div>
                    @endif

                    
                    @else
                    <div class="col text-center">
                        <div class="alert alert-info">
                            Redeeming Gifts is currently unavailable
                            <hr>
                            شراء الهدايا غير متوفر حاليا
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    </div>
               
                    @endif
               
                </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function buygift(id, title, desc,quantity) {
            document.getElementById("productimage").src = "/images/" + id + ".jpg";
            document.getElementById("producttitle").innerHTML = title;
            document.getElementById("productdesc").innerHTML = desc;
            document.getElementById("formgift").value = id;
            $("#exampleModal").modal('show');
        }

    </script>
@endsection
