@extends('layouts.app')

@section('content')
    <h1> post-index </h1>

    @if (count($kippetje) > 0)
    <div class="container-post">
    @foreach ($kippetje as $post)
        <article class="wrapper-post post-1">
            <section class="section-post post-1.1">{{$post->post_title}}</section>
            <section class="section-post post-1.2">{{$post->post_body}}</section><hr/>
            <section class="section-post post-1.3">{{$post->created_at}}</section>
        </article>
    @endforeach
    @else
        <article clas="wrapper-post post-2">
            <section class="section-post post-2.1">Nothing to post</section>
        </article>
    </div>
    @endif
@endsection 

