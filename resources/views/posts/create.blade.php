@extends('layouts.app')

@section('content')
<div class="container container-posts">
    <div class="positioning posts-index posts-create1">
        <h1> posts-create post </h1>
        <a href="/posts">back to dblist</a>
    </div>

    <div class="positioning posts-index posts-create2">
        <form class="form-insert" action="/posts" method="POST">
            <article class="wrapper wrapper-post1">
                <input class="post-insert insert-1.1" type="text" name="post_title" placeholder="title" value="{{ old('post_title') }}">
                <textarea class="post-insert insert-1.2" name="post_body" placeholder="textarea" value="{{ old('post_body') }}"></textarea>
                <input class="post-insert insert-1.2" type="text" name="post_url" placeholder="url" value="{{ old('post_url') }}">
            @csrf
            </article>
            <article class="wrapper wrapper-post2">
                <input class="post-insert insert-2.1" type="submit">
            </article>
        </form>
    </div>
    
    <div class="positioning posts-index posts-create3"></div>
</div>
@endsection 

