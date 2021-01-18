<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('region');
            $table->string('country');
            $table->string('temperature');
            $table->string('condition_text');
            $table->string('condition_code');
            $table->text('condition_icon');
            $table->string('wind_kph');
            $table->string('wind_degree');
            $table->string('wind_direction');
            $table->string('humidity');
            $table->string('clouds');
            $table->string('feels_like');
            $table->string('visual_km');
            $table->string('uv');
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
        Schema::dropIfExists('weather');
    }
}
