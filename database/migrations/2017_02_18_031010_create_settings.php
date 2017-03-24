<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_name');
            $table->string('admin_email');
            $table->string('app_motto')->nullable();
            $table->string('app_url')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('business_to_name')->nullable();
            $table->string('business_to_email')->nullable();
            $table->string('addresse_street')->nullable();
            $table->string('addresse_suburb')->nullable();
            $table->string('addresse_postcode')->nullable();
            $table->string('addresse_state')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->boolean('is_live')->default(true);
            $table->boolean('users_can_register')->default(true);
            $table->integer('default_role_id')->default(2);
            $table->boolean('is_bilingual')->default(false);
            $table->enum('default_language', ['fr', 'en'])->default('en');
            $table->integer('posts_pagination')->default(12);
            $table->integer('comments_to_display')->default(10);
            $table->boolean('auto_approve_comments')->default(true);
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
        Schema::dropIfExists('settings');
    }
}
