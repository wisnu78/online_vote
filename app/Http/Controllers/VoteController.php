<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;
use App\Vote;

class VoteController extends Controller
{
    public function store(Request $request){
        $vote = new Vote;
        $vote->user_id = auth()->user()->id;
        $vote->candidate_id = $request->candidate_id;
        $vote->save();
        $candidate = Candidate::find($request->candidate_id);
        foreach ($candidate->users as $user){
            if ($user->id == $request->vote){
                $temp = $user->pivot->vote;
                $user->pivot->vote = $temp + 1;
                $user->pivot->update();
            }

        }

        return redirect()->back();
    }
}
