<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimotionalLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimotional_langs', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('profession',100);
            $table->string('text',500);
            $table->string('lang',3);
            $table->foreignId('testimotional_id')->constrained('testimotionals')->onDelete('cascade');
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
        Schema::dropIfExists('testimotional_langs');
    }
}
