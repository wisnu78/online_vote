<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;
use App\Candidate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $candidate = Candidate::where("status",1)->first();
        $vote = Vote::where("candidate_id",$candidate->id)->where('user_id',auth()->user()->id)->first();
        return view('home',compact('candidate','vote'));
    }
}
