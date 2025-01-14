<?php namespace Dmrch\Content;

use Backend;
use Backend\Models\UserRole;
use System\Classes\PluginBase;

/**
 * Content Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Content',
            'description' => 'No description provided yet...',
            'author'      => 'Dmrch',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Dmrch\Content\Components\Text' => 'texts',
            'Dmrch\Content\Components\Page' => 'pages',
            'Dmrch\Content\Components\Lps'  => 'lps'
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'dmrch.content.some_permission' => [
                'tab' => 'Content',
                'label' => 'Some permission',
                'roles' => [UserRole::CODE_DEVELOPER, UserRole::CODE_PUBLISHER],
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'text' => [
                'label'       => 'Content',
                'url'         => Backend::url('dmrch/content/text/update/1'),
                'icon'        => 'icon-leaf',
                'permissions' => ['dmrch.content.*'],
                'order'       => 500,
                'sideMenu' => [
                    'text' => [
                        'label'       => 'Content',
                        'url'         => Backend::url('dmrch/content/text/update/1'),
                        'icon'        => 'icon-leaf',
                        'permissions' => ['dmrch.content.*'],
                    ], 
                    'page' => [
                        'label'       => 'Paginas',
                        'url'         => Backend::url('dmrch/content/page'),
                        'icon'        => 'icon-file',
                        'permissions' => ['dmrch.content.*'],
                    ],
                    'lps' => [
                        'label'       => 'LPs',
                        'url'         => Backend::url('dmrch/content/lps'),
                        'icon'        => 'icon-file',
                        'permissions' => ['dmrch.content.*'],
                    ]
                ]
            ],
        ];
    }
}
