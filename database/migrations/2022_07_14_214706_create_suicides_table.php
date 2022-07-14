<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuicidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suicides', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->constrained()->onDelete('cascade');
            $table->string('country')->nullable();
            $table->string('year')->nullable();
            $table->string('sex')->nullable();
            $table->bigInteger('suicides')->nullable();
            $table->bigInteger('population')->nullable();
            $table->bigInteger('sucid_in_hundredk')->nullable();
            $table->string('country-year')->nullable();
            $table->bigInteger('yearly_gdp')->nullable();
            $table->bigInteger('gdp_per_capita')->nullable();
            $table->bigInteger('internetusers')->nullable();
            $table->bigInteger('expenses')->nullable();
            $table->string('employeecompensation')->nullable();
            $table->bigInteger('unemployment')->nullable();
            $table->bigInteger('physician_price')->nullable();
            $table->bigInteger('laborforcetotal')->nullable();
            $table->string('lifeexpectancy')->nullable();
            $table->bigInteger('mobilesubscriptions')->nullable();
            $table->bigInteger('refugees')->nullable();
            $table->string('selfemployed')->nullable();
            $table->bigInteger('electricityacess')->nullable();
            $table->string('continent')->nullable();
            $table->string('country_code')->nullable();
            $table->string('text')->nullable();
            $table->string('mobilesubscription')->nullable();
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
        Schema::dropIfExists('suicides');
    }
}
