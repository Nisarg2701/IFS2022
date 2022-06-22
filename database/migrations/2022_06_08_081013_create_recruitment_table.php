<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment', function (Blueprint $table) {
            $table->id('recruitment_id');
            $table->string('first_name', 60);
            $table->string('last_name', 60);
            $table->string('email', 100);
            $table->string('phone_number', 12);
            $table->string('job', 100);
            $table->string('current_salary', 7);
            $table->string('expected_salary', 7);
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('resume', 400);
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
        Schema::dropIfExists('recruitment');
    }
};
