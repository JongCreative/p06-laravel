@extends('layouts.app')

@section('content')
    <h1> {{$aapje}}</h1>
    @if(count($languages) > 0)
        <ul>
            @foreach ($languages as $language)
                <li>{{$language}}</li>
            @endforeach
        </ul>
    @endif
@endsection 