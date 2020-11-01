<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouvementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mouvements', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_produit');
            $table->date('date_mouvement');
            $table->String('type_mvt');
            $table->String('description');
            $table->timestamps();
        });

        Schema::table('mouvements', function(Blueprint $table) {
			$table->foreign('id_user')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
        });
        Schema::table('mouvements', function(Blueprint $table) {
			$table->foreign('id_produit')->references('id')->on('produits')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mouvements');
    }
}
