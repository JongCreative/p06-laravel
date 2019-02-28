@extends('layouts.app')

@section('content')
<div class="container container-posts">
    <div class="positioning posts-index posts-create1">
        <h1> posts-EDIT post </h1>
        <a href="/posts">back to dblist</a>
    </div>

    <div class="positioning posts-index posts-create2">
        <form class="form-insert" action="/posts/{{$kippetje->post_id}}" method="POST">
            @method('PATCH')            
            @csrf
            <article class="wrapper wrapper-post1">
            <input class="post-insert insert-1.1" type="text" name="post_title" placeholder="title" value="{{$kippetje->post_title}}" >
                <textarea class="post-insert insert-1.2" name="post_body" placeholder="textarea">{{$kippetje->post_body}}</textarea>
                <input class="post-insert insert-1.2" type="text" name="post_url" placeholder="url" value="{{$kippetje->post_url}}">
                @csrf
            </article>
            <article class="wrapper wrapper-post2">
                <button class="post-insert insert-2.2" type="submit">TEST</button>
            </article>
        </form>
    </div>
    
    <div class="positioning posts-index posts-create3"></div>
</div>
@endsection 

