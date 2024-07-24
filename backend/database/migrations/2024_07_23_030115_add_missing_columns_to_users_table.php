<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('dateOfBirth')->nullable();  // Add the column if missing
            $table->string('gender')->nullable();     // Add the column if missing
            $table->string('address')->nullable();    // Add the column if missing
            $table->string('profile')->nullable();    // Add the column if missing
            $table->string('phoneNumber')->nullable(); // Add the column if missing
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('dateOfBirth');
            $table->dropColumn('gender');
            $table->dropColumn('address');
            $table->dropColumn('profile');
            $table->dropColumn('phoneNumber');
        });
    }
};
