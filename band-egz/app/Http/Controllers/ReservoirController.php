<?php

namespace App\Http\Controllers;

use App\Models\Reservoir;
use App\Models\Member;
use Illuminate\Http\Request;
use Validator;

class ReservoirController extends Controller
{
    const RESULTS_IN_PAGE = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        // $reservoirs = Reservoir::all();
        $reservoirs = Reservoir::orderBy('area')->paginate(self::RESULTS_IN_PAGE);
        // $members = Member::all()->sortBy('surname');
        return view('reservoir.index', ['reservoirs' => $reservoirs]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservoir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'reservoir_title' => ['required', 'min:3', 'max:200'],
            'reservoir_area' => ['required', 'numeric','min:1'],
            'reservoir_about' => ['required', 'min:3'],
        ]
 
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        $reservoir = new Reservoir;
        $reservoir->title = $request->reservoir_title;
        $reservoir->area = $request->reservoir_area;
        $reservoir->about = $request->reservoir_about;
        $reservoir->save();

        // return redirect()->route('reservoir.index');
        return redirect()->route('reservoir.index')
        ->with('success_message', 'Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function show(Reservoir $reservoir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservoir $reservoir)
    {
        return view('reservoir.edit', ['reservoir' => $reservoir]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservoir $reservoir)
    {
        $validator = Validator::make($request->all(),
        [
            'reservoir_title' => ['required', 'min:3', 'max:200'],
            'reservoir_area' => ['required', 'numeric','min:1'],
            'reservoir_about' => ['required', 'min:3'],
        ]
 
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        
        $reservoir->title = $request->reservoir_title;
        $reservoir->area = $request->reservoir_area;
        $reservoir->about = $request->reservoir_about;

        $reservoir->save();
        // return redirect()->route('reservoir.index');
        return redirect()->route('reservoir.index')
        ->with('success_message', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservoir $reservoir)
    {
        // $reservoir->delete();
        // return redirect()->route('reservoir.index');

        if($reservoir->getMember->count()){
            // return 'Can`t delete, because this reservoir is set to one of members !';

            return redirect()
            ->route('reservoir.index')->with('info_message', 'Can`t delete, because this reservoir is set to one of members !');
        }
        
        $reservoir->delete();
        // return redirect()->route('reservoir.index');
        return redirect()->route('reservoir.index')
        ->with('success_message', 'Deleted successfully.');
    }
}
