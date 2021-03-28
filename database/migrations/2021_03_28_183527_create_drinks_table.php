<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('calories');
            $table->string('total_fat')->nullable();
            $table->string('saturated_fat')->nullable();
            $table->string('trans_fat')->nullable();
            $table->string('polyunsaturated_fat')->nullable();
            $table->string('monounsaturated_fat')->nullable();
            $table->string('cholesterol')->nullable();
            $table->string('sodium')->nullable();
            $table->string('total_carbonhydrates')->nullable();
            $table->string('dietary_fiber')->nullable();
            $table->string('sugar')->nullable();
            $table->string('added_sugars')->nullable();
            $table->string('sugar_alcohols')->nullable();
            $table->string('protein');
            $table->string('vitamin_d')->nullable();
            $table->string('calcium_percentage')->nullable();
            $table->string('iron_percentage')->nullable();
            $table->string('potassium')->nullable();
            $table->string('vitamin_a_percentage')->nullable();
            $table->string('vitaminc_c_percentage')->nullable();
            $table->integer('times_consumed');
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
        Schema::dropIfExists('drinks');
    }
}
