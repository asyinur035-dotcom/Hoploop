<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $req, Job $job){
        $req->validate(['message'=>'required|string|max:2000']);
        $user = $req->user();
        $contact = Contact::create([
            'user_id'=>$user->id,
            'company_id'=>$job->company_id,
            'job_id'=>$job->id,
            'message'=>$req->message
        ]);
        // Optional: send notification/mail here
        return response()->json(['message'=>'sent']);
    }
}
