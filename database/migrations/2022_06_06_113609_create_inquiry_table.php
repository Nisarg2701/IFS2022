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
        Schema::create('inquiry', function (Blueprint $table) {
            $table->id('inquiry_id');
            $table->string('first_name', 60);
            $table->string('last_name', 60);
            $table->string('email', 200);
            $table->string('phone_number', 100);
            $table->string('occupation', 1000);
            $table->enum('gender', ['Male','Female', 'Other']);
            $table->string('requirement', 200);
            $table->enum('category', ['Salaried', 'Self-employed', 'Professional']);
            $table->string('current_address', 600);
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
        Schema::dropIfExists('inquiry');
    }
};
