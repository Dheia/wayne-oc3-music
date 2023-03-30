<?php namespace Albus\MusicBox\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateTracksTable Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
class CreateTracksTable extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::create('albus_musicbox_tracks', function(Blueprint $table) {
            $table->id();
            $table->timestamps();
            /** Data */
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->index();
            $table->integer('genre_id')->nullable();
            $table->integer('album_id')->nullable();
            $table->integer('year')->nullable();
            $table->timestamp('released_at')->nullable();
            $table->longText('lyrics')->nullable();
            $table->longText('content')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('published')->default(true);
            $table->boolean('send_to_telegram')->default(true);
            /** Sorting */
            $table->integer('sort_order')->nullable();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('albus_musicbox_tracks');
    }
}
