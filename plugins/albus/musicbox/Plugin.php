<?php namespace Albus\MusicBox;

use Backend;
use System\Classes\PluginBase;

use Albus\MusicBox\Classes\Boot;
/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{

    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'MusicBox',
            'description' => 'No description provided yet...',
            'author' => 'Albus',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        //
    }

    /**
     * boot method, called right before the request route.
     */
    use Boot;

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return [
            'Albus\MusicBox\Components\TrackList' => 'TrackList',
            'Albus\MusicBox\Components\TrackPage' => 'TrackPage',
            'Albus\MusicBox\Components\ArtistList' => 'ArtistList',
            'Albus\MusicBox\Components\GenreList' => 'GenreList',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return [
            'albus.musicbox.main' => [
                'tab' => 'MusicBox',
                'label' => 'Главные права'
            ],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return [
            'musicbox' => [
                'label' => 'MusicBox',
                'url' => Backend::url('albus/musicbox/tracks'),
                'icon' => 'icon-leaf',
                'permissions' => ['albus.musicbox.main'],
                'order' => 500,
                'sideMenu' => [
                    'tracks' => [
                        'label' => 'Треки',
                        'icon' => 'icon-music',
                        'url' => Backend::url('albus/musicbox/tracks'),
                        'permissions' => ['albus.musicbox.*'],
                    ],
                    'artists' => [
                        'label' => 'Исполнители',
                        'icon' => 'icon-user-circle-o',
                        'url' => Backend::url('albus/musicbox/artists'),
                        'permissions' => ['albus.musicbox.*'],
                    ],
                    'albums' => [
                        'label'       => 'Альбомы',
                        'url'         => Backend::url('albus/musicbox/albums'),
                        'icon'        => 'icon-book',
                        'permissions' => ['albus.musicbox.*'],
                    ],
                    'genres' => [
                        'label'       => 'Жанры',
                        'url'         => Backend::url('albus/musicbox/genres'),
                        'icon'        => 'icon-database',
                        'permissions' => ['albus.musicbox.*'],
                    ],
                    'msses' => [
                        'label'       => 'Сервисы',
                        'url'         => Backend::url('albus/musicbox/msses'),
                        'icon'        => 'icon-sitemap',
                        'permissions' => ['albus.musicbox.*'],
                    ],
                ]
            ],
        ];
    }
}
