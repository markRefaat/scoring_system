@extends('layouts.app')

@section('content')

    <div class="container">

        <div style="text-align: center" class="col text-center ">
            <input id="txtSearch" type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                aria-describedby="search-addon" />
            <button type="button" id="searchbtn" class="btn btn-outline-primary">search</button>
        </div>
    </div>
    <div class="container">
        <div class="col">
            <div class="col-lg-4 cards-wrapper"></div>
        </div>
    </div>


    <template id="cardTemplate">
        <div style="margin-top: 3%" class="card">
            <div class="card-body">
                <div class="row">
                    <h4 class="card-title">{title}</h4>
                    {button}
                </div>
                <p class="card-text">{content}</p>
                <hr>
                <h5 class="card-text">{gifts}</h5>
            </div>
        </div>
    </template>

    <script>
        function buy(button) {
            alert(button.value)
            button.classList.remove('btn-primary');
            button.classList.add('btn-success');
            $.ajax({

                type: "GET",
                url: 'buygift',
                data: {
                    text: button.value
                },
                success: function(response) {
                    if (response == 0) {
                        button.classList.remove('btn-success');
                        button.classList.add('btn-primary');
                    }
                    else {
                        button.classList.remove('btn-primary');
                        button.classList.add('btn-success');
                    }

                }



            });


        }
        $(document).ready(function() {

            $('#searchbtn').click(function() {

                var text = $('#txtSearch').val();
                var cardTemplate = $("#cardTemplate").html();
                $.ajax({

                    type: "GET",
                    url: 'submitsearch',
                    data: {
                        text: $('#txtSearch').val()
                    },
                    success: function(response) {
                        for (var user of response) {
                            var giftshtml = "";
                            gifts = user.gifts;
                            gifts.forEach(function(gift) {
                                giftshtml += "<h4>" + gift.name +
                                    "<div style ='color:green'>" + gift.price +
                                    "</div> </h4>";
                            })
                            if(user.recieved_gifts == 0)
                            var btnclass = 'primary';
                            else
                            var btnclass = 'success';
                            var button =
                                "<button  onclick='buy(this)' style='margin-left: auto' value='" +
                                user.id + "' class='btn btn-"+btnclass+"'>buy</button>"
                            $('.cards-wrapper').append(cardTemplate.replace("{title}",
                                user.name).replace("{content}", user.username).replace(
                                "{gifts}", giftshtml).replace("{button}", button));
                        }
                    }



                });


            });






        });

    </script>
@endsection
