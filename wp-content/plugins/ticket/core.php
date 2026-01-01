<?php
/**
 * Plugin Name: افزونه تیکت پشتیبانی
 * Plugin URI:
 * Description: افزونه تیکت پشتیبانی فروشگاه
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: sobhan zarin
 * Author URI:
 * License:
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: my-plugin
 */


defined('ABSPATH') || exit('No Access !!!');

require 'inc/tk-assets.php';

class Core
{
    private static $_instance = null;
    public static function instance()
    {
        if(is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function __construct()
    {
        $this->constanst();
        $this->init();
    }
    public function init()
    {
        register_activation_hook(TK_BASE_FILE, [$this, 'active']);
        register_deactivation_hook(TK_BASE_FILE, [$this, 'deactive']);

        new TK_Assets();
    }
    public function constanst()
    {
        define('TK_BASE_FILE', __FILE__);
        define('TK_PATH', trailingslashit(plugin_dir_path(TK_BASE_FILE)));
        define('TK_URL', trailingslashit(plugin_dir_url(TK_BASE_FILE)));
        define('TK_ADMIN_ASSETS', TK_BASE_FILE . 'assets/admin');
        define('TK_FRONT_ASSETS', TK_BASE_FILE . 'assets/front');

        $plugin_data = get_plugin_data(TK_BASE_FILE);
        define('TK_VER', $plugin_data['Version']);
    }
    public function active()
    {

    }
    public function deactive()
    {

    }
}
Core::instance();