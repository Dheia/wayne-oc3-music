<?php namespace Albus\MusicBox\Models;

use Model;
use Carbon\Carbon;
use System\Models\File;
use Albus\MusicBox\Models\Album;
use Albus\MusicBox\Models\Genre;
use Albus\MusicBox\Models\Artist;
use Albus\MusicBox\Models\Mss;

use Lovata\Toolbox\Traits\Helpers\TraitCached;
/**
 * Track Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Track extends Model
{
    use TraitCached;

    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;
    use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string table name
     */
    public $table = 'albus_musicbox_tracks';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'title' => 'required|min:3',
    ];

    protected $slugs = [ 'slug' => 'title' ];

    public $fillable = [
        'id',
        'title',
        'name',
        'slug',
        'genre_id',
        'album_id',
        'year',
        'released_at',
        'lyrics',
        'content',
        'published_at',
        'published',
        'send_to_telegram',
        'sort_order',
        'cover'
    ];

    public $cached = [
        'id',
        'title',
        'name',
        'slug',
        'genre_id',
        'album_id',
        'year',
        'released_at',
        'lyrics',
        'content',
        'published_at',
        'published',
        'send_to_telegram',
        'sort_order',
        'cover'
    ];

    /**
     * @var array belongsToMany
     */
    public $belongsToMany = [
        'artists' => [
            Artist::class,
            'table' => 'albus_musicbox_track_artist',
            'pivotSortable' => 'sort_order',
        ],
        'mss' => [
            Mss::class,
            'table' => 'albus_musicbox_track_mss',
            'pivot' => ['url'],
            'timestamps' => true,
            'pivotSortable' => 'sort_order',
        ],
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'released_at'
    ];
    
    public $belongsTo = [
        'genre' => Genre::class,
        'album' => Album::class,
    ];

    public $attachOne = [ 
        'cover' => File::class,
        'music_file' => File::class
    ];

    /**
     * getStatusCodeAttribute
     */
    public function getStatusAttribute()
    {
        if ($this->published) {
            $now = Carbon::now();
            if (!isset($this->published_at)) {
                return 'hasnotdate';
            } elseif ($this->published_at > $now) {
                return 'notreleased';
            }
            return 'published';
        }

        if ($this->published) {
            return 'published';
        }

        return 'draft';
    }

    /**
     * getStatusNameOptions
     */
    public function getStatusOptions()
    {
        return [
            'published' => ['Опубликован', '#85CB43'],
            'draft' => ['Черновик', '#bdc3c7'],
            'notreleased' => ['Еще не вышел', '#e67e21'],
            'hasnotdate' => ['Не указана дата показа', '#85CB43'],
        ];
    }

    public static $allowedSortingOptions = array(
        'created_at desc' => 'Дата убывание',
        'created_at asc' => 'Дата вверх',
        'rating desc' => 'Рейтинг убывание',
        'rating asc' => 'Рейтинг вверх',
    );

    public function scopeListFrontEnd($query, $options = [], $method = 'list'){
        extract(array_merge([
            'page' => 1,
            'perPage' => 10,
            'published' => true,
            'sort' => 'created_at desc',
        ], $options));

        $query->where('published', true);
        $query->with('cover', 'music_file', 'artists');

        if (isset($id)) {
            $query->whereId($id);
        }
        
        // if ($type) { $query->where('type_id', $type); }

        /** Сортировка */
        if (!is_array($sort)) { $sort = [$sort]; }   
        foreach ($sort as $_sort) {
            if (in_array($_sort, array_keys(self::$allowedSortingOptions ))) {
                $parts = explode(' ', $_sort);
                if (count($parts) < 2) {
                    array_push($parts, 'desc');
                }
                list($sortField, $sortDirection) = $parts;
                $query->orderBy($sortField, $sortDirection);
            }
        }

        // if ($rooms) {
        //     if (!is_array($rooms)) {
        //         $rooms = [$rooms];
        //     }
        //     if (in_array("5", $rooms)) {
        //         $query->whereIn('rooms', $rooms)->orWhere('rooms', '>' ,'5');
        //     } else {
        //         $query->whereIn('rooms', $rooms);
        //     } 
        // }

        // if ($location) {
        //     if (!is_array($location)) {
        //         $location = [$location];
        //     }            
        //     $query->whereHas('location', function($q)use($location){
        //         $q->whereIn('location_id', $location);
        //     });
        // }

        // if ($not_first) { $query->where('floor','!=', 1); }
        // if ($not_last) { $query->whereColumn('floor','!=', 'storeys'); }


        // if ($min_price) { $query->where('price','>=', $min_price); }
        // if ($max_price) { $query->where('price','<=', $max_price); }

        // if ($min_square) { $query->where('total_area', '>=' , $min_square); }
        // if ($max_square) { $query->where('total_area', '<=' , $max_square); }

        // if($deal) {
        //     if (!is_array($deal)) {
        //         $deal = [$deal];
        //     }
        //     if (count($deal) != 2) {
        //         $query->where('deal', $deal[0]);
        //     }
        // }

        // if($category) { $query->where('category_id', $category); }
        if ($method === 'list') {
            return $query->get();
        } elseif ($method === 'item') {
            return $query->first();
        } else {
            return [];
        }
        
    }


}
