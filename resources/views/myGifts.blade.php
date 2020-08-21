


@extends('layouts.app')

@section('content')


  <div class="card-body">
      <h3 class="alert alert-info text-center">الهدايا التى تم شرائها</h3>
    <div id="table" class="table-editable">
      <table id="DBTable" class="table table-bordered table-responsive-md table-striped text-center">
        <thead class="elegant-color white-text">
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
            <th class="pt-3-half">{{$i}}</th>
            <td class="pt-3-half">{{$gift->name}}</td>
            <td class="pt-3-half">{{$gift->price}}</td>
            <td class="pt-3-half">
       
            <a href="{{route('/returnGift',$gift->id)}}" onclick="return confirm('تاكيد ارجاع الهدية ؟');" class="btn btn-danger btn-rounded btn-sm my-0"
                >أرجاع</a>
            
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