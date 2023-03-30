<?php namespace Albus\MusicBox\Controllers;


use BackendMenu;
use Telegram\Bot\Api;
use Backend\Classes\Controller;

/**
 * Tracks Backend Controller
 *
 * @link https://docs.octobercms.com/3.x/extend/system/controllers.html
 */
class Tracks extends Controller
{
    // public $bodyClass = 'compact-container';

    // public $bodyClass = 'compact-container breadcrumb-fancy';


    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
        \Backend\Behaviors\RelationController::class
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    /**
     * @var string RelationConfig File
     */
    public $relationConfig = 'config_relation.yaml';


    /**
     * @var array required permissions
     */
    public $requiredPermissions = ['albus.musicbox.tracks'];

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Albus.MusicBox', 'musicbox', 'tracks');
    }
}
