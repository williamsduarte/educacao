<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysicalPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->char('cpf', 14);
            $table->char('rg', 14);
            $table->char('dispatcher', 10);
            $table->date('birth');
            $table->integer('genre_id')->unsigned();
            $table->integer('civil_id')->unsigned();
            $table->char('phone', 15);
            $table->char('cell_phone', 15);
            $table->string('father', 50);
            $table->string('mother', 50);
            $table->integer('address_id')->unsigned();
            $table->string('district', 50);
            $table->string('public_place', 50);
            $table->timestamps();

            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->foreign('civil_id')->references('id')->on('civils')->onDelete('cascade');
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
        Schema::dropIfExists('physical_people');
    }
}
