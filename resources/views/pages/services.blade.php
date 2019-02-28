@extends('layouts.app')

@section('content')
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
@endsection 