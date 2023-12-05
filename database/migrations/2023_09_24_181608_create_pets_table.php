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
        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('age_month')->unsigned();
            $table->enum('species', ['Собака', 'Кіт', 'Гризун', 'Пташка', 'Інше']);
            $table->enum('sex', ['Самець', 'Самиця']);
            $table->string('breed')->nullable();
            $table->string('color')->nullable();
            $table->boolean('sterilization')->default(0);
            $table->boolean('vaccination')->default(0);
            $table->boolean('special')->default(0); //статус "особливий"
            $table->boolean('guardianship')->default(0); //статус "під опікою"
            $table->string('city');
            $table->string('phone_number', 13);
            $table->string('story')->nullable();
            $table->string('peculiarities')->nullable(); //особливості поведінки
            $table->string('wishes')->nullable(); //побажання щодо прилаштування
            $table->string('photo')->nullable();
            $table->string('patrons')->nullable();
            $table->boolean('adopted')->default(0); //тварина має дім
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
        Schema::dropIfExists('pets');
    }
};
