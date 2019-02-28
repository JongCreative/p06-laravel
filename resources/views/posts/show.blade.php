@extends('layouts.app')

@section('content') 
<div class="container container-posts">
    <div class="positioning posts-show posts-show1">
        <h1> posts-show single post </h1>
        <a href="/posts">back to dblist</a>
    </div>

    <div class="positioning posts-show posts-show2">
        <article class="wrapper wrapper-post2">
            <section class="section-post post-1.1">{{$kippetje->post_title}}</section>
            <section class="section-post post-1.2">{{$kippetje->post_body}}</section>
            <section class="section-post post-1.2">{{$kippetje->post_url}}</section><hr/>
            <section class="section-post post-1.3">{{$kippetje->created_at}}</section>
        </article>
    </div>

    <div class="positioning posts-show posts-show3">
        <button> <a class="btn" href="/posts/{{$kippetje->post_id}}/edit">edit</a></button>
        <form class="form-insert" action="/posts/{{$kippetje->post_id}}" method="POST">
            @method('DELETE')            
            @csrf
            <button class="post-insert insert-2.2" type="submit" value="delete">delete</button>
        </form>
        
    </div>
</div>

@endsection 

