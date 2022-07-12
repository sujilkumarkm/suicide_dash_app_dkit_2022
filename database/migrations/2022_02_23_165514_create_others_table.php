<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained()->onDelete('cascade');
            $table->string('cast')->nullable();
            $table->string('famstat')->default('middle_class');
            $table->string('hobbie')->nullable();
            $table->string('aboutme')->nullable();
            $table->string('demands')->default('no_demands');
            $table->string('formem')->nullable();
            $table->string('status')->nullable();
            $table->string('prf_stat')->default('enabled');
            $table->string('jathakam')->nullable();
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
        Schema::dropIfExists('others');
    }
}
