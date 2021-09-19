<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Owner;
use Carbon\Carbon;
use Validator;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $pets = Pet::all();
    //     $owners = Owner::all();
    //     return view('pet.index', ['pets' => $pets]);

    // }

    public function index(Request $request) {

    $pets = Pet::orderBy('name')->get();
    $doctors = Doctor::orderBy('name')->get();

        if ($request->sort) {
            if ('bdate' == $request->sort && 'asc' == $request->sort_dir) {
                $pets = Pet::orderBy('birth_date')->get();
            }
            else if ('bdate' == $request->sort && 'desc' == $request->sort_dir) {
                $pets = Pet::orderBy('birth_date', 'desc')->get();
            }
            else if ('species' == $request->sort && 'asc' == $request->sort_dir) {
                $pets = Pet::orderBy('species')->get();
            }
            else if ('species' == $request->sort && 'desc' == $request->sort_dir) {
                $pets = Pet::orderBy('species', 'desc')->get();
            }
            // else if ('size' == $request->sort && 'asc' == $request->sort_dir) {
            //     $pets = Pet::orderBy('size')->get();
            // }
            // else if ('size' == $request->sort && 'desc' == $request->sort_dir) {
            //     $pets = Pet::orderBy('size', 'desc')->get();
            // }
            else {
                $pets = Pet::all();
            }
        }


// ----------------------------



        else if ($request->filter && 'doctor' == $request->filter) {
            $pets = Pet::where('doctor_id', $request->doctor_id)->get();
        }
        else if ($request->search && 'all' == $request->search) {

        $words = explode(' ', $request->s);

        dd($words);

        if (count($words) == 1) {
            $pets = Pet::where('color', 'like', '%'.$request->s.'%')->
            orWhere('birth_date', 'like', '%'.$request->s.'%')->
            orWhere('species', 'like', '%'.$request->s.'%')->
            get();
        }
        else {
            $pets = Pet::where(function($query) use ($words) {
                $query->orWhere('color', 'like', '%'.$words[0].'%')
                ->orWhere('birth_date', 'like', '%'.$words[0].'%')
                ->orWhere('species', 'like', '%'.$words[0].'%');
            })
            ->where(function($query) use ($words) {
                $query->orWhere('color', 'like', '%'.$words[1].'%')
                ->orWhere('birth_date', 'like', '%'.$words[1].'%')
                ->orWhere('species', 'like', '%'.$words[1].'%');
            })->get();
        }



        }
        else {
            // nieko nesortinam
            $pets = Pet::all();
        }
        

        return view('pet.index', [
            'pets' => $pets,
            'sortDirection' => $request->sort_dir ?? 'asc',
            'doctors' => $doctors,
            'doctor_id' => $request->doctors_id ?? '0',
            's' => $request->s ?? ''
        ]);
    }

    // ------------------------------

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
        // $birth_dateB = Carbon::create(str_replace('.', '-', $request->pet_bdate));
        $validator = Validator::make($request->all(),
        [
            'pet_name' => ['required', 'min:3', 'max:255'],
            'pet_species' => ['required', 'min:3', 'max:20'],
            'birth_dateB' => ['sometimes', 'date'],
            // 'birth_date' => ['sometimes', 'integer', 'min:'.date("Y")-100],


            'pet_document' => ['required', 'min:3', 'max:20'],
            'pet_history' => ['required'],

            'doctor_id' => ['required', 'integer', 'min:1'],
            'owner_id' => ['required', 'integer', 'min:1']
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }



        $pet = new Pet;
        $pet->name = $request->pet_name;
        $pet->species = $request->pet_species;
        // $pet->birth_date = date('Y-m-d', strtotime($request->pet_bdate));
        // $pet->birth_date = date('Y.m.d', strtotime($request->pet_bdate));
        // $pet->birth_date = date_format($request->pet_bdate,'Y-m-d');
        $pet->birth_date = Carbon::create(str_replace('.', '-', $request->pet_bdate));
        $pet->document = $request->pet_document;
        $pet->history = $request->pet_history;
        $pet->doctor_id = $request->doctor_id;
        $pet->owner_id = $request->owner_id;

        $pet->save();
        // return redirect()->route('pet.index');
        return redirect()->route('pet.index')->with('success_message', 'Sekmingai įrašytas.');
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
        // $birth_dateB = Carbon::create(str_replace('.', '-', $request->pet_bdate));
        $validator = Validator::make($request->all(),
        [
            'pet_name' => ['required', 'min:3', 'max:255'],
            'pet_species' => ['required', 'min:3', 'max:20'],
            // 'birth_dateB' => ['sometimes', 'date'],
            // 'birth_date' => ['sometimes', 'integer', 'min:'.date("Y")-100],
            'birth_date' => ['sometimes', 'date'],

            'pet_document' => ['required', 'min:3', 'max:20'],
            'pet_history' => ['required'],

            'doctor_id' => ['required', 'integer', 'min:1'],
            'owner_id' => ['required', 'integer', 'min:1']
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        
        $pet->name = $request->pet_name;
        $pet->species = $request->pet_species;
        // $pet->birth_date = $request->pet_bdate;
        $pet->birth_date = Carbon::create(str_replace('.', '-', $request->pet_bdate));
        // $pet->birth_date = date_format($request->pet_bdate, 'Y.m.d');
        // $pet->birth_date = date('Y.m.d', strtotime($request->pet_bdate));
        $pet->document = $request->pet_document;
        $pet->history = $request->pet_history;
        $pet->doctor_id = $request->doctor_id;
        $pet->owner_id = $request->owner_id;
        $pet->save();
        // return redirect()->route('pet.index');
        return redirect()->route('pet.index')->with('success_message', 'Sėkmingai atnaujinta.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();
        // return redirect()->route('pet.index');
        return redirect()->route('pet.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
