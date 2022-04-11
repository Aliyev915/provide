<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacancyLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancy_langs', function (Blueprint $table) {
            $table->id();
            $table->string('title',150)->nullable();
            $table->longText('description')->nullable();
            $table->string('lang',3);
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');
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
        Schema::dropIfExists('vacancy_langs');
    }
}
