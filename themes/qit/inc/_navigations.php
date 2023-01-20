<?php
defined( 'ABSPATH' ) || exit;
/**
* Navigations
 * @register_nav_menus
*/

register_nav_menus( array(
    'footer'            => __( 'Footer Menu', 'qit' ),
    'main_menu'         => __( 'Main Site Menu', 'qit' ),
    'main_mobile_menu'         => __( 'Mobile Menu', 'qit' ),
) );
