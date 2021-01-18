<?php

namespace Lapisense\Admin;

use Lapisense\Admin\Pages\ActivationsPage;
use Lapisense\Admin\Pages\KeysPage;
use Lapisense\Admin\Pages\MainPage;
use Lapisense\Admin\Pages\Page;
use Lapisense\Admin\Pages\SettingsPage;

class Menu
{
    public function setup():void
    {
        add_action('admin_menu', [$this, 'addMenu']);
    }

    public function addMenu():void
    {
        add_menu_page(
            __('Lapisense', 'lapisense'),
            __('Lapisense', 'lapisense'),
            'manage_options',
            'lapisense',
            [$this, 'pageDispatcher'],
            '',
            58
        );

        add_submenu_page(
            'lapisense',
            __('License keys', 'lapisense'),
            __('License keys', 'lapisense'),
            'manage_options',
            'lapisense-keys',
            [$this, 'pageDispatcher']
        );

        add_submenu_page(
            'lapisense',
            __('Activation', 'lapisense'),
            __('Activations', 'lapisense'),
            'manage_options',
            'lapisense-activations',
            [$this, 'pageDispatcher']
        );

        add_submenu_page(
            'lapisense',
            __('Settings', 'lapisense'),
            __('Settings', 'lapisense'),
            'manage_options',
            'lapisense-settings',
            [$this, 'pageDispatcher']
        );
    }

    public function pageDispatcher():void
    {
        $pages = apply_filters('lapisense_admin_menu_pages', [
            [
                'slug' => 'lapisense',
                'class' => MainPage::class,
            ],
            [
                'slug' => 'lapisense-keys',
                'class' => KeysPage::class,
            ],
            [
                'slug' => 'lapisense-activations',
                'class' => ActivationsPage::class,
            ],
            [
                'slug' => 'lapisense-settings',
                'class' => SettingsPage::class,
            ]
        ]);

        $currentPage = filter_input(INPUT_GET, 'page');

        foreach ($pages as $page) {
            if ($currentPage === $page['slug']) {
                /** @var Page $pageHandler */
                $pageHandler = new $page['class']();
                $pageHandler->setup();
                $pageHandler->output();
            }
        }
    }
}
