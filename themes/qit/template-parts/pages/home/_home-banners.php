<?php
/*
 * Home: Banners
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field = get_query_var( 'home_field' );
get_template_part( 'template-parts/parts/banners/banner', $field['banner'] );
?>


