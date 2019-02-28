<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* 
        * Check if connected to web.php, blade.php, phpMyAdmin
        *
        * option1
        * dd (Post::all());
        *
        * option2
        * Post::all();
        * return view('posts.index');
        */

        $post = Post::orderBy('created_at', 'DESC')->paginate(5);
        return view('posts.index')->with('kippetje', $post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'post_title' => 'required',
            'post_body' => 'required',
            'post_url' => 'required',
        ]);
        //dd (request()->all());
        
        //create post like when using tinker, but with request for what went into the specific input field
        $post =  new Post;
        $post->post_title = $request->input('post_title');
        $post->post_body = $request->input('post_body');
        $post->post_url = $request->input('post_url');
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        $post = Post::find($post_id);
        return view('posts.show')->with('kippetje', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $post = Post::find($post_id);
        return view('posts.edit')->with('kippetje', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id)
    {
        $this->validate($request, [
            'post_title' => 'required',
            'post_body' => 'required',
            'post_url' => 'required',
        ]);
        //dd (request()->all());
        
        //create post like when using tinker, but with request for what went into the specific input field
        $post =  Post::find($post_id);
        $post->post_title = $request->input('post_title');
        $post->post_body = $request->input('post_body');
        $post->post_url = $request->input('post_url');
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id )
    {
        $post =  Post::find($post_id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post Removed');
    }
}
