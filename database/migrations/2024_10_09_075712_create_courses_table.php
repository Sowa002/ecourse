<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('id_course')->unique();
            $table->string('title_course');
            $table->text('about_course');
            $table->boolean('is_premium');
            $table->string('level_course');
            $table->decimal('price_course', 8, 2)->nullable();
            $table->string('teacher')->nullable();
            $table->string('duration_course')->nullable();
            $table->string('module')->nullable();
            $table->string('language_course')->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
