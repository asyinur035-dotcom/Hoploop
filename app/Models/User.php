<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $fillable = ['name','email','password','role'];
    protected $hidden = ['password','remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];

    public function profile(){ return $this->hasOne(Profile::class); }
    public function company(){ return $this->hasOne(Company::class); }
    public function savedJobs(){ return $this->hasMany(SavedJob::class); }
    public function contacts(){ return $this->hasMany(Contact::class); }
}
