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
        Schema::table('lcruds', function (Blueprint $table) {
            $table->integer('empnumber');
            $table->enum('gander', ['ذكر', 'انثى']);
            $table->string('jd');
            $table->string('ct');
            $table->string('department');
            $table->string('mstate');
            $table->integer('chnumber');
            $table->bigInteger('phone');
            $table->dropColumn('details');
            


            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lcruds', function (Blueprint $table) {
            
            //
        });
    }
};
