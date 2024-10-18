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
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');    // Уникальный идентификатор
            $table->dateTime('time');   // Время события
            $table->integer('duration');    // Длительность запроса
            $table->string('ip', 100)->nullable();  // IP-адрес
            $table->string('url')->nullable();  // URL
            $table->string('method', 10)->nullable();   // HTTP-метод
            $table->text('input')->nullable();  // Параметры запроса
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
