<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates = Rate::all();
        return view('rates.index', compact('rates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('rates.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rate' => 'required|numeric',
            'comment' => 'nullable|string',
            'client_id' => 'required|exists:clients,id',
        ]);

        $rate = Rate::create($validatedData);
        return redirect()->route('rates.index')->with('success', 'Note créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function show(Rate $rate)
    {
        $rate->load('client');
        return view('rates.show', compact('rate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function edit(Rate $rate)
    {
        $clients = Client::all();
        return view('rates.edit', compact('rate', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rate $rate)
    {
        $validatedData = $request->validate([
            'rate' => 'required|numeric',
            'comment' => 'nullable|string',
            'client_id' => 'required|exists:clients,id',
        ]);

        $rate->update($validatedData);
        return redirect()->route('rates.index')->with('success', 'Note mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {
        $rate->delete();
        return redirect()->route('rates.index')->with('success', 'Note supprimée avec succès.');
    }
}
