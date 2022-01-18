@extends('dashboard')

@section('content_bo')

<div>
<commande-detail-component :produits="{{$produits}}" ></commande-detail-component>
</div>

@endsection