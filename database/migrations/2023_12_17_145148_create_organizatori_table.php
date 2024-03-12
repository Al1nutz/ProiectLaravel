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
        Schema::create('organizatori', function (Blueprint $table) {
            $table->id('id_ogi');
            $table->string('denumire');
            $table->string('telefon');
            $table->string('email');
        });
    }

    public function down():void
    {
        Schema::dropIfExists('organizatori');
    }
};
