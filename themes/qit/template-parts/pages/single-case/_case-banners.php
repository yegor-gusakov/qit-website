<?php
/*
 * Single case: Banners
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field = get_query_var( 'case_single_field' );
$info = $field['info'];
get_template_part( 'template-parts/parts/banners/single-case/case', $field['banner'],$info);
?>


