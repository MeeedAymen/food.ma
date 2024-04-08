<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employers = Employer::all();
        return view('employers.index', compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('employers.create', compact('users'));
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
            'registerDate' => 'required|date',
            'sin' => 'required|string',
            'salaire' => 'required|numeric',
            'contractType' => 'required|string',
            'poste' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $employer = Employer::create($validatedData);
        return redirect()->route('employers.index')->with('success', 'Employer créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function show(Employer $employer)
    {
        $employer->load('user');
        return view('employers.show', compact('employer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function edit(Employer $employer)
    {
        $users = User::all();
        return view('employers.edit', compact('employer', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employer $employer)
    {
        $validatedData = $request->validate([
            'registerDate' => 'required|date',
            'sin' => 'required|string',
            'salaire' => 'required|numeric',
            'contractType' => 'required|string',
            'poste' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $employer->update($validatedData);
        return redirect()->route('employers.index')->with('success', 'Employer mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employer $employer)
    {
        $employer->delete();
        return redirect()->route('employers.index')->with('success', 'Employer supprimé avec succès.');
    }
}
