<?php

namespace Lapisense\Admin;

class Menu
{
    public function setup()
    {
        add_action('admin_menu', [$this, 'addMenu']);
    }

    public function addMenu()
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

    public function pageDispatcher()
    {
        echo 'hello world';
    }
}
