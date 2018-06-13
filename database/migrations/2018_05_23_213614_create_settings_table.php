<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
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
            $table->string('telegram_link', 255)->nullable();
            $table->string('fb_link', 255)->nullable();
            $table->string('vk_link', 255)->nullable();
            $table->string('instagram_link', 255)->nullable();
            $table->string('phone', 25)->nullable();
            $table->string('graph', 50)->nullable();
            $table->string('graph_num_1', 25)->nullable();
            $table->string('graph_num_2', 25)->nullable();
            $table->string('block_1_1', 25)->nullable();
            $table->string('block_1_2', 25)->nullable();
            $table->string('block_1_3', 25)->nullable();
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
