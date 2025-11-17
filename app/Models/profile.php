<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','nama','tanggal_lahir','jenis_kelamin','pendidikan_terakhir','pengalaman_kerja','whatsapp','cv_path'];
    public function user(){ return $this->belongsTo(User::class); }
}
