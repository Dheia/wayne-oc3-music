<?php namespace Albus\MusicBox\Components;

use Cms\Classes\ComponentBase;
use Albus\MusicBox\Classes\Collection\GenreCollection;

/**
 * GenreList Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class GenreList extends ComponentBase
{
    /**
     * componentDetails
     */
    public function componentDetails()
    {
        return [
            'name' => 'GenreList Component',
            'description' => 'No description provided yet...'
        ];
    }

    /**
     * Make element collection
     * @param array $arElementIDList
     *
     * @return GenreCollection
     */
    public function make($arElementIDList = null)
    {
        return GenreCollection::make($arElementIDList);
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
