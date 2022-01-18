@extends('dashboard')

@section('content_bo')

<div>
<profile :profile="{{json_encode($profile)}}"></profile>

</div>

@endsection