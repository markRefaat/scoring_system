@extends('layouts.app')

@section('content')


<div class="container text-center">

<div class="alert alert-info">
    
    <h1>Score Board</h1>
    <span style="font-size:50px">🏅</span>
</div>
<div class="row">
    <div style="margin-top: 2%" class="col-md-6 col-sm-11">
        <div class="card">
        <ul class="list-group">
            <li style="color:white; font-weight: bolder; font-size: 25px" class="list-group-item grey">Top <span style="font-size: 30px"> 5 </span>  classes</li>
            @php
            $index=1;   
           @endphp
            @foreach ($top_five as $key => $value)
            <li style="font-weight: bold" class="list-group-item"> <span class="float-left">{{$index++}}</span> {{$key}}</li>
            @endforeach
          </ul>
        </div>
    </div>

    <div style="margin-top: 2%" class="col-md-6 col-sm-11">
        <div class="card">
            <ul class="list-group"> 
            <li style="color:white; font-weight: bolder; font-size: 25px" class="list-group-item grey">Your Score</li>
            @if (auth()->user()->staticScore > 200)
            @foreach ($score_bigger as $key => $value)
            <li style="font-weight: bold" class="list-group-item">{{$value->name}} <span class="float-right">{{$value->staticScore}}</span></li>
            @endforeach
            <li style="font-weight: bold" class="list-group-item active">{{auth()->user()->name}} <span class="float-right">{{auth()->user()->staticScore}}</span></li>
            @foreach ($score_smaller as $key => $value)
            <li style="font-weight: bold" class="list-group-item">{{$value->name}} <span class="float-right"> {{$value->staticScore}} </span>  </li>
            @endforeach
        </ul>
        @else       
        <li style="font-weight: bold" class="list-group-item active">{{auth()->user()->name}} <span class="float-right">{{auth()->user()->staticScore}}</span></li>
        @endif
     
            </div>
    </div>
</div>


</div>



@endsection