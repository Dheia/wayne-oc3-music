<?php namespace Albus\MusicBox\Classes\Event\Track;

use Lovata\Toolbox\Classes\Event\ModelHandler;
use Albus\MusicBox\Models\Track;
use Albus\MusicBox\Classes\Item\TrackItem;
use Albus\MusicBox\Classes\Store\TrackListStore;

/**
 * Class TrackModelHandler
 * @package Albus\MusicBox\Classes\Event\Track
 */
class TrackModelHandler extends ModelHandler
{
    /** @var Track */
    protected $obElement;

    /**
     * Add listeners
     * @param \Illuminate\Events\Dispatcher $obEvent
     */
    public function subscribe($obEvent)
    {
        TrackItem::extend(
            function ($obElement) {
                $this->extendItem($obElement);
            }
        );
    }

    /**
     * @param UserItem $obItem
     */
    protected function extendItem($obItem)
    {
        $obItem->addDynamicMethod(
            'getServiceAttribute',
            function ($obItem) {
                return 2;
            }
        );
        $obItem->addDynamicMethod(
            'getFullNameAttribute',
            function ($obItem) {
                return 2;
            }
        );
    }


    /**
     * Get model class name
     * @return string
     */
    protected function getModelClass()
    {
        return Track::class;
    }

    /**
     * Get item class name
     * @return string
     */
    protected function getItemClass()
    {
        return TrackItem::class;
    }
    /**
     * After create event handler
     */
    protected function afterCreate()
    {
        parent::afterCreate();

        TrackListStore::instance()->active->clear();
    }

    /**
     * After save event handler
     */
    protected function afterSave()
    {
        parent::afterSave();
        TrackListStore::instance()->active->clear();
    }

    /**
     * After delete event handler
     */
    protected function afterDelete()
    {
        parent::afterDelete();
    }

    
}
