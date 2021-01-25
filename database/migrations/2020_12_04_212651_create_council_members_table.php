<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouncilMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('council_members', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone_number')->nullable();
//            $table->string("profile_image")->nullable();
            $table->string("department")->nullable();
            $table->integer("current_year")->nullable();
            $table->string("class")->nullable();
            $table->integer("roll_no")->nullable();
            $table->string('society_id')->nullable();
            $table->string('society_name')->nullable();
            $table->string('role')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at');
            $table->string('password');
            $table->integer('isVerified')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('council_members');
    }
}
