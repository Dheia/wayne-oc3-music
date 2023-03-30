<?php namespace Albus\MusicBox\Classes\Store\Genre;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithoutParam;
use Albus\MusicBox\Models\Genre;

/**
 * Class TopLevelListStore
 * @package Albus\MusicBox\Classes\Store\Genre
*/
class TopLevelListStore extends AbstractStoreWithoutParam
{
    protected static $instance;

    /**
     * Get ID list from database
     * @return array
     */
    protected function getIDListFromDB() : array
    {
        $arElementIDList = (array) Genre::where('nest_depth', 0)
            ->orderBy('nest_left', 'asc')
            ->pluck('id')->all();

        return $arElementIDList;
    }
}
