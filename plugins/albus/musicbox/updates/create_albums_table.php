<?php namespace Albus\MusicBox\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateAlbumsTable Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
class CreateAlbumsTable extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::create('albus_musicbox_albums', function(Blueprint $table) {
            $table->id();
            $table->timestamps();
            /** Data */
            $table->string('name')->nullable();
            $table->string('slug')->index();
            $table->longText('info')->nullable();
            $table->timestamp('released_at')->nullable();
            /** Sorting */
            $table->integer('sort_order')->nullable();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('albus_musicbox_albums');
    }
}
