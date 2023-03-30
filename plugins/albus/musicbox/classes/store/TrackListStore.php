<?php namespace Albus\MusicBox\Classes\Store;

use Lovata\Toolbox\Classes\Store\AbstractListStore;
use Albus\MusicBox\Classes\Store\Track\SortingListStore;
use Albus\MusicBox\Classes\Store\Track\ActiveListStore;

/**
 * Class TrackListStore
 * @package Albus\MusicBox\Classes\Store
 * @property SortingListStore $sorting
 */
class TrackListStore extends AbstractListStore
{
    protected static $instance;

    /**
     * Init store method
     */
    protected function init()
    {
        $this->addToStoreList('active', ActiveListStore::class);
        $this->addToStoreList('sorting', SortingListStore::class);
    }
}
