<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulirsTable extends Migration
{
    public function up()
    {
        Schema::create('formulirs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alamat');
            $table->string('pendidikan');
            $table->string('reason');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('formulirs');
    }
}