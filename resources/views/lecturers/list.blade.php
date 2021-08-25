@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ol class="list-group list-group-numbered">
                    @foreach (range(1,10) as $user)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                            <a href="{{ route('lecturer.details', ["id"=>$user]) }}"> დეტალების ნახვა</a>
                        </div>
                        <span class="badge bg-primary text-white rounded-pill">14/43</span>
                    </li>
                    @endforeach

                </ol>
            </div>
        </div>
    </div>
@endsection
