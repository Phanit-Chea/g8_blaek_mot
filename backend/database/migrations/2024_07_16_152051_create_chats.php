<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->integer('from_user')->constrained('users')->onDelete('cascade');
            $table->integer('to_user')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->text('video')->nullable();
            $table->timestampsTz();
            DB::statement("SET time_zone = '+07:00'");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
