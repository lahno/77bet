<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_email');
            $table->integer('rate_id')->unsigned();
            $table->string('order_id', 50);
            $table->integer('value')->unsigned();
            $table->enum('status', ['created', 'paid', 'payment_error', 'canceled', 'errors_insert']);
            $table->text('comment')->nullable();
            $table->string('code', 25)->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
