@extends('layouts.app')

@section('content')
    <div class="alert alert-success text-center" role="alert">
        {{ Auth::user()->name }} welcome back to MoodApp ! Have a wondefull day !
    </div>

    <div class="container">
        <div class="row d-flex justify-content-between ">
            {{--            <button class="btn btn-success">Ajouter une Humeur</button>--}}
            {{--            @include('moods.create')--}}
            {{--            <button class="btn btn-success">Selectionner ses Humeurs</button>--}}
            {{--            <button class="btn btn-alert">Modifier une Humeur</button>--}}
            {{--            <button class="btn btn-danger">Supprimer une Humeur</button>--}}

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 grey-bg">
                @include('moods.create')


                @if(!$moods->first() == null)
                    @foreach($moods as $mood)

                        <form action="/moods/{{$mood->id}}" method="post" class="mt-3">
                            @method("PATCH")
                            @csrf

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="mood" id="{{$mood->title}}"
                                       value="{{$mood->id}}" {{  ($mood->is_selected == 1 ? ' checked' : '') }}  disabled>

                                <label class="form-check-label" for="{{$mood->title}}">
                                    {{$mood->title}}
                                </label>
                                @if($mood->is_selected)
                                    <button class="btn btn-danger btn-sm " type="submit">unselect</button>
                                @endif
                                @if(!$mood->is_selected)
                                    <button class="btn btn-success btn-sm " type="submit">select</button>
                                @endif
                            </div>


                        </form>

                    @endforeach
                @endif


            </div>
            <div class="col-md-9">
                <h3 class="">Profile Overview :</h3>

                <form action="/percentage/{{$profile->id}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="mood_percentage">Mood Percentage</label>
                            <input type="number" name="mood_percentage" class="form-control" id="mood_percentage" value="{{$profile->mood_percentage}}"
                                   min="0" max="100">
                        </div>
                    </div>



                        <button class="btn btn-success " type="submit">Save</button>

                </form>


            </div>
        </div>
    </div>

@endsection
