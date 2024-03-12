<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('speakeri', function (Blueprint $table) {
            $table->id('id_spk');
            $table->string('Nume_speaker');
            $table->string('Prenume_speaker');
            $table->string('Telefon_speaker');
            $table->string('Email_speaker');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('speakeri', function (Blueprint $table) {
            $table->dropColumn([
                'id_spk',
                'Nume_speaker',
                'Prenume_speaker',
                'Telefon_speaker',
                'Email_speaker',
            ]);
        });
    }
};
