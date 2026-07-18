<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrancheSocietesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branche_societes', function (Blueprint $table) {
            $table->id();
            $table->string('raison_sociale')->nullable();
            $table->string('capitale')->nullable();
            $table->string('Adresse')->nullable();
            $table->string('telephone_fixe')->nullable();
            $table->string('fax')->nullable();
            $table->string('id_soc')->nullable();
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
        Schema::dropIfExists('branche_societes');
    }
}
