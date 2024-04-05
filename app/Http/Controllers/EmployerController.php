<?php

namespace App\Http\Controllers;

use App\Models\Employer;
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
        return view('employers.create');
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
        return redirect()->route('employers.index')->with('success', 'Employer created successfully.');
    }

    // Add other CRUD methods as needed
}
