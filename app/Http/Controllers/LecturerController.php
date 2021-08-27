<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use App\Models\Lecturer;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hamcrest\Core\IsNull;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::all();
        return view("lecturers.list", ['lecturers'=>$lecturers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturer $lecturer)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        //
    }


    public function details($id)
    {
        $lecturer = Lecturer::where('id',$id)->first();
        return view('lecturers.details', ['lecturer'=>$lecturer]);
    }

    public function getStatistics($lecturer_id , $json = true)
    {
        $data["academic"]["diction"] = Academic::where('lecturer_id', $lecturer_id)->avg("diction");
        $data["academic"]["explain"] = Academic::where('lecturer_id', $lecturer_id)->avg("explain");
        $data["academic"]["involved"] = Academic::where('lecturer_id', $lecturer_id)->avg("involved");
        $data["academic"]["homeworkeasy"] = Academic::where('lecturer_id', $lecturer_id)->avg("homeworkeasy");
        $data["academic"]["homeworkcount"] = Academic::where('lecturer_id', $lecturer_id)->avg("homeworkcount");
        $data["academic"]["communication"] = Academic::where('lecturer_id', $lecturer_id)->avg("communication");

        $data["personal"]["givepoints"] = Personal::where('lecturer_id', $lecturer_id)->avg("givepoints");
        $data["personal"]["isgood"] = Personal::where('lecturer_id', $lecturer_id)->avg("isgood");
        $data["personal"]["hastact"] = Personal::where('lecturer_id', $lecturer_id)->avg("hastact");
        $data["personal"]["isorganised"] = Personal::where('lecturer_id', $lecturer_id)->avg("isorganised");
        $data["personal"]["isempatic"] = Personal::where('lecturer_id', $lecturer_id)->avg("isempatic");
        $data["personal"]["islovely"] = Personal::where('lecturer_id', $lecturer_id)->avg("islovely");

        if ($json) return response()->json($data);
        return $data;
    }


    public function search()
    {

        if (\request('search')) {
            $term = \request('search');
            $lecturers = Lecturer::where('name',"like", "%{$term}%")->get();
            return view("lecturers.list", ['lecturers'=>$lecturers]);
        }
        return redirect(back());

    }

    public function vote($id)
    {
        $lecturer = Lecturer::where('id',$id)->first();
        $vote['academic'] = Academic::where("user_id",Auth::user()->id)->where("lecturer_id", $lecturer->id)->first();
        $vote['personal'] = Personal::where("user_id",Auth::user()->id)->where("lecturer_id", $lecturer->id)->first();

        return view('lecturers.vote',['lecturer' => $lecturer, 'vote'=>$vote]);
    }
    public function votesave($lecturer_id)
    {
        $lecturer = Lecturer::where('id',$lecturer_id)->first();
        $user_id = Auth::user()->id;
        $academic = Academic::where("user_id",Auth::user()->id)->where("lecturer_id", $lecturer_id)->first();
        $personal = Personal::where("user_id",Auth::user()->id)->where("lecturer_id", $lecturer_id)->first();
        if ($academic)) {
            dd($academic);
            $academic->diction = \request('diction');
            $academic->explain = \request('explain');
            $academic->involved = \request('involved');
            $academic->homeworkeasy = \request('homeworkeasy');
            $academic->homeworkcount = \request('homeworkcount');
            $academic->communication = \request('communication');
            $academic->save();
        } else {
            $academic = new Academic;
            $academic->diction = \request('diction');
            $academic->explain = \request('explain');
            $academic->involved = \request('involved');
            $academic->homeworkeasy = \request('homeworkeasy');
            $academic->homeworkcount = \request('homeworkcount');
            $academic->communication = \request('communication');
            $personal->lecturer_id = $lecturer_id;
            $personal->user_id = $user_id;
            $academic->save();
        }
        if (notNullValue($personal)) {
            $personal->givepoints = \request('givepoints');
            $personal->isgood = \request('isgood');
            $personal->hastact = \request('hastact');
            $personal->isorganised = \request('isorganised');
            $personal->isempatic = \request('isempatic');
            $personal->islovely = \request('islovely');
            $personal->save();
        } else{
            $personal = new Personal;
            $personal->givepoints = \request('givepoints');
            $personal->isgood = \request('isgood');
            $personal->hastact = \request('hastact');
            $personal->isorganised = \request('isorganised');
            $personal->isempatic = \request('isempatic');
            $personal->islovely = \request('islovely');
            $personal->lecturer_id = $lecturer_id;
            $personal->user_id = $user_id;
            $personal->save();
        }


        return redirect()->back();
    }
}
