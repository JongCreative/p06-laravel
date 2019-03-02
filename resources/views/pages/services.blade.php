@extends('layouts.app')

@section('content')
<div class="container container-services">
<div class="content">
    <h1> {{$aapje}}</h1>
    @if(count($languages) > 0)
        <ul>
            @foreach ($languages as $language)
                <li>{{$language}}</li>
            @endforeach
        </ul>
    @endif
</div>
</div>
@endsection 