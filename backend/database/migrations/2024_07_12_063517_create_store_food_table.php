<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('store_food', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('food_id');
            $table->softDeletes();
            $table->timestamps();

            $table->index('created_at'); // Add this line
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('store_food');
    }
};

   
