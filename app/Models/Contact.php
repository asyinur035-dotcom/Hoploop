<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','company_id','job_id','message'];
    public function user(){ return $this->belongsTo(User::class); }
    public function company(){ return $this->belongsTo(Company::class); }
    public function job(){ return $this->belongsTo(Job::class); }
}
