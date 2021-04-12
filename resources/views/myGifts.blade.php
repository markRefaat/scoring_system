


@extends('layouts.app')

@section('content')

@if (session('error'))
<div style="text-align: center" class="alert alert-danger" role="alert">
  <strong>{{session('error')}}</strong>
</div>
@endif

@if (session('status'))
<div style="text-align: center" class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif


      <h3 class="alert alert-info text-center">الهدايا التى تم شرائها</h3>
      <div class="container-fluid">
      <div id="table" class="table-editable">
      <table id="DBTable" class="table text-center">
        <thead class="cyan white-text">
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">الاسم</th>
            <th class="text-center">الثمن</th>
            <th class="text-center"> ارجاع</th>
        
          </tr>
        </thead>
        <tbody>
          @php($i=1)
          @forelse ($gifts as $gift)
          <tr>
            <th style="width: 10%" class="pt-3-half">{{$i}}</th>
            <td style="width: 20%" class="pt-3-half">{{$gift->name}}</td>
            <td style="width: 20%" class="pt-3-half">{{$gift->price}}</td>
            <td style="width: 50%" class="pt-3-half">
              @if ($returnGifts->value == 'true')
              <a href="{{route('/returnGift',$gift->id)}}" onclick="return confirm('تاكيد ارجاع الهدية ؟');" class="btn btn-danger btn-rounded btn-sm my-0"
                >أرجاع</a>
              @else
              <div class="alert alert-warning">لا يمكنك ارجاع الهدية الان <hr> You are not allowed to return the gift</div>
              @endif
            
            </td>
            @php($i++)
          </tr>
          @empty
          <th colspan="9" style="text-align:center">لم تشترى هدايا حتى الان </th>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  

  @endsection
