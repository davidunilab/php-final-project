@extends('layouts.app')

@section('content')
    <div class="container">
        <p>ხმის მიცემა ხდება 0-10 შკალით. ასევე შესაძლებელი მხოლოდ აკადემიური ან მხოლოდ პიროვნული თვისებების შეფასება. </p>
        <form action="{{route('lecturer.votesave',['id'=>$lecturer->id])}}" method="post">
            <div class="row mt-5">
                <div class="col-6">
                    <h3 class="text-center mb-5">აკადემიური ქულები</h3>
                    <div class="col-12 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">დიქცია</span>
                            <input type="number" aria-label="diction" class="form-control" name="diction" value="{{ @$vote["academic"]->diction }}">
                            @csrf
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">ახსნის უნარი</span>
                            <input type="number" aria-label="explain" class="form-control" name="explain" value="{{ @$vote["academic"]->explain }}">
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">ჩართულობა</span>
                            <input type="number" aria-label="involved" class="form-control" name="involved" value="{{ @$vote["academic"]->involved }}">
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">დავალებების სიმარტივე</span>
                            <input type="number" aria-label="homeworkeasy" class="form-control" name="homeworkeasy" value="{{ @$vote["academic"]->homeworkeasy }}">
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">დავალებების სიმრავლე</span>
                            <input type="number" aria-label="homeworkcount" class="form-control" name="homeworkcount" value="{{ @$vote["academic"]->homeworkcount }}">
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">კომუნიკაცია</span>
                            <input type="number" aria-label="communication" class="form-control" name="communication" value="{{ @$vote["academic"]->communication }}">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h3 class="text-center mb-5">პიროვნული ქულები</h3>
                    <div class="col-12 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">კარგად წერს ქულებს</span>
                            <input type="number" aria-label="diction" class="form-control" name="givepoints" value="{{ @$vote["personal"]->givepoints }}">
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">მომწონს</span>
                            <input type="number" aria-label="isgood" class="form-control" name="isgood" value="{{ @$vote["personal"]->isgood }}">
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">ტაქტიანია</span>
                            <input type="number" aria-label="hastact" class="form-control" name="hastact" value="{{ @$vote["personal"]->hastact }}">
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">ორგანიზებულია</span>
                            <input type="number" aria-label="isorganised" class="form-control" name="isorganised" value="{{ @$vote["personal"]->isorganised }}">
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">გამგებია</span>
                            <input type="number" aria-label="isempatic" class="form-control" name="isempatic" value="{{ @$vote["personal"]->isempatic }}">
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">საყვარელია</span>
                            <input type="number" aria-label="islovely" class="form-control" name="islovely" value="{{ @$vote["personal"]->islovely }}">
                        </div>
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-evenly">
                <button class="btn btn-success" type="submit">შენახვა</button>
                <a href="{{route("lecturer")}}" class="btn btn-outline-danger" type="button">ლექტორები</a>
                <a href="{{route("lecturer.details",['id'=> $lecturer->id])}}" class="btn btn-outline-info" type="button">დეტალები</a>
            </div>
        </form>
    </div>


@endsection
