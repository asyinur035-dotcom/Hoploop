<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest {
    public function authorize(){ return true; }
    public function rules(){
        return [
            'title'=>'required|string|max:255',
            'jenis_pekerjaan'=>'required|in:Full-time,Part-time,Internship,Contract,Freelance',
            'lokasi'=>'nullable|string|max:255',
            'minimal_pendidikan'=>'nullable|string|max:255',
            'pengalaman'=>'nullable|string|max:255',
            'salary_min'=>'nullable|numeric',
            'salary_max'=>'nullable|numeric',
            'description'=>'nullable|string',
            'qualifications'=>'nullable|string'
        ];
    }
}
