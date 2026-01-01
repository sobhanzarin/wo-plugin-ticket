<?php
defined('ABSPATH') || exit('No Access !!!');
class TK_Assets {
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'frontend_assets']);
        add_action('admin_enqueue_scripts', [$this, 'admin_assets']);
    }
    public function admin_assets() {
        wp_enqueue_script('tk-main', TK_ADMIN_ASSETS, ['jquery'], TK_VER, true );
    }
    public function frontend_assets() {
        wp_enqueue_style('tk-style', TK_BASE_FILE . 'css/style.css', '', TK_VER);
    }
}