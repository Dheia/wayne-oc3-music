<?php namespace Albus\MusicBox\Components;

use Cms\Classes\ComponentBase;

use Albus\MusicBox\Classes\Collection\ArtistCollection;

/**
 * ArtistList Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class ArtistList extends ComponentBase
{
    /**
     * componentDetails
     */
    public function componentDetails()
    {
        return [
            'name' => 'Список исполнителей',
            'description' => 'No description provided yet...'
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
     * @return ArtistCollection
     */
    public function make($arElementIDList = null)
    {
        return ArtistCollection::make($arElementIDList);
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
