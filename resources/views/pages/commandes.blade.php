@extends('dashboard')

@section('content_bo')

<div>
<commandes-component :commandes="{{$commandes}}"></commandes-component>
</div>

@endsection