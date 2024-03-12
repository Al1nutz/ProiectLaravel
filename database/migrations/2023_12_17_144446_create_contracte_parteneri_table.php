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
        Schema::create('contracte_parteneri', function (Blueprint $table) {
            $table->id('id_cpi');
            $table->decimal('valoare_sponsorizata', 20, 2);
            $table->foreignId('id_pti')->constrained('parteneri')->onDelete('cascade');
            $table->foreignId('id_eve')->constrained('events')->onDelete('cascade');
        });
    }

    public function down():void
    {
        Schema::dropIfExists('contracte_parteneri');
    }
};
