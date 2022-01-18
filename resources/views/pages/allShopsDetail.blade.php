@extends('dashboard')

@section('content_bo')

<div>
<all-shops-detail :produits="{{$produits}}" :conecteduser="{{$conectedUser}}" ></all-shops-detail>
</div>

@endsection