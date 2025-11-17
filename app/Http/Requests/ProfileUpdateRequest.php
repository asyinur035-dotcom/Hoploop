<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest {
    public function authorize(){ return true; }
    public function rules(){
        return [
            'nama'=>'required|string|max:255',
            'tanggal_lahir'=>'nullable|date',
            'jenis_kelamin'=>'nullable|in:L,P',
            'pendidikan_terakhir'=>'nullable|string|max:255',
            'pengalaman_kerja'=>'nullable|string',
            'whatsapp'=>'nullable|string',
            'cv'=>'nullable|file|mimes:pdf,doc,docx|max:2048'
        ];
    }
}
