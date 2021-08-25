@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

                    <div class="row">
                    @foreach ($lecturers as $lecturer)
                    <div class="col-sm-3 mt-4">
                    <div class="card" >
                            <img src="{{$lecturer->img}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title ">
                                    <a href="{{ route('lecturer.details', ["id"=>$lecturer->id]) }}">
                                        <p class="card-text">{{$lecturer->name}}</p>
                                    </a></h5>
                            </div>
                        <ul class="list-group list-group-flush">
                                <li class="list-group-item">აკადემიური ქულა <span class="badge badge-primary"> {{$lecturer->academicrank}}</span> </li>
                                <li class="list-group-item">პერსონალური ქულა <span class="badge badge-primary"> {{$lecturer->personalrank}}</span> </li>
                            </ul>
                            <div class="card-body">
                                <a href="{{ route('lecturer.details', ["id"=>$lecturer->id]) }}" type="button" class="btn btn-outline-primary">მეტი</a>
                                <a href="#" type="button" class="btn btn-outline-primary" >შედარება</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </div>

            <div class="row mt-5">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
