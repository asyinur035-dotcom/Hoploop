<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $req){
        $data = $req->validated();
        $user = User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'role'=>$data['role']
        ]);

        if($user->role === 'perusahaan'){
            $user->company()->create(['nama_perusahaan'=>'']);
        }

        $token = $user->createToken('hobloop-token')->plainTextToken;
        return response()->json(['user'=>$user,'token'=>$token],201);
    }

    public function login(LoginRequest $req){
        $credentials = $req->validated();
        $user = User::where('email',$credentials['email'])->first();
        if(!$user || !Hash::check($credentials['password'],$user->password)){
            return response()->json(['message'=>'Invalid credentials'],401);
        }
        // Optional: revoke previous tokens
        $user->tokens()->delete();
        $token = $user->createToken('hobloop-token')->plainTextToken;
        return response()->json(['user'=>$user,'token'=>$token]);
    }

    public function logout(Request $req){
        $req->user()->currentAccessToken()->delete();
        return response()->json(['message'=>'Logged out']);
    }
}
