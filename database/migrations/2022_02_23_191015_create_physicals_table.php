<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physicals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ph_id')->constrained()->onDelete('cascade');
            $table->string('height')->default('Not Available');
            $table->string('weight')->default('Not Available');
            $table->string('btype')->default('Not Available');
            $table->string('complexion')->default('Not Available');
            $table->string('blood_group')->default('Not Available');
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
        Schema::dropIfExists('physicals');
    }
}
