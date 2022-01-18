@extends('dashboard')

@section('content_bo')

<div>
<personal-shop :personalshop="{{$personalShop}}" ></personal-shop>

</div>

@endsection