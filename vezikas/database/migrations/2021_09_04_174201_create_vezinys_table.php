<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVezinysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vezinys', function (Blueprint $table) {
            $table->id();
            $table->string('pavadinimas', 50);
            $table->integer('svoris');
            $table->string('paemimas', 200);
            $table->string('pristatymas', 200);
            $table->text('pastabos');
            $table->unsignedBigInteger('vair_id');
            $table->foreign('vair_id')->references('id')->on('vairuotojas');
            $table->timestamps();
        });
    }



        // master_id : int(11)


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vezinys');
    }
}
