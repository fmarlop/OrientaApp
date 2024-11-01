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
        Schema::create('comp_pref_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->float('mathComp');
            $table->float('mathPref');
            $table->float('langComp');
            $table->float('langPref');
            $table->float('histComp');
            $table->float('histPref');
            $table->float('flangComp');
            $table->float('flangPref');
            $table->float('slangComp');
            $table->float('slangPref');
            $table->float('physComp');
            $table->float('physPref');
            $table->float('chemComp');
            $table->float('chemPref');
            $table->float('bioComp');
            $table->float('bioPref');
            $table->float('geolComp');
            $table->float('geolPref');
            $table->float('geogComp');
            $table->float('geogPref');
            $table->float('tecdComp');
            $table->float('tecdPref');
            $table->float('plarComp');
            $table->float('plarPref');
            $table->float('techComp');
            $table->float('techPref');
            $table->float('philComp');
            $table->float('philPref');
            $table->float('phedComp');
            $table->float('phedPref');
            $table->float('musComp');
            $table->float('musPref');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comp_pref_tests');
    }
};
