<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('staff_reports', function (Blueprint $table) {
            $table->id();
            $table->timestamp('waktu');
            $table->string('judul');
            $table->unsignedBigInteger('user_id'); // Kolom untuk staf
            $table->unsignedBigInteger('lead_id'); // kolom
            $table->text('detail');
            $table->string('file')->nullable();
            $table->integer('status')->default('1'); // 0: disabled, 1 :enabled
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lead_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_reports');
    }
};
