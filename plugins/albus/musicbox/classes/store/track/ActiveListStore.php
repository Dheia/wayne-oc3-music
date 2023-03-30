<?php namespace Albus\MusicBox\Classes\Store\Track;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithoutParam;
use Albus\MusicBox\Models\Track;

/**
 * Class SortingListStore
 * @package Albus\MusicBox\Classes\Store\Track
 */
class ActiveListStore extends AbstractStoreWithoutParam
{
    protected static $instance;

    /**
     * Get ID list from database
     * @return array
     */
    protected function getIDListFromDB() : array
    {
        $arElementIDList = (array) Track::where('published', true)->pluck('id')->all();

        return $arElementIDList;
    }
}
