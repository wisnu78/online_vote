<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Candidate;
use Illuminate\Support\Facades\DB;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::all();
        return view("module.candidate.index",compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->pluck("name","id");
        return view("module.candidate.create",compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidate = new Candidate;
        $candidate->name = $request->name;
        $candidate->note = $request->note;
        if ($request->status == 1){
            DB::table("candidates")->update(["status"=>0]);
            $candidate->status = 1;
        }else{
            $candidate->status  = $request->candidate;
        }

        $candidate->save();
        $candidate->users()->attach($request->users);

        return redirect()->route("candidate.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate = Candidate::find($id);
        return view("module.candidate.show",compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = Candidate::find($id);
        $users = User::all()->pluck('name','id');
        return view("module.candidate.edit",compact('candidate','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $candidate =  Candidate::find($id);
        $candidate->users()->detach();
        $candidate->name = $request->name;
        $candidate->note = $request->note;
        if ($request->status == 1){
            DB::table("candidates")->update(["status"=>0]);
            $candidate->status = 1;
        }else{
            $candidate->status  = $request->candidate;
        }

        $candidate->update();
        $candidate->users()->attach($request->users);

        return redirect()->route("candidate.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = Candidate::find($id);
        $candidate->delete();
        return redirect()->route("candidate.index");
    }
}
