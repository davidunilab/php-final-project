<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use App\Models\Comments;
use App\Models\Lecturer;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;


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
        $academicVoteCount = Academic::where('lecturer_id', $id)->count();
        $personalVoteCount = Personal::where('lecturer_id', $id)->count();
        $comments = Comments::with('user')->where("lecturer_id", $id)->get();
        return view('lecturers.details', [
            'lecturer'=>$lecturer,
            'personalVoteCount'=>$personalVoteCount,
            'academicVoteCount'=>$academicVoteCount,
            'comments'=>$comments
        ]);
    }

    public function getStatistics($lecturer_id)
    {
        $cacheKey =  Lecturer::findOrFail($lecturer_id)->getStatisticCacheKey();

       $cachedResult = Cache::remember($cacheKey, 30 * 30 * 30, function () use ($lecturer_id){
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

            return $data;
        });

        return $cachedResult;
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
        $comment = Comments::where("user_id",Auth::user()->id)->where("lecturer_id", $lecturer->id)->first();
        return view('lecturers.vote',['lecturer' => $lecturer, 'vote'=>$vote, 'comment'=>$comment]);
    }
    public function votesave($lecturer_id)
    {
        $lecturer = Lecturer::where('id', $lecturer_id)->firstOrFail();
        $user_id = Auth::user()->id;
        $academic = Academic::where("user_id",Auth::user()->id)->where("lecturer_id", $lecturer_id)->first();
        $personal = Personal::where("user_id",Auth::user()->id)->where("lecturer_id", $lecturer_id)->first();
        $comment = Comments::where("user_id",Auth::user()->id)->where("lecturer_id", $lecturer->id)->first();


        Validator::make(\request()->all(), [
            'diction' => 'required|integer|numeric|min:0|max:10',
            'explain' => 'required|integer|numeric|min:0|max:10',
            'involved' => 'required|integer|numeric|min:0|max:10',
            'homeworkeasy' => 'required|integer|numeric|min:0|max:10',
            'homeworkcount' => 'required|integer|numeric|min:0|max:10',
            'communication' => 'required|integer|numeric|min:0|max:10',
            'givepoints' => 'required|integer|numeric|min:0|max:10',
            'isgood' => 'required|integer|numeric|min:0|max:10',
            'hastact' => 'required|integer|numeric|min:0|max:10',
            'isorganised' => 'required|integer|numeric|min:0|max:10',
            'isempatic' => 'required|integer|numeric|min:0|max:10',
            'islovely' => 'required|integer|numeric|min:0|max:10',
        ])->validate();


        if (!is_null($academic) ) {
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
            $academic->lecturer_id = $lecturer_id;
            $academic->user_id = $user_id;
            $academic->save();
        }
        if (!is_null($personal)) {
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

        $getComment = \request("comment");

        if (is_null($comment)) {
            $comment = new Comments();
        } else {
            $comment->delete();
        };

        if(!is_null($getComment)) {
            $comment->comment = \request("comment");
            $comment->lecturer_id = $lecturer_id;
            $comment->user_id = $user_id;
            $comment->save();
        }


        $this->updateSummedPoints($lecturer_id);

        Cache::forget($lecturer->getStatisticCacheKey());
        return redirect()->back();
    }

    public function updateSummedPoints($lecturer_id)
    {

        $academicPoints = 0;
        $personalPoints = 0;

        $academic = DB::table('academics')
                ->select(DB::raw(
                    "avg(`diction`) as `diction`,
                    avg(`explain`) as `explain`,
                    avg(`involved`) as `involved`,
                    avg(`homeworkeasy`) as `homeworkeasy`,
                    avg(`homeworkcount`) as `homeworkcount`,
                    avg(`communication`) as `communication`
                    "))
                ->where("lecturer_id", $lecturer_id)
            ->first();
        foreach ($academic as $a){ $academicPoints += $a;}


        $personal = DB::table('personals')
            ->select(DB::raw(
                "avg(`givepoints`) as `givepoints`,
                        avg(`isgood`) as `isgood`,
                        avg(`hastact`) as `hastact`,
                        avg(`isorganised`) as `isorganised`,
                        avg(`isempatic`) as `isempatic`,
                        avg(`islovely`) as `islovely`
                        "))
            ->where("lecturer_id", $lecturer_id)
            ->first();
        foreach ($personal as $p){ $personalPoints += $p;}

        $l = Lecturer::find($lecturer_id);
        $l->personalrank = $personalPoints * 100 / 60;
        $l->academicrank = $academicPoints * 100 / 60;
        $l->save();

    }



}
