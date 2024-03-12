<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up():void
    {
        Schema::create('locatii', function (Blueprint $table) {
            $table->id('id_lci');
            $table->string('strada');
            $table->string('numar');
            $table->string('oras');
            $table->string('judet');
            $table->integer('capacitate_maxima');
            $table->string('denumire');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('locatii');
    }
};
