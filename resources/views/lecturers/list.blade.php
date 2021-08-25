@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

                    <div class="row">
                    @foreach ($lecturers as $lecturer)
                    <div class="col-sm-3 mt-3">
                    <div class="card" >
                            <img src="{{$lecturer->img}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('lecturer.details', ["id"=>$lecturer->id]) }}">
                                        <p class="card-text">{{$lecturer->name}}</p>
                                    </a></h5>
                            </div>
                        <ul class="list-group list-group-flush">
                                <li class="list-group-item">აკადემიური ქულა {{$lecturer->academicrank}}</li>
                                <li class="list-group-item">პერსონალური ქულა {{$lecturer->personalrank}}</li>
                            </ul>
                            <div class="card-body">
                                <a href="{{ route('lecturer.details', ["id"=>$lecturer->id]) }}" class="card-link">მეტი</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </div>


        </div>
    </div>
@endsection
