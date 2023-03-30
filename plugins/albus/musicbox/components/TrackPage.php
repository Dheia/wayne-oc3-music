<?php namespace Albus\MusicBox\Components;

use Event;

use Lovata\Toolbox\Classes\Component\ElementPage;
use Albus\MusicBox\Classes\Item\TrackItem;

use Albus\MusicBox\Models\Track;

/**
 * TrackPage Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class TrackPage extends ElementPage
{

    protected $bNeedSmartURLCheck = true;

    /** @var \Albus\MusicBox\Models\Track */
    protected $obElement;

    /** @var \Albus\MusicBox\Classes\Item\TrackItem */
    protected $obElementItem;

    /**
     * componentDetails
     */
    public function componentDetails()
    {
        return [
            'name' => 'TrackPage Component',
            'description' => 'No description provided yet...'
        ];
    }

    /**
     * Get element object
     * @param string $sElementSlug
     * @return Product
     */
    protected function getElementObject($sElementSlug)
    {
        if (empty($sElementSlug)) {
            return null;
        }

        $obElement = Track::whereId($sElementSlug)->first();
        if (!empty($obElement)) {
            Event::fire('shopaholic.product.open', [$obElement]);
        }

        return $obElement;
    }

    /**
     * Make new element item
     * @param int     $iElementID
     * @param Product $obElement
     * @return ProductItem
     */
    protected function makeItem($iElementID, $obElement)
    {
        return TrackItem::make($iElementID, $obElement);
    }
}
