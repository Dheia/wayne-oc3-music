<?php namespace Albus\MusicBox\Models;

use Model;
use System\Models\File;
use Albus\MusicBox\Models\Track;
/**
 * Album Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Album extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;
    use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string table name
     */
    public $table = 'albus_musicbox_albums';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'name' => 'required|min:3',
    ];

    protected $slugs = ['slug' => 'name'];

    protected $dates = [
        'created_at',
        'updated_at',
        'released_at'
    ];

    public $hasMany = [
        'tracks' => Track::class
    ];

    public $attachOne = [ 'cover' => File::class ];
}
