@extends('layouts.app')


@section('content')

    <div class="container" style="margin-top: 10%;text-align: center;">

        <h2>You don't have permission.</h2><br>
        <a class="btn btn-primary" href="{{url('home')}}">Home</a>

    </div>

@endsection