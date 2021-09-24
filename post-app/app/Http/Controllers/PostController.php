<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Validator;

class PostController extends Controller
{
    const RESULTS_IN_PAGE = 5;

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
                // $posts = Post::all();
                $posts = Post::orderBy('code')->paginate(self::RESULTS_IN_PAGE);
                // $members = Member::all()->sortBy('surname');
                return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
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
            'post_code' => ['required', 'min:3', 'max:20'],
            'post_town' => ['required', 'min:1', 'max:55'],
            'post_capacity' => ['required', 'integer'],
        ]
 
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        $post = new Post;
        $post->code = $request->post_code;
        $post->town = $request->post_town;
        $post->capacity = $request->post_capacity;
        $post->save();

        // return redirect()->route('post.index');
        return redirect()->route('post.index')
        ->with('success_message', 'Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(),
        [
            'post_code' => ['required', 'min:3', 'max:20'],
            'post_town' => ['required', 'min:1', 'max:55'],
            'post_capacity' => ['required', 'integer'],
        ]
 
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $post->code = $request->post_code;
        $post->town = $request->post_town;
        $post->capacity = $request->post_capacity;
        $post->save();

        // return redirect()->route('post.index');
        return redirect()->route('post.index')
        ->with('success_message', 'Updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        
        if($post->getParcel->count()){
            return redirect()
            ->route('post.index')->with('info_message', 'Can`t delete, because this post keeps one of parcels !');
        }
        
        $post->delete();
        // return redirect()->route('post.index');
        return redirect()->route('post.index')
        ->with('success_message', 'Deleted successfully.');
    }
}
