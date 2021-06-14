<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained();
            $table->enum('name', ['Country', 'State', 'District', 'Taluka', 'Village', 'City', 'Zone', 'Mahanagarpalika', 'MahanagarpalikaWardNumber', 'Nagarparishad', 'NagarparishadWardNumber']);
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
        Schema::dropIfExists('areas');
    }
}
