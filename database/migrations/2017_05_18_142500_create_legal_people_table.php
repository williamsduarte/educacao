<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name', 50);
            $table->string('fantasy_name', 50);
            $table->char('cnpj', 20);
            $table->char('phone', 15);
            $table->char('cell_phone', 15);
            $table->integer('address_id')->unsigned();
            $table->string('district', 50);
            $table->string('public_place', 50);
            $table->string('email', 50);
            $table->string('site', 50);
            $table->string('state_registration', 20);

            $table->timestamps();


            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legal_people');
    }
}
