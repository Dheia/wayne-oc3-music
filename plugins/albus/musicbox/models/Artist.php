<?php namespace Albus\MusicBox\Models;

use Model;
use System\Models\File;
use Albus\MusicBox\Models\Track;
use Lovata\Toolbox\Traits\Helpers\TraitCached;

/**
 * Artist Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Artist extends Model
{
    use TraitCached;

    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;
    use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string table name
     */
    public $table = 'albus_musicbox_artists';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'name' => 'required|min:3',
    ];
    
    protected $slugs = ['slug' => 'name'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $belongsToMany = [
        'tracks' => [
            Track::class,
            'name' => 'entity',
            'table' => 'albus_musicbox_track_artist'
        ],
    ];

    public $attachOne = [ 
        'avatar' => File::class,
        'cover' => File::class,
    ];

    public $fillable = [
        'id',
        'name',
        'slug',
        'info',
        'sort_order',
        'avatar',
        'cover'
    ];

    public $cached = [
        'id',
        'name',
        'slug',
        'info',
        'sort_order',
        'avatar',
        'cover'
    ];
}
