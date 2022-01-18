@extends('dashboard')

@section('content_bo')

<div>
<panier-component :product_of_panier="{{$productOfpanier}}" ></panier-component>
</div>

@endsection