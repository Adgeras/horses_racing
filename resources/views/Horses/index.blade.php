@extends('layouts.app')
@section('content')
<div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <table class="table">
        <tr>
            <th class="text-center">Vardas</th>
            <th class="text-center">Dalyvauta rungtynių skaičius</th>
            <th class="text-center">Laimėtų rungtynių skaičius</th>
            <th class="text-center">Aprašymas</th>
            <th class="text-center">Veiksmai</th>
        </tr>
        @foreach ($horses as $horse)
        <tr>
            <td class="text-center">{{ $horse->name }}</td>
            <td class="text-center">{{ $horse->runs }}</td>
            <td class="text-center">{{ $horse->wins }}</td>
            <td class="text-center">{!! $horse->about !!}</td>
            <td class="text-center">
                <form action={{ route('horses.destroy', $horse->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('horses.edit', $horse->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('horses.create') }}" class="btn btn-success">Pridėti</a>
    </div>
    <!-- ******************** RUNNING NUMBERS **** -->
    <div class="container bckg-main-color">
    <div id="runnNumbPlace" class="row">
        <!-- **** Rendered running numbers content *** -->
    </div>
</div>
</div>
@endsection