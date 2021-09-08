<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Owner;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::all();
        // $owners = Owner::all();
        return view('pet.index', ['pets' => $pets]);

        // $owners = Owner::all();
        // return view('owner.index', ['owners' => $owners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        $owners = Owner::all();
        return view('pet.create', ['doctors' => $doctors, 'owners' => $owners]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pet = new Pet;
        $pet->name = $request->pet_name;
        $pet->species = $request->pet_species;
        $pet->birth_date = $request->pet_bdate;
        $pet->document = $request->pet_document;
        $pet->history = $request->pet_history;

        $pet->doctor_id = $request->doctor_id;
        $pet->owner_id = $request->owner_id;

        $pet->save();
        return redirect()->route('pet.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        $owners = Owner::all();
        $doctors = Doctor::all();
        return view('pet.edit', ['pet' => $pet, 'doctors' => $doctors, 'owners' => $owners]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        //
    }
}
