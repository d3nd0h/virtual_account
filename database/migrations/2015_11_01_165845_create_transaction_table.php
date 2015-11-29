<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
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
            $table->integer('account_id')->unsigned();
            $table->integer('transaction_code_id')->unsigned();
            $table->date('date');
            $table->integer('amount');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('account_id')
                    ->references('id')->on('accounts')
                    ->onDelete('cascade');
            $table->foreign('transaction_code_id')
                    ->references('id')->on('transaction_codes')
                    ->onDelete('cascade');
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
