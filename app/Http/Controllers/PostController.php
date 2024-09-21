<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
//use Illuminate\Support\Facades\DateTime;
use DateTime;

class PostController extends Controller
{
    public function index()
    {
        //dd(Post::factory()->create());
       // dd(auth::user());
       // $posts=Post::all();
       $posts=Auth::user()->posts;
      
        return view('Posts.index', compact('posts'));
    }

    public function create()
    {
        return view('Posts.create');
    }

    public function show(Post $post)
    {
        if (Auth::id() !=$post->user_id) {
           abort(403);
        }

        return view('Posts.show', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function test()
    {
        $results = Post::take(1) ->get();
        dd($results);
    }
}
