<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     * https://laravel.com/docs/5.4/eloquent-relationships#polymorphic-relations
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menuable_id');
            $table->string('menuable_type');
            $table->enum('position', ['navbar', 'sidebar', 'footer']);
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
        Schema::dropIfExists('menus');
    }
}
