<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage; // access storage for delete file

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

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
            //nullable == optional
            //apache max upload 2mb
            'post_img' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable|max:1999'

        ]);
        //dd (request()->all());

        //Handle file upload
        $post_img = $request->hasFile('post_img');
        //dump($post_img->getClientOriginalName());
        if($post_img){
            dump($post_img = $request->file('post_img'));
            // get filename with the extension, we can stop right here and continue with else, or rename it.
            dump($filenameWithExt = $post_img->getClientOriginalName());
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extention
            $extension = $post_img->guessClientExtension();
            //Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $post_img->storeAs('public/post_images', $filenameToStore);
        } else {
            $filenameToStore = 'noimage.jpg';
        }
        
        //create post like when using tinker, but with request for what went into the specific input field
        $post =  new Post;
        $post->post_title = $request->input('post_title');
        $post->post_body = $request->input('post_body');
        $post->post_url = $request->input('post_url');
        $post->post_img = $filenameToStore;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('posts')->with('success', 'Post Created');
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
        if(auth()->user()->id != $post->user_id){
            return redirect('posts')->with('error', 'Please login first');
        }
        
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

        //Handle file upload
        $post_img = $request->hasFile('post_img');
        //dump($post_img->getClientOriginalName());
        if($post_img){
            dump($post_img = $request->file('post_img'));
            // get filename with the extension, we can stop right here and continue with else, or rename it.
            dump($filenameWithExt = $post_img->getClientOriginalName());
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extention
            $extension = $post_img->guessClientExtension();
            //Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $post_img->storeAs('public/post_images', $filenameToStore);
        } 
        
        //create post like when using tinker, but with request for what went into the specific input field
        $post =  Post::find($post_id);
        $post->post_title = $request->input('post_title');
        $post->post_body = $request->input('post_body');
        $post->post_url = $request->input('post_url');
        if ($post_img) {
            $post->post_img = $filenameToStore;
        }
        $post->save();

        return redirect('posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
        $post =  Post::find($post_id);

        //check for correct user_id
        if(auth()->user()->id != $post->user_id){
            return redirect('posts')->with('error', 'Please login first');
        }

        // Delete image from storage
        if ($post->post_img != 'noimage.jpg') {
            Storage::delete('public/post_images/'.$post->post_img);
        }

        $post->delete();
        return redirect('posts')->with('success', 'Post Removed');
    }
}
