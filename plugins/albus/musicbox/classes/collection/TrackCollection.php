<?php namespace Albus\MusicBox\Classes\Collection;

use Lovata\Toolbox\Classes\Collection\ElementCollection;
use Albus\MusicBox\Classes\Item\TrackItem;
use Albus\MusicBox\Classes\Store\TrackListStore;

/**
 * Class TrackCollection
 * @package Albus\MusicBox\Classes\Collection
 */
class TrackCollection extends ElementCollection
{
    const ITEM_CLASS = TrackItem::class;


    /**
     * Apply filter by active field
     * @return $this
     */
    public function active()
    {
        $arResultIDList = TrackListStore::instance()->active->get();

        return $this->intersect($arResultIDList);
    }
}
