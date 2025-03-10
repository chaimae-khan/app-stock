<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tvas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('value', 5, 2);
            $table->foreignId('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tvas');
    }
};