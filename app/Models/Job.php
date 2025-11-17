<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['company_id','title','jenis_pekerjaan','lokasi','minimal_pendidikan','pengalaman','salary_min','salary_max','description','qualifications'];
    public function company(){ return $this->belongsTo(Company::class); }
}
