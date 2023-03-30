<?php namespace Albus\MusicBox\Components;

use Albus\MusicBox\Classes\Collection\TrackCollection;
use Lovata\Toolbox\Classes\Component\SortingElementList;

/**
 * TrackList Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class TrackList extends SortingElementList
{
    /** @var array */
    protected $arPropertyList = [];

    /**
     * componentDetails
     */
    public function componentDetails()
    {
        return [
            'name' => 'Список треков',
            'description' => 'Вывод на фронт всего списка треков'
        ];
    }

    /**
     * defineProperties for the component
     *
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }


    /**
     * Make element collection
     * @param array $arElementIDList
     *
     * @return TrackCollection
     */
    public function make($arElementIDList = null)
    {
        return TrackCollection::make($arElementIDList);
    }

    /**
     * Method for ajax request with empty response
     * @deprecated
     * @return bool
     */
    public function onAjaxRequest()
    {
        return true;
    }
}
