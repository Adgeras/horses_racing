@extends('layouts.app')
@section('content')
<div class="card-body">
    <form action="{{ route('betters.index') }}" method="GET">
        <select name="horse_id" id="" class="form-control">
            <option value="" selected disabled>Pasirinkite arklį filtravimui:</option>
            @foreach ($horses as $horse)
            <option value="{{ $horse->id }}" 
                @if($horse->id == app('request')->input('horse_id')) 
                    selected="selected" 
                @endif>{{ $horse->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <table class="table">
        <tr>
            <th class="text-center">Vardas</th>
            <th class="text-center">Pavardė</th>
            <th class="text-center">Statoma sum, Eur</th>
            <th class="text-center">Stato už arklį</th>
            <th class="text-center">Veiksmai</th>
        </tr>
        @foreach ($betters as $better)
        <tr >
            <td class="text-center">{{ $better->name }}</td>
            <td class="text-center">{{ $better->surname }}</td>
            <td class="text-center">{{ $better->bet }}</td>
            <td class="text-center">{{ $better->horse['name'] }}</td>
            <td class="text-center">
                <form action={{ route('betters.destroy', $better->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('betters.edit', $better->id) }}>Redaguoti</a>
                    <a class="btn btn-primary" href={{ route('horses.travel', $horse->id) }}>Info apie arklį</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('betters.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection