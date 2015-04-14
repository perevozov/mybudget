<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateDb extends Migration {

	/**
	 * Creating initial structure of the database
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('currencies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 200); //Название валюты TODO: надо что-то делать с локализацией
			$table->char('iso_code', 3);
			$table->timestamps();

		});

		Schema::create('families', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 200);

			$table->timestamps();
		});

		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 200);
			$table->string('email', 200);
			$table->string('password'. 200);

		});

		Schema::create('family_user', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned();
			$table->foreing('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('family_id')->unsigned();
			$table->foreign('family_id')->references('id')->on('families')->onDelete('cascade');
		});

		Schema::create('accounts', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('currency_id')->unsigned(); //Валюта счета
			$table->foreign('currency_id')->references('id')->on('currencies');
			$table->integer('family_id')->unsigned(); //Семья - владелец счета
			$table->foreign('family_id')->references('id')->on('families');
			$table->date('opened_at'); //Дата открытия счета
			$table->double('initial_balance', 15, 2); //Остаток на дату открытия счета
			$table->string('name', 200); //Название счета
			$table->timestamps();
		});

		Schema::create('transactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('debit_account_id')->unsigned();
			$table->foreign('debit_account_id')->references('id')->on('accounts');

			$table->integer('credit_account_id')->unsigned();
			$table->foreign('credit_account_id')->references('id')->on('accounts');

			$table->double('credit_amount', 15, 2);
			$table->double('debit_amount', 15, 2);
			$table->timestamps();

		});

		Schema::create('transaction_templates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 200); //Название шаблона
			$table->
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('accounts');
		Schema::drop('families');
		Schema::drop('currencies')
	}

}
