<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $columns = [
            'type' => fn (Blueprint $table) => $table->string('type')->default('undefined'),
            'estCost' => fn (Blueprint $table) => $table->decimal('estCost', 6, 2)->nullable(),
            'allergic' => fn (Blueprint $table) => $table->integer('allergic')->default(0),
            'vegetarian' => fn (Blueprint $table) => $table->integer('vegetarian')->default(0),
            'vegan' => fn (Blueprint $table) => $table->integer('vegan')->default(0),
        ];

        foreach ($columns as $column => $definition) {
            if (!Schema::hasColumn('menus', $column)) {
                Schema::table('menus', function (Blueprint $table) use ($definition) {
                    $definition($table);
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Columns live on the original create_menus_table migration.
    }
}
