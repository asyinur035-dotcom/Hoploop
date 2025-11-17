<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class SavedJobController extends Controller
{
    public function store(Request $req, Job $job){
        $user = $req->user();
        if($user->role !== 'pelamar') return response()->json(['message'=>'Forbidden'],403);
        $user->savedJobs()->firstOrCreate(['job_id'=>$job->id]);
        return response()->json(['message'=>'saved']);
    }

    public function destroy(Request $req, Job $job){
        $user = $req->user();
        $user->savedJobs()->where('job_id',$job->id)->delete();
        return response()->json(['message'=>'unsaved']);
    }
}
