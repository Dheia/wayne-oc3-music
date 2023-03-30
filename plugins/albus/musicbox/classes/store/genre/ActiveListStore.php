<?php namespace Albus\MusicBox\Classes\Store\Genre;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithoutParam;
use Albus\MusicBox\Models\Genre;

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
        $arElementIDList = (array) Genre::pluck('id')->all();

        return $arElementIDList;
    }
}
