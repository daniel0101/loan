<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Applications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('applications',function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->decimal('loan_amount',30,6);
            $table->decimal('income',30,6);
            $table->string('why');
            $table->string('collateral');
            $table->decimal('collateral_value',30,6);
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
        //
    }
}
