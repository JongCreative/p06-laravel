@extends('layouts.app')

@section('content')
    <h1> {{$aapje}}</h1>
        <ul>

        <!-- start messy way -->
            <?php /* 
                foreach ($aapjeslijst as $user) {
                    echo '<li>' . $user . '</li>';
                } */
            ?>
        <!-- end messy way -->
        <!-- start neat way -->
            @foreach($kippetjes as $user)
                <li>{{$user}}</li>
            @endforeach
        <!-- end neat way -->

        </ul>
@endsection 