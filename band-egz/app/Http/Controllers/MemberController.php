<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Reservoir;
use Validator;

class MemberController extends Controller
{
    const RESULTS_IN_PAGE = 9;

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
        // $members = Member::paginate(self::RESULTS_IN_PAGE)->withQueryString()->sortBy('surname');
        $members = Member::orderBy('surname')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
        $reservoirs = Reservoir::orderBy('title')->paginate(100)->withQueryString();
        // return view('member.index', ['members' => $members, 'reservoirs' => $reservoirs]);

        // $members = Member::orderBy('name')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
        // $doctors = Doctor::orderBy('name')->paginate(self::RESULTS_IN_PAGE)->withQueryString();

        if ($request->sort) {
            if ('name' == $request->sort && 'asc' == $request->sort_dir) {
                $members = Member::orderBy('name')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
            else if ('name' == $request->sort && 'desc' == $request->sort_dir) {
                $members = Member::orderBy('name', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
            else if ('experience' == $request->sort && 'asc' == $request->sort_dir) {
                $members = Member::orderBy('experience')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
                // dd($request->sort_dir);
            }
            else if ('experience' == $request->sort && 'desc' == $request->sort_dir) {
                $members = Member::orderBy('experience', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
            // else if ('size' == $request->sort && 'asc' == $request->sort_dir) {
            //     $members = Member::orderBy('size')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            // }
            // else if ('size' == $request->sort && 'desc' == $request->sort_dir) {
            //     $members = Member::orderBy('size', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            // }
            else {
                $members = Member::paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
        }

        else if ($request->filter && 'reservoir' == $request->filter) {
            $members = Member::where('reservoir_id', $request->reservoir_id)->paginate(self::RESULTS_IN_PAGE)->withQueryString();
        }
        else if ($request->search && 'all' == $request->search) {

        }
        else {
            // nieko nesortinam
            $members = Member::paginate(self::RESULTS_IN_PAGE)->withQueryString();
        }
        

        return view('member.index', [
            'members' => $members,
            'sortDirection' => $request->sort_dir ?? 'asc',
            'reservoirs' => $reservoirs,
            'reservoir_id' => $request->reservoir_id ?? '0',
            's' => $request->s ?? ''
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('member.create');

        // $reservoirs = Reservoir::paginate(self::RESULTS_IN_PAGE)->withQueryString();
        $reservoirs = Reservoir::paginate(self::RESULTS_IN_PAGE)->withQueryString()->sortBy('title');
        $members = Member::paginate(self::RESULTS_IN_PAGE)->withQueryString()->sortBy('surname');
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
        //    'member_registered' => ['required', 'integer'],
            'member_registered' => 'lte:member_experience',
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
        return view('member.show', ['member' => $member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        // $reservoirs = Reservoir::paginate(self::RESULTS_IN_PAGE)->withQueryString();
        $reservoirs = Reservoir::orderBy('title')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
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
            'member_registered' => 'lte:member_experience',
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
