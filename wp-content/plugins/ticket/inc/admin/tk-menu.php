<?php
defined('ABSPATH') || exit('No Access !!!');
class TK_Menu extends Base_Menu{
    public function __construct(){
        $this->page_title = 'تیکت پشتیبانی';
        $this->menu_title = 'تیکت پشتیبانی';
        $this->menu_slug= 'ticket_slug';
        $this->icon = TK_ADMIN_ASSETS . 'img/icon.png';

        parent::__construct();
    }
    public function page()
    {
        echo 'منو افزونه تیکت';
    }
}
