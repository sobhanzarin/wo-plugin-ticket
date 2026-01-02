<?php
/**
 * Plugin Name: افزونه تیکت پشتیبانی
 * Plugin URI:
 * Description: افزونه تیکت پشتیبانی فروشگاه
 * Version: 1.0.0
 * Requires at least: 6.0
 * Author: sobhan zarin
 * Author URI:
 * License:
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: my-plugin
 */

defined('ABSPATH') || exit('No Access !!!');

require 'inc/tk-assets.php';
require 'inc/tk-db.php';
require 'inc/admin/abstract/base-menu.php';
require 'inc/admin/tk-menu.php';
class Core
{
    private static $_instance = null;
    const MINIM_VERSION_PHP = '7.4';
    public static function instance()
    {
        if(is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function __construct()
    {
        if (version_compare(PHP_VERSION, self::MINIM_VERSION_PHP, '<')) {
            add_action('admin_notices', [$this, 'admin_php_notices']);
            return;
        }
        $this->constants();
        $this->init();
    }
    public function constants()
    {
        if(!function_exists('get_plugin_data')){
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        define('TK_BASE_FILE', __FILE__);
        define('TK_PATH', trailingslashit(plugin_dir_path(TK_BASE_FILE)));
        define('TK_URL', trailingslashit(plugin_dir_url(TK_BASE_FILE)));
        define('TK_ADMIN_ASSETS', trailingslashit(TK_URL.'assets/admin'));
        define('TK_FRONT_ASSETS', trailingslashit(TK_URL.'assets/front'));

        $plugin_data = get_plugin_data(TK_BASE_FILE);
        define('TK_VER', $plugin_data['Version']);
    }
    public function init()
    {
        register_activation_hook(TK_BASE_FILE, [$this, 'active']);
        register_deactivation_hook(TK_BASE_FILE, [$this, 'deactivate']);
        if (is_admin()) {
            new TK_Menu();
        }

        new TK_Assets();
    }

    public function active()
    {
        TK_Db::create_table();

    }
    public function deactivate() {}
    public function admin_php_notices()
    { ?>
        <div class="notice notice-warning">
            <p> افزونه تیکت پشتیبانی برای اجرای صحیح نیاز به نسخه 7.4 به بالا دارد، لطفا نسخه php هاست خود را ارتقا دهید.</p>
        </div>
    <?php }
}
Core::instance();