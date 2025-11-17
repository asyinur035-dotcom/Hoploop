<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','nama_perusahaan','alamat_perusahaan','website'];
    public function user(){ return $this->belongsTo(User::class); }
    public function jobs(){ return $this->hasMany(Job::class); }
}
