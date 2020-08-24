@foreach ($users as $user)
{{ $user->username }},{{ $user->name }},
@php
$gifts = $user->gifts->groupBy('id')->map(function ($people) {
return $people->count();
});
@endphp
@foreach ($gifts as $key => $count)
@php
$giftObject = App\Gift::find($key);
@endphp
<span>{{ $giftObject->name }},{{ $giftObject->price/10 }},{{ $count }},</span>
@endforeach
<br>
@endforeach