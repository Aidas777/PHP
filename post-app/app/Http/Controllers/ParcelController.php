<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\Post;
use Illuminate\Http\Request;
use Validator;

class ParcelController extends Controller
{

    const RESULTS_IN_PAGE = 9;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $parcels = Parcel::paginate(self::RESULTS_IN_PAGE)->withQueryString()->sortBy('surname');
        $parcels = Parcel::orderByDesc('weight')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
        $posts = Post::orderBy('code')->paginate(100)->withQueryString();
        // return view('parcel.index', ['parcels' => $parcels, 'posts' => $posts]);

        // $parcels = Parcel::orderBy('name')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
        // $doctors = Doctor::orderBy('name')->paginate(self::RESULTS_IN_PAGE)->withQueryString();

        if ($request->sort) {
            if ('weight' == $request->sort && 'asc' == $request->sort_dir) {
                $parcels = Parcel::orderBy('weight')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
            else if ('weight' == $request->sort && 'desc' == $request->sort_dir) {
                $parcels = Parcel::orderBy('weight', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
            else if ('phone' == $request->sort && 'asc' == $request->sort_dir) {
                $parcels = Parcel::orderBy('phone')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
                // dd($request->sort_dir);
            }
            else if ('phone' == $request->sort && 'desc' == $request->sort_dir) {
                $parcels = Parcel::orderBy('phone', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
            // else if ('size' == $request->sort && 'asc' == $request->sort_dir) {
            //     $parcels = Parcel::orderBy('size')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            // }
            // else if ('size' == $request->sort && 'desc' == $request->sort_dir) {
            //     $parcels = Parcel::orderBy('size', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            // }
            else {
                $parcels = Parcel::paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
        }

        else if ($request->filter && 'post' == $request->filter) {
            $parcels = Parcel::where('post_id', $request->post_id)->paginate(self::RESULTS_IN_PAGE)->withQueryString();
        }
        else if ($request->search && 'all' == $request->search) {

        }
        else {
            // nieko nesortinam
            $parcels = Parcel::orderByDesc('weight')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
        }
        

        return view('parcel.index', [
            'parcels' => $parcels,
            'sortDirection' => $request->sort_dir ?? 'asc',
            'posts' => $posts,
            'post_id' => $request->post_id ?? '0',
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
        $parcels = Parcel::paginate(self::RESULTS_IN_PAGE)->withQueryString()->sortByDesc('weight');
        $posts = Post::orderBy('town')->get();
        return view('parcel.create', ['parcels' => $parcels, 'posts' => $posts]);
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
            'parcel_weight' => ['required', 'numeric','min:1'],
            'parcel_phone' => ['required', 'min:5', 'max:12'],
            'parcel_info' => ['required', 'min:3'],
            // 'parcel_experience' => ['required', 'integer'],
            //  'parcel_registered' => 'lte:parcel_experience',
            'post_id' => ['required', 'min:1']
        ]
 
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
 
 
         $parcel = new Parcel;
         $parcel->weight = $request->parcel_weight;
         $parcel->phone = $request->parcel_phone;
         $parcel->info = $request->parcel_info;
         $parcel->post_id = $request->post_id;
 
         $parcel->save();
         // return redirect()->route('parcel.index');
 
         return redirect()->route('parcel.index')
         ->with('success_message', 'Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function show(Parcel $parcel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function edit(Parcel $parcel)
    {
        // $posts = Post::orderBy('town')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
        $posts = Post::orderBy('town')->get();
        return view('parcel.edit', ['parcel' => $parcel, 'posts' => $posts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parcel $parcel)
    {
        $validator = Validator::make($request->all(),
        [
            'parcel_weight' => ['required', 'numeric','min:1'],
            'parcel_phone' => ['required', 'min:5', 'max:12'],
            'parcel_info' => ['required', 'min:3'],
            // 'parcel_experience' => ['required', 'integer'],
            //  'parcel_registered' => 'lte:parcel_experience',
            'post_id' => ['required', 'min:1']
        ]
 
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
 
         $parcel->weight = $request->parcel_weight;
         $parcel->phone = $request->parcel_phone;
         $parcel->info = $request->parcel_info;
         $parcel->post_id = $request->post_id;
 
         $parcel->save();
         // return redirect()->route('parcel.index');
 
         return redirect()->route('parcel.index')
         ->with('success_message', 'Updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parcel $parcel)
    {
        $parcel->delete();
        // return redirect()->route('parcel.index');
        return redirect()->route('parcel.index')
        ->with('success_message', 'Deleted successfully.');

    }
}
