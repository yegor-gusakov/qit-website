<?php
defined( 'ABSPATH' ) || exit;
/**
 * @qit_header_TagHeaderOpen
 */
add_action( 'header_parts', 'qit_header_TagHeaderOpen', 10 );
function qit_header_TagHeaderOpen() {
	$classes = get_body_class();

	?>
    <!-- HEADER -->
    <header class="header">
	<?php
}

/**
 * @qit_header_TagHeaderInner
 */
add_action( 'header_parts', 'qit_header_TagHeaderInner', 20 );
function qit_header_TagHeaderInner() {
	$classes = get_body_class();

	?>

    <!-- container -->
    <div class="container">



    </div>
    <!-- end container -->

	<?php
}

/**
 * @qit_header_TagHeaderClose
 */
add_action( 'header_parts', 'qit_header_TagHeaderClose', 30 );
function qit_header_TagHeaderClose() {
	?>
    </header>
    <!-- END HEADER -->
	<?php
}

