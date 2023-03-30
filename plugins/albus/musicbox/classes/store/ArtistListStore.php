<?php namespace Albus\MusicBox\Classes\Store;

use Lovata\Toolbox\Classes\Store\AbstractListStore;
use Albus\MusicBox\Classes\Store\Artist\ActiveListStore;

/**
 * Class ArtistListStore
 * @package Albus\MusicBox\Classes\Store
 */
class ArtistListStore extends AbstractListStore
{
    protected static $instance;

    /**
     * Init store method
     */
    protected function init()
    {
        $this->addToStoreList('active', ActiveListStore::class);
    }
}
