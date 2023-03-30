<?php namespace Albus\MusicBox\Classes\Item;

use Cms\Classes\Page as CmsPage;

use Lovata\Toolbox\Classes\Item\ElementItem;
use Lovata\Toolbox\Classes\Helper\PageHelper;

use Albus\MusicBox\Classes\Collection\GenreCollection;
use Albus\MusicBox\Models\Genre;

/**
 * Class GenreItem
 * @package Albus\MusicBox\Classes\Item
 *
 * @property integer $id
 * @property int $parent_id
 * @property int $nest_left
 * @property int $nest_right
 * @property int $nest_depth
 * @property array $children_id_list
 * @property Genre $parent
 * @property \October\Rain\Database\Collection|Genre[] $children
 * @property \October\Rain\Argon\Argon $created_at
 * @property \October\Rain\Argon\Argon $updated_at
 */
class GenreItem extends ElementItem
{
    const MODEL_CLASS = Genre::class;

    /** @var Genre */
    protected $obElement = null;
    /** @var array */
    public $arRelationList = [
        'parent'   => [
            'class' => GenreItem::class,
            'field' => 'parent_id',
        ],
        'children' => [
            'class' => GenreCollection::class,
            'field' => 'children_id_list',
        ],
    ];

    /**
     * Returns URL of a brand page.
     * @param string $sPageCode
     * @return string
     */
    public function getPageUrl($sPageCode = 'genre')
    {
        //Get URL params
        $arParamList = $this->getPageParamList($sPageCode);

        //Generate page URL
        $sURL = CmsPage::url($sPageCode, $arParamList);

        return $sURL;
    }

    /**
     * Get URL param list by page code
     * @param string $sPageCode
     * @return array
     */
    public function getPageParamList($sPageCode) : array
    {
        $arPageParamList = [];

        //Get URL params for page
        $arParamList = PageHelper::instance()->getUrlParamList($sPageCode, 'GenrePage');
        if (!empty($arParamList)) {
            $sPageParam = array_shift($arParamList);
            $arPageParamList[$sPageParam] = $this->slug;
        }

        return $arPageParamList;
    }

    /**
     * Set element data from model object
     * @return array
     */
    protected function getElementData()
    {
        $arResult = [
            'nest_depth' => $this->obElement->getDepth(),
        ];

        $arResult['children_id_list'] = $this->obElement->children()
            ->active()
            ->orderBy('nest_left', 'asc')
            ->pluck('id')->all();

        return $arResult;
    }
}
