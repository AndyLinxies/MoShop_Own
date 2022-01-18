@extends('dashboard')

@section('content_bo')

<div>
<all-shops-component :magasins="{{$magasins}}" ></all-shops-component>
</div>

@endsection