@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route("lecturer.search")}}" method="get">
        <div class="row">
            <div class="input-group mb-2">
                <input type="text" class="form-control" placeholder="ლექტორის ძიება" aria-label="lecturer" name="search" value="{{request('search')}}" aria-describedby="button-search">
                <button class="btn btn-outline-secondary" type="submit" id="button-search">მოძებნა</button>
            </div>
        </div>
        </form>


                    <div class="row">
                    @foreach ($lecturers as $lecturer)
                    <div class="col-lg-3 col-md-4 col-sm-12 mt-4">
                    <div class="card" >
                            <img src="{{url('images')}}/{{ $lecturer->img }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title ">
                                    <a href="{{ route('lecturer.details', ["id"=>$lecturer->id]) }}">
                                        <p class="card-text"> {{ $lecturer->name }} </p>
                                    </a></h6>
                            </div>
                        <ul class="list-group list-group-flush">
                                <li class="list-group-item">აკადემიური ქულა
                                    <x-package-progressbar :rank="$lecturer->academicrank"/>
                                </li>
                                <li class="list-group-item">პიროვნული ქულა
                                    <x-package-progressbar :rank="$lecturer->personalrank"/>
                                </li>
                            </ul>
                            <div class="card-body">
                                <a href="{{ route('lecturer.details', ["id"=>$lecturer->id]) }}" type="button" class="btn btn-outline-primary">ნახვა</a>
                                <a href="{{ route('lecturer.vote', ["id"=> $lecturer->id]) }}" type="button" class="btn btn-outline-primary" >ხმის მიცემა</a>
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
@endsection
