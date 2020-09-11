@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Info apie arklį už kurį statoma</div>
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