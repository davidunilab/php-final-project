@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h3 class="text-center">{{$lecturer->name}}</h3>
            <p>{{$lecturer->about}}</p>
        </div>
        <div class="col-2 ">
            <img src="{{$lecturer->img}}" class="img-fluid" alt="">
            <a href="{{ route("lecturer.statistics", ['id'=>$lecturer->id]) }}">
            <p class="text-center d-flex justify-content-center">
                <span id="academic-rank" data-toggle="tooltip" data-placement="left" title="აკადემიური ქულა">{{$lecturer->academicrank}}</span>

                /

                <span id="personal-rank" data-toggle="tooltip" data-placement="right" title="პიროვნული ქულა">{{$lecturer->personalrank}}</span>
            </p>
            </a>
        </div>
    </div>

    <div class="row">
        <a href="{{ route('lecturer.vote', ["id"=> $lecturer->id]) }}" class="mr-2"><i class="fas fa-poll fa-3x"></i> შეფასება</a>
        <a href="#" class="mr-2"><i class="fas fa-file-word fa-3x"></i> cv</a>
    </div>

    <div class="row mt-5" id="charts">
        <div class="col-6">
            <h3 class="text-center lecturer-id"  data-lecturer="{{$lecturer->id}}">აკადემიური ქულა</h3>
            <canvas id="academic" width="400" height="400"></canvas>
        </div>
        <div class="col-6">
            <h3 class="text-center lecturer-id" data-lecturer="{{$lecturer->id}}">პიროვნული ქულა</h3>
            <canvas id="personal" width="400" height="400" ></canvas>
        </div>
    </div>

</div>



@endsection
