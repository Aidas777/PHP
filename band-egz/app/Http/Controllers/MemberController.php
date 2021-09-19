<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Reservoir;
use Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // $members = Member::all();
        $members = Member::all()->sortBy('surname');
        $reservoirs = Reservoir::all();
        return view('member.index', ['members' => $members, 'reservoirs' => $reservoirs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('member.create');

        // $reservoirs = Reservoir::all();
        $reservoirs = Reservoir::all()->sortBy('title');
        $members = Member::all()->sortBy('surname');
        return view('member.create', ['reservoirs' => $reservoirs, 'members' => $members]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $member = new Member;
        // $member->name = $request->member_name;
        // $member->surname = $request->member_surname;
        // $member->save();
        // return redirect()->route('member.index');

        $validator = Validator::make($request->all(),
       [
           'member_name' => ['required', 'min:3', 'max:100'],
           'member_surname' => ['required', 'min:3', 'max:150'],
           'member_live' => ['required', 'min:3', 'max:50'],
           'member_experience' => ['required', 'integer'],
           'member_registered' => ['required', 'integer'],
           'reservoir_id' => ['required', 'min:1']
       ]

       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }


        $member = new Member;
        $member->name = $request->member_name;
        $member->surname = $request->member_surname;
        $member->live = $request->member_live;
        $member->experience = $request->member_experience;
        $member->registered = $request->member_registered;
        $member->reservoir_id = $request->reservoir_id;

        $member->save();
        // return redirect()->route('member.index');

        return redirect()->route('member.index')
        ->with('success_message', 'Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        // $reservoirs = Reservoir::all();
        $reservoirs = Reservoir::orderBy('area')->get();
        return view('member.edit', ['member' => $member, 'reservoirs' => $reservoirs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validator = Validator::make($request->all(),
        [
            'member_name' => ['required', 'min:3', 'max:100'],
            'member_surname' => ['required', 'min:3', 'max:150'],
            'member_live' => ['required', 'min:3', 'max:50'],
            'member_experience' => ['required', 'integer'],
            'member_registered' => ['required', 'integer'],
            'reservoir_id' => ['required', 'min:1']
        ]
 
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $member->name = $request->member_name;
        $member->surname = $request->member_surname;
        $member->live = $request->member_live;
        $member->experience = $request->member_experience;
        $member->registered = $request->member_registered;
        $member->reservoir_id = $request->reservoir_id;

        $member->save();

        // return redirect()->route('member.index');
        return redirect()->route('member.index')
        ->with('success_message', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        // return redirect()->route('member.index');
        return redirect()->route('member.index')
        ->with('success_message', 'Deleted successfully.');
    }
}
