<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     * To be added to menus
     */
    public function up()
    {
        Schema::create('custom_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('text');
            $table->enum('target', ['_blank', '_parent', '_top', '_self'])->default('_self');
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
        Schema::dropIfExists('custom_links');
    }
}
