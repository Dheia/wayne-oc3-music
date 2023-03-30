<?php namespace Albus\MusicBox\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateGenresTable Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
class CreateGenresTable extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::create('albus_musicbox_genres', function(Blueprint $table) {
            $table->id();
            $table->timestamps();
            /** Data */
            $table->string('name')->nullable();
            $table->string('slug')->index();
            $table->longText('info')->nullable();
            /** Sorting */
            $table->integer('parent_id')->nullable();
            $table->integer('nest_left')->nullable();
            $table->integer('nest_right')->nullable();
            $table->integer('nest_depth')->nullable();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('albus_musicbox_genres');
    }
}
