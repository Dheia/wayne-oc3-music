<?php namespace Albus\MusicBox\Classes\Store\Artist;

use Lovata\Toolbox\Classes\Store\AbstractStoreWithoutParam;
use Albus\MusicBox\Models\Artist;

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
        $arElementIDList = (array) Artist::pluck('id')->all();

        return $arElementIDList;
    }
}
