@extends('layouts.app')

@section('content')
<div class="container container-dashboard">
    <div class="positioning dashboard dashboard1">
        <h1> Dashboard </h1>
        <p><a href="/posts">back to dblist</a></p>
    </div>
        
    <div class="positioning dashboard dashboard2">
        @include('inc.messages')
            You are logged in!
    </div>
{{--     <div class="positioning dashboard dashboard3">
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
    </div> --}}
    <div class="positioning dashboard dashboard4">
        @if(count($kippetje)> 0)
            <article class="wrapper wrapper-dashboard">
                <section class="section-dashboard section-dashboard1">
                    <p class="table table1">title</p>
                    <p class="table table2"></p>
                    <p class="table table3"></p>
                </section>
            </article>
        
            <article class="positioning dashboard dashboard2">
                        your list
            </article>
            <article class="wrapper wrapper-dashboard">
                @foreach ($kippetje as $post)
                <section class="section-dashboard section-dashboard2">
                    <p class="table table1">{{$post->post_title}}</p>
                    <p class="table table2"><a class="btn" href="/posts/{{$post->post_id}}/edit">edit</a></p>
                    <p class="table table3">
                        <form class="form-insert" action="/posts/{{$post->post_id}}" method="POST">
                            @method('DELETE')            
                            @csrf
                            <button type="submit" value="delete">delete</button>
                        </form>
                    </p>
                </section>
                @endforeach    

            </article>
            @endif
        </div>
    </div>
</div>
@endsection
