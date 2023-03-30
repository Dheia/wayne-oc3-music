<?php namespace Albus\MusicBox\Classes\Store;

use Lovata\Toolbox\Classes\Store\AbstractListStore;
use Albus\MusicBox\Classes\Store\Genre\TopLevelListStore;
use Albus\MusicBox\Classes\Store\Genre\ActiveListStore;

/**
 * Class GenreListStore
 * @package Albus\MusicBox\Classes\Store
 * @property TopLevelListStore $top_level
 */
class GenreListStore extends AbstractListStore
{
    protected static $instance;

    /**
     * Init store method
     */
    protected function init()
    {
        $this->addToStoreList('top_level', TopLevelListStore::class);
        $this->addToStoreList('active', ActiveListStore::class);
    }
}
