<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use App\Models\Pet;


class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = Owner::all();
        return view('owner.index', ['owners' => $owners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $owners = Owner::all();
        // return view('owner.create', ['owners' => $owners]);

        $pets = Pet::all();
        return view('owner.create', ['pets' => $pets]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $owner = new Owner;
        $owner->name = $request->owner_name;
        $owner->surname = $request->owner_surname;
        $owner->contacts = $request->owner_contacts;

        // $owner->owner_id = $request->owner_id;
        $owner->save();
        // return redirect()->route('owner.index');
        return redirect()->route('owner.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        $pets = Pet::all();
        return view('owner.edit', ['pets' => $pets, 'owner' => $owner]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner, Pet $pet)
    {
        $owner->name = $request->owner_name;
        $owner->surname = $request->owner_surname;
        $owner->contacts = $request->owner_contacts;
        $owner->save();

        // dd($request->pet_id);
        // $pet->owner_id = $request->pet_id; ///


        // $pet->name = $request->pet_name;
        // $pet->species = $request->pet_species;
        // $pet->birth_date = Carbon::create($request->pet_bdate);
        // $pet->document = $request->pet_document;
        // $pet->history = $request->pet_history;
        // $pet->doctor_id = $request->doctor_id;
        // $pet->owner_id = $request->owner_id;

        // if (Pet $pet) {
            // $pet->owner_id->save();
        // }
        // return redirect()->route('owner.index');
        return redirect()->route('owner.index')->with('success_message', 'Sėkmingai atnaujinta.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        // $owner->delete();
        // return redirect()->route('owner.index');

        if($owner->getPet->count()){
            // return 'Negalima trinti, nes šiam savininkui priklauso aptarnaujamas gyvūnas.';
            return redirect()->route('owner.index')->with('info_message', 'Negalima trinti, 
            nes šiam savininkui priklauso aptarnaujamas gyvūnas.');
        }
        $owner->delete();
        // return redirect()->route('owner.index');
        return redirect()->route('owner.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
