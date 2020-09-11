<?php

namespace App\Http\Controllers;

use App\Horses;
use Illuminate\Http\Request;

class HorsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('horses.index', ['horses' => Horses::orderBy('name')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $horse = new Horses();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $horse->fill($request->all());
        $horse->save();
        return redirect()->route('horses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Horses  $horse
     * @return \Illuminate\Http\Response
     */
    public function show(Horses $horse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Horses  $horse
     * @return \Illuminate\Http\Response
     */
    public function edit(Horses $horse)
    {
        return view('horses.edit', ['horse' => $horse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Horses  $horse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horses $horse)
    {
        $horse->fill($request->all());
        $horse->save();
        return redirect()->route('horses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Horses  $horse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horses $horse, Request $request)
    {
        $horse->delete();
        return redirect()->route('horses.index', ['horse_id' => $request->input('horse_id')]);
    }

    public function travel($id)
    {
        $horse = Horses::find($id);
        return view('horses.travel', ['horse' => $horse]);
    }
}
