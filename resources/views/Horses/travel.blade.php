@extends('layouts.app')
@section('content')
<div class="card container" style="width: 60%">
    <img class="card-img-bottom" src="{{url('/img/horse.jpg')}}" alt="Card image cap">
    <div class="card-header">
        <h3 class="text-center">Info apie arklį už kurį statoma:</h3>
    </div>
    <div class="card-body">
        <h5>Arklys: {{ $horse->name }}</h5>
        <h5>Dalyvauta varžybų: {{ $horse->runs }}</h5>
        <h5>Laimeta varžybų: {{ $horse->wins }}</h5>
        <h5>Apie arklį: {!! $horse->about !!}</h5>
        <hr>
        <table class="table">
        </table>
    </div>
</div>
@endsection