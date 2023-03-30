<?php namespace Albus\MusicBox\Models;

use Model;
use System\Models\File;
use Albus\MusicBox\Models\Track;
/** Toolbox Uses */

/**
 * Genre Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Genre extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\NestedTree;
    use \October\Rain\Database\Traits\Sluggable;
    use \Lovata\Toolbox\Traits\Helpers\TraitCached;

    /**
     * @var string table name
     */
    public $table = 'albus_musicbox_genres';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'name' => 'required|min:3',
    ];
    
    protected $slugs = [ 'slug' => 'name' ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $hasMany = [
        'tracks' => Track::class
    ];

    public $attachOne = [ 'icon' => File::class ];

    public $fillable = [
        'id',
        'name',
        'slug',
        'info',
        'parent_id',
        'icon',
        'updated_at',
    ];

    public $cached = [
        'id',
        'name',
        'slug',
        'info',
        'parent_id',
        'icon',
        'updated_at',
    ];

}
