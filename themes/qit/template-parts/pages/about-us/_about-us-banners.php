<?php
/*
 * About Us: Banners
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field = get_query_var( 'about_us_field' );
get_template_part( 'template-parts/parts/banners/banner', $field['banner'] );
?>


