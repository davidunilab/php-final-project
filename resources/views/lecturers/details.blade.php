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
            <p class="text-center d-flex justify-content-center">
                <span id="academic-rank" data-toggle="tooltip" data-placement="left" title="აკადემიური ქულა">{{$lecturer->academicrank}}</span>

                /

                <span id="personal-rank" data-toggle="tooltip" data-placement="right" title="პიროვნული ქულა">{{$lecturer->personalrank}}</span>
            </p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-6">
            <h3 class="text-center">აკადემიური ქულა</h3>
        </div>
        <div class="col-6">
            <h3 class="text-center">პიროვნული ქულა</h3>
        </div>
    </div>

</div>

@endsection
