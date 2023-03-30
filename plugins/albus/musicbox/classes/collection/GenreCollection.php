<?php namespace Albus\MusicBox\Classes\Collection;

use Lovata\Toolbox\Classes\Collection\ElementCollection;
use Albus\MusicBox\Classes\Item\GenreItem;
use Albus\MusicBox\Classes\Store\GenreListStore;

/**
 * Class GenreCollection
 * @package Albus\MusicBox\Classes\Collection
 */
class GenreCollection extends ElementCollection
{
    const ITEM_CLASS = GenreItem::class;

    /**
     * Sort list
     * @return $this
     */
    public function tree()
    {
        $arResultIDList = GenreListStore::instance()->top_level->get();

        return $this->applySorting($arResultIDList);
    }

    /**
     * Apply filter by active field
     * @return $this
     */
    public function active()
    {
        $arResultIDList = GenreListStore::instance()->active->get();

        return $this->intersect($arResultIDList);
    }
}
