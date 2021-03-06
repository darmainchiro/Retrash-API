<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TypeTrash extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_trash', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_type');
            $table->string('name_solusi');
            $table->string('description');
            $table->string('gambar');
            $table->timestamps();

            $table->foreign('id_type')->references('id')->on('category');

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
