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

wp_register_script(
    'jjp-map-scripts',
    plugins_url('/js/scripts.js', __FILE__),
    array('jquery')
);
wp_enqueue_script('jjp-map-scripts');
wp_enqueue_script('googlemaps', '//maps.googleapis.com/maps/api/js', null, null);

function jjp_gmap_show_map($args, $content)
{

    return '<div id="map" style="height: 300px;">map</div>';
}

add_shortcode('jjp-map', 'jjp_gmap_show_map');