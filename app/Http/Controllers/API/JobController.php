<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index(Request $req){
        $q = Job::with('company');
        if($req->filled('lokasi')) $q->where('lokasi','like','%'.$req->lokasi.'%');
        if($req->filled('kualifikasi')) $q->where('minimal_pendidikan',$req->kualifikasi);
        if($req->filled('jenis')) $q->where('jenis_pekerjaan',$req->jenis);
        if($req->filled('keyword')) $q->where('title','like','%'.$req->keyword.'%');
        $jobs = $q->latest()->paginate(12);
        return response()->json($jobs);
    }

    public function show(Job $job){
        return response()->json($job->load('company'));
    }

    public function store(JobRequest $req){
        $user = $req->user();
        if($user->role !== 'perusahaan') return response()->json(['message'=>'Forbidden'],403);
        $company = $user->company;
        $job = $company->jobs()->create($req->validated());
        return response()->json($job,201);
    }

    public function update(JobRequest $req, Job $job){
        $user = $req->user();
        if($user->role !== 'perusahaan' || $job->company->user_id !== $user->id) return response()->json(['message'=>'Forbidden'],403);
        $job->update($req->validated());
        return response()->json($job);
    }

    public function destroy(Request $req, Job $job){
        $user = $req->user();
        if($user->role !== 'perusahaan' || $job->company->user_id !== $user->id) return response()->json(['message'=>'Forbidden'],403);
        $job->delete();
        return response()->json(['message'=>'deleted']);
    }
}
