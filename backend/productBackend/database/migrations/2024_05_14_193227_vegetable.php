<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vegetable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vegetable', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('icon');
            $table->decimal('price_usd', 8, 2);
            $table->decimal('price_nok', 8, 2); 
            $table->string('type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vegetable');
    }
}

  
