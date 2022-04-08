<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_langs', function (Blueprint $table) {
            $table->id();
            $table->string('question',500)->nullable();
            $table->string('answer',500)->nullable();
            $table->string('lang',3);
            $table->foreignId('faq_id')->constrained('faqs');
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
        Schema::dropIfExists('faq_langs');
    }
}
