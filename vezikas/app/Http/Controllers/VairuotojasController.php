<?php

namespace App\Http\Controllers;

use App\Models\Vairuotojas;
use Illuminate\Http\Request;

class VairuotojasController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vairuotojas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vairuotojas  $vairuotojas
     * @return \Illuminate\Http\Response
     */
    public function show(Vairuotojas $vairuotojas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vairuotojas  $vairuotojas
     * @return \Illuminate\Http\Response
     */
    public function edit(Vairuotojas $vairuotojas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vairuotojas  $vairuotojas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vairuotojas $vairuotojas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vairuotojas  $vairuotojas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vairuotojas $vairuotojas)
    {
        //
    }
}
