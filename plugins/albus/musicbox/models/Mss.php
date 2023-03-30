<?php namespace Albus\MusicBox\Models;

use Model;
use System\Models\File;

/**
 * Mss Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Mss extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\Sluggable;

    /**
     * @var string table name
     */
    public $table = 'albus_musicbox_msses';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'name' => 'required|min:3',
    ];
    
    protected $slugs = [ 'slug' => 'name' ];

    public $attachOne = [ 
        'icon' => File::class,
    ];
}
