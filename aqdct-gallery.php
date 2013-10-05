<?php
/**
 * Plugin Name: aqdct-gallery
 * Plugin URI: TBD
 * Description: An image-gallery management plugin
 * Version: 0.1
 * Author: prsolans
 * Author URI: https://github.com/prsolans
 * License: GPL2
 */

/*  Copyright 2013  Paul R. Solans  (email : paul@aqdct.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function aqgallery_init(){

   global $wpdb;
    $table = $wpdb->prefix."aqdct_gallery";
    $structure = "CREATE TABLE $table (
        id INT(9) NOT NULL AUTO_INCREMENT,
        name VARCHAR(80) NOT NULL,
        description VARCHAR(240),
        UNIQUE KEY id (id)
    );";
    $wpdb->query($structure);
 
    // Populate table
    $wpdb->query("INSERT INTO $table(name, description)
        VALUES('Sample Gallery', 'This is a sample gallery in the aqdct-gallery WP plugin')");
}

add_action('activate_aqdct-gallery/aqdct-gallery.php', 'aqgallery_init');

function aqgallery_menu()
{
    global $wpdb;
    include 'header.php';
    include 'aqdct-admin.php';
}


function aqgallery_edit()
{
    global $wpdb;
    include 'header.php';
    include 'edit-gallery.php';
}
 
function aqgallery_admin_actions()
{
    add_menu_page("AQDCT Gallery", "Image Galleries", "administrator", "aqgallery", "aqgallery_menu", "", 5);
    add_submenu_page("aqgallery", "Edit", "Edit Image Gallery", "administrator", "aqgallery_edit", "aqgallery_edit");
}
 
add_action('admin_menu', 'aqgallery_admin_actions');



