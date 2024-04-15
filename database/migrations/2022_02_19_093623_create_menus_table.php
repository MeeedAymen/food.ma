<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->decimal('price', 6, 2);
            $table->string('image');
            $table->string('size');
            $table->string('type')->default('undefined');
            $table->decimal('estCost', 6, 2)->nullable();
            $table->integer('allergic')->default('0');
            $table->integer('vegetarian')->default('0');
            $table->integer('vegan')->default('0');
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
