<?php namespace Albus\MusicBox\Classes\Collection;

use Lovata\Toolbox\Classes\Collection\ElementCollection;
use Albus\MusicBox\Classes\Item\ArtistItem;
use Albus\MusicBox\Classes\Store\ArtistListStore;

/**
 * Class ArtistCollection
 * @package Albus\MusicBox\Classes\Collection
 */
class ArtistCollection extends ElementCollection
{
    const ITEM_CLASS = ArtistItem::class;

    /**
     * Apply filter by active field
     * @return $this
     */
    public function active()
    {
        $arResultIDList = ArtistListStore::instance()->active->get();

        return $this->intersect($arResultIDList);
    }
}
