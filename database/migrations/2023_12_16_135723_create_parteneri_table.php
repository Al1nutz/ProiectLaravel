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
        Schema::create('parteneri', function (Blueprint $table) {
            $table->id('id_pti');
            $table->string('Denumire');
            $table->string('Telefon_partener');
            $table->string('Email_partener');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parteneri', function (Blueprint $table) {
            $table->dropColumn([
                'id_pti',
                'Denumire',
                'Telefon_partener',
                'Email_partener',
            ]);
        });
    }
};
