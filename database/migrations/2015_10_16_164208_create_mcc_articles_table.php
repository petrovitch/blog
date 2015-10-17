<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//
// Auto-generated Migration Created: 2015-10-16 16:42:08
// ------------------------------------------------------------

class CreateMccArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	*/
	public function up()
	{
		Schema::create('mcc_articles', function(Blueprint $table) {
			$table->unsignedInteger('id')->unsigned();
			$table->string('title', 255)->nullable();
			$table->string('event', 255)->nullable();
			$table->string('site', 255)->nullable();
			$table->date('gameDate')->nullable();
			$table->unsignedInteger('gameRound')->nullable()->unsigned();
			$table->string('eco', 255)->nullable();
			$table->string('gameResult', 255)->nullable();
			$table->string('white', 255)->nullable();
			$table->string('black', 255)->nullable();
			$table->unsignedInteger('whiteElo')->nullable()->unsigned();
			$table->unsignedInteger('blackElo')->nullable()->unsigned();
			$table->text('pgn')->nullable();
			$table->text('fritz')->nullable();
			$table->text('moves')->nullable();
			$table->unsignedInteger('year')->nullable()->unsigned();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	*/
	public function down()
	{
		Schema::drop('mcc_articles');
	}
}