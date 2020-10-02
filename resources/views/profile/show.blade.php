@extends('layouts.app')

@section('content')

    <div class="content mt-5">
        <div class="title m-b-md">
            {{$user->name}}'s Mood
        </div>
        <br>

        <div class="title m-b-md mb-0 mt-5">
            I am at {{$profile->mood_percentage}} %
        </div>

    </div>



    <div class="container mt-5">
        <div class="row d-flex d-flex justify-content-around mt-5">
            @if(!$moods->first() == null)
                @foreach($moods as $mood)

                    <p> - {{$mood->title}}</p>

                @endforeach
            @endif
        </div>
    </div>
@endsection
