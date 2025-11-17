<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->enum('jenis_pekerjaan',['Full-time','Part-time','Internship','Contract','Freelance'])->default('Full-time');
            $table->string('lokasi')->nullable();
            $table->string('minimal_pendidikan')->nullable();
            $table->string('pengalaman')->nullable();
            $table->integer('salary_min')->nullable();
            $table->integer('salary_max')->nullable();
            $table->text('description')->nullable();
            $table->text('qualifications')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('jobs'); }
};
