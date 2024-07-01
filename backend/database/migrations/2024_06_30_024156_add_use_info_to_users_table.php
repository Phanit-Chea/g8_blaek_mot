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
        Schema::table('users', function (Blueprint $table) {
            $table->string('streetName')->nullable();
            $table->string('streetNumber')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->string('houseNumber')->nullable();
            $table->string('district')->nullable();
            $table->string('commune')->nullable();
            $table->string('province')->nullable();
            $table->string('gender')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('streetName');
            $table->dropColumn('streetNumber');
            $table->dropColumn('phoneNumber');
            $table->dropColumn('dateOfBirth');
            $table->dropColumn('houseNumber');
            $table->dropColumn('district');
            $table->dropColumn('commune');
            $table->dropColumn('province');
            $table->dropColumn('gender');
        });
    }
};
