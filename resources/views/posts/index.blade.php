@extends('layouts.app')

@section('content')
<div class="container container-posts">
    <div class="positioning posts-index posts-index1">
        <h1> posts-index </h1>
    </div>

    @if (count($kippetje) > 0)
    <div class="positioning posts-index posts-index2">
        @foreach ($kippetje as $kip)
            <article class="wrapper wrapper-post1">
                <section class="section-post post1.1"><a href="/posts/{{$kip->post_id}}">{{$kip->post_title}}</a></section>
                <section class="section-post post1.2">{{$kip->post_body}}</section>
                <section class="section-post post1.2">{{$kip->post_url}}</section><hr/>
                <section class="section-post post1.3">{{$kip->created_at}}</section>
            </article>
        @endforeach
        {{$kippetje->links()}}
        @else
            <article clas="wrapper wrapper-post-2">
                <section class="section-post post-2.1">Nothing to post</section>
            </article>
        </div>
        {{$kippetje->links()}}
    @endif
</div>
@endsection 

