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
                <section class="section-post post1.3">{{$kip->post_url}}</section>
                <section class="section-post post1.4"><img src="/storage/post_images/{{$kip->post_img}}"/></section>
                <section class="section-post post1.5">by:{{$kip->created_at}}</section>
                <section class="section-post post1.6">by:{{$kip->user_id}}</section>
            </article>
        @endforeach
        {{$kippetje->links()}}
        @else
            <article clas="wrapper wrapper-post-2">
                <section class="section-post post-2.1">Nothing to post</section>
            </article>
        </div>
    @endif
</div>
@endsection 

