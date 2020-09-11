<?php

namespace App\Http\Controllers;

use App\Betters;
use Illuminate\Http\Request;

class BettersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->horse_id) && $request->horse_id !== 0)
            $betters = \App\Betters::where('horse_id', $request->horse_id)->orderBy('name')->get();
        else
            $betters = \App\Betters::orderBy('name')->get();
        $horses = \App\Horses::orderBy('name')->get();
        return view('betters.index', ['betters' => $betters, 'horses' => $horses]);
    }
    public function create()
    {
        $horses = \App\Horses::orderBy('name')->get();
        return view('betters.create', ['horses' => $horses]);
    }
    public function store(Request $request)
    {
        $better = new Betters();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $better->fill($request->all());
        $better->save();
        return redirect()->route('betters.index');
    }
    public function show(Betters $better)
    {
        //
    }
    public function edit(Betters $better)
    {
        $horses = \App\Horses::orderBy('name')->get();
        return view('betters.edit', ['better' => $better, 'horses' => $horses]);
    }
    public function update(Request $request, Betters $better)
    {
        $better->fill($request->all());
        $better->save();
        return redirect()->route('betters.index');
    }
    public function destroy(Betters $better, Request $request)
    {
        $better->delete();
        return redirect()->route('betters.index', ['horse_id' => $request->input('horse_id')]);
    }

    public function travel($id)
    {
        $better = Betters::find($id);
        return view('betters.travel', ['better' => $better]);
    }
}
