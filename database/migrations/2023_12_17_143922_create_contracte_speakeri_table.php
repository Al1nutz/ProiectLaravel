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
        Schema::create('contracte_speakeri', function (Blueprint $table) {
            $table->id('id_csi');
            $table->date('Data');
            $table->time('ora_inceput');
            $table->time('ora_sfarsit');
            $table->decimal('tarif', 6, 2);
            $table->foreignId('id_spk')->constrained('speakeri')->onDelete('cascade');
            $table->foreignId('id_eve')->constrained('events')->onDelete('cascade');
        });
    }

    public function down():void
    {
        Schema::dropIfExists('contracte_speakeri');
    }
};
