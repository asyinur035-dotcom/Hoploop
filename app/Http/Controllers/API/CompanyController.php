<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function show(Request $req){
        return response()->json($req->user()->load('company'));
    }

    public function update(Request $req){
        $req->validate([
            'nama_perusahaan'=>'required|string|max:255',
            'alamat_perusahaan'=>'nullable|string',
            'website'=>'nullable|url'
        ]);
        $company = $req->user()->company ?? $req->user()->company()->create([]);
        $company->fill($req->only(['nama_perusahaan','alamat_perusahaan','website']));
        $company->save();
        return response()->json($company);
    }
}
