<?php

/**
 * Plugin Name: JJP - Map
 * Plugin URI:
 * Description: Google Maps Plugin
 * Version: 1.0
 * Author: JacekJP
 * Author URI:
 * License: GPL2
 *
 *  JJP - Map is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * JJP - Map is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with JJP - Map. If not, see {License URI}.
 */
class JJPMapView
{

    function __construct()
    {

        $this->register_scripts();
    }

    function jjp_gmap_show_map()
    {
        $width = get_option('jjp-map-width') ?: "100%";
        $height = get_option('jjp-map-height') ?:  "400px";

        return "<div id='map' style='width: $width; height: $height'>map</div>";
    }

    function register_scripts()
    {
        wp_register_script(
            'jjp-map-scripts',
            plugins_url('/js/scripts.js', __FILE__),
            array('jquery')
        );

        $gMapApiKey = get_option('jjp-map-api-key');

        if ($gMapApiKey) {
            wp_enqueue_script('googlemaps', '//maps.googleapis.com/maps/api/js?key=' . $gMapApiKey, null, null);
        } else {
            wp_enqueue_script('googlemaps', '//maps.googleapis.com/maps/api/js', null, null);
        }

        wp_enqueue_script('jjp-map-scripts');
    }

}

add_shortcode('jjp-map', [new JJPMapView(), 'jjp_gmap_show_map']);

class JJPMapAdmin
{

    private static $plugin_id = 'jjp-map';
    private $user_capability = 'manage_options';

    function __construct()
    {

        add_action('admin_menu', array($this, 'createAdminMenu'));
    }

    function createAdminMenu()
    {
        add_menu_page(
            'JJP - Map',
            'Map',
            $this->user_capability,
            static::$plugin_id,
            array($this, 'printAdminPage')
        );
    }

    function printAdminPage()
    {

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name'])){
            if ($_POST['form_name'] == 'api-key' && check_admin_referer('jjp-map-api-key-token')) {
                $apiKey = sanitize_text_field($_POST['jjp-map-api-key']);
                update_option('jjp-map-api-key', $apiKey);
            }

            if ($_POST['form_name'] == 'settings' && check_admin_referer('jjp-map-settings-token')) {
                $width = sanitize_text_field($_POST['jjp-map-width']);
                update_option('jjp-map-width', $width);
                $height = sanitize_text_field($_POST['jjp-map-height']);
                update_option('jjp-map-height', $height);
            }

        }


        require_once plugin_dir_path(__FILE__) . 'index.php';
    }
}

$JJPMapAdmin = new JJPMapAdmin();