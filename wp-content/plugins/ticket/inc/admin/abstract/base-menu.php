<?php
defined('ABSPATH') || exit('No Access !!!');
abstract class Base_Menu{
    protected $page_title;
    protected $menu_title;
    protected $capability;
    protected $menu_slug;
    protected $icon;

    public function __construct()
    {
        $this->capability='manage_options';
        add_action('admin_menu', [$this, 'add_menu']);
    }
    public function add_menu()
    {
        add_menu_page(
            $this->page_title,
            $this->menu_title,
            $this->capability,
            $this->menu_slug,
            [$this, 'page'],
            $this->icon
        );
    }
    abstract public function page();
}