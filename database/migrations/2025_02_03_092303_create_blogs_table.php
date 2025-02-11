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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->LongText('desc')->nullable();
            $table->string('date')->nullable();
            $table->string('image')->nullable();
            $table->enum('status',['Active','Pending','Suspend','Approved'])->default('Active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
