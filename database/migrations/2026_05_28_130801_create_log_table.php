<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log', function (Blueprint $table) {

            $table->id();

            $table->string('method')->nullable();
            $table->string('endpoint')->nullable();

            $table->longText('request_data')->nullable();
            $table->longText('response_data')->nullable();

            $table->integer('status')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log');
    }
};