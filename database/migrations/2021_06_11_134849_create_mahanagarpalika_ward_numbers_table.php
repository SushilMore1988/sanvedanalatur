<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahanagarpalikaWardNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahanagarpalika_ward_numbers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mahanagarpalika_id')->unsigned();
            $table->bigInteger('zone_id')->unsigned()->nullable();
            $table->string('name');
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
        Schema::dropIfExists('mahanagarpalika_ward_numbers');
    }
}
