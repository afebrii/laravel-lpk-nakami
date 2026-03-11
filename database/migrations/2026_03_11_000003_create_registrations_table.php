<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('ref_code', 20)->unique();
            $table->enum('type', ['konsultasi', 'pelatihan']);
            $table->foreignId('program_id')->nullable()->constrained('programs')->nullOnDelete();
            $table->string('name');
            $table->string('phone', 20);
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->date('dob')->nullable();
            $table->string('last_education', 50)->nullable();
            $table->string('occupation', 100)->nullable();
            $table->string('mother_phone', 20)->nullable();
            $table->text('motivation')->nullable();
            $table->string('photo')->nullable();
            $table->text('message')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'done', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
