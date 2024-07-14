<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    // public function up()
    // {
    //     Schema::create('roles', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('name')->unique();
    //         $table->timestamps();
    //     });
    // }

    // public function down()
    // {
    //     Schema::dropIfExists('roles');
    // }
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user'); // Add 'role' column with default role 'user'
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
}
