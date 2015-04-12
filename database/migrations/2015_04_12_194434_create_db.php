<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
			$table->string('name', 200); //Название валюты
			$table->char('iso_code', 3);

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
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('accounts');
	}

}
