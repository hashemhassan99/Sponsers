<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalSponsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_sponsers', function (Blueprint $table) {
            $table->id();
            $table->string('verification_card_type');
            $table->string('verification_card');
            $table->string('sponser_name');
            $table->string('address');
            $table->string('mobile');
            $table->string('phone');
            $table->string('email');
            $table->foreignId('governorate_id')->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->foreignId('neighborhood_id')->constrained()->onDelete('cascade');
            $table->foreignId('residence_country_id')->constrained()->onDelete('cascade');
            $table->foreignId('nationality_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('personal_sponsers');
    }
}
