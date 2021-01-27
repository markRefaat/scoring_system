@extends('layouts.app')

@section('content')
    @if ($user->staticScore >= 200)
        @if (session('error'))
            <div style="text-align: center" class="alert alert-danger" role="alert">
                <strong>{{ session('error') }}</strong>
            </div>
        @endif



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

                            {{ __('Your score') }}
                            <h3 class="alert alert-info">{{ $user->score }}</h3>
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
                    <a class="nav-link active cyan" data-mdb-toggle="pill" href="/products/home-appliances" role="tab"
                        aria-selected="false">Home appliances and vouchers</a>
                </li>
                <li class="nav-item" style="padding: 1%" role="presentation">
                    <a class="nav-link active" id="ex2-tab-3" data-mdb-toggle="pill" href="/products/electronics" role="tab"
                        aria-selected="false">Electronics</a>
                </li>

            </ul>
        </div>
        <div class="container text-center">
            <h2 class="alert alert-info"> الهدايا</h2>
            <div class="row justify-content-around">

                @forelse ($gifts as $gift)
                    <div class="card" style="width: 18rem; margin-top: 1%">
                        <img class="card-img-top" src="/images/{{ $gift->id }}.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">{{ $gift->name }}</p>
                            <h3 style="color: lime">{{ $gift->price }}</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                onclick="buygift({{ $gift->id }},'{{ $gift->name }}','{{ $gift->description }}')"
                                style="font-size: 18px;" class="btn btn-primary btn-block">عرض</button>
                        </div>
                    </div>
                @empty
                    <div class="container">
                        <div class="alert alert-warning">لا يوجد نقاط كافية</div>
                        <img width="40%" src="/sorry.svg" alt="My SVG Icon">
                        <br>
                        <br>
                    </div>
    @endforelse
    </div>
    </div>




    {{-- <div class="container-fluid text-center">
        <form action="/redeem" method="POST">
            @csrf
            <div class="text-center">
                <h2 class="alert alert-light">الهدايا التى يمكنك شرائها</h2>
                <select id="gift" name="gift" required style="text-align: center" class="browser-default custom-select">
                    <option disabled value="" selected>اختر هدية</option>
                    @foreach ($gifts as $gift)
                        <option value="{{ $gift->id }}">{{ $gift->name }} || pirce {{ $gift->price }} points</option>
                    @endforeach
                </select>
                <br>
                <br>
                <img id="image" src="" alt="" class="d-block mx-auto">
                <input class="btn btn-success" onclick="return confirm('هل انت متأكد من شراء الهدية؟')" value="تأكيد الشراء"
                    type="submit">
            </div>
            <br>
            <div class="alert alert-warning" role="alert">
                أستلام الهدايا من الكنيسة يوم الاحد 6/9 من الساعة 5 الى 9 امام باب الحضانة
                <br>
                لمن لا يناسبه الموعد برجاء مراسلة فيلوباتير على الواتساب على الرقم 01203566808
            </div>
        </form>
    </div>

    <script>
        $('#gift').on('change', function() {
            var selectVal = $("#gift option:selected").val();
            $("#image").attr("src", 'images/' + selectVal + '.jpg');
            $("#image").attr("width", '300px');
            $("#image").attr("height", '300px');
        });

    </script> --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">التفاصيل</h5>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" onclick="return confirm('هل انت متأكد من شراء الهدية؟')"
                        class="btn btn-primary">ِشراء</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @endif

    <script>
        function buygift(id, title, desc) {
            document.getElementById("productimage").src = "/images/" + id + ".jpg";
            document.getElementById("producttitle").innerHTML = title;
            document.getElementById("productdesc").innerHTML = desc;
            document.getElementById("formgift").value = id;
            $("#exampleModal").modal('show');
        }

    </script>
@endsection
