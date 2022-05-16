<?php
defined( 'ABSPATH' ) || exit;


/**
 * @qit_footer_TagFooterOpen
 */
add_action( 'footer_parts', 'qit_footer_TagFooterOpen', 20 );
function qit_footer_TagFooterOpen() {
	?>
    <!-- FOOTER -->
    <footer class="footer">
    <div class="container">

	<?php
}

;
/**
 * @qit_footer_TagFooterInner
 */
add_action( 'footer_parts', 'qit_footer_TagFooterInner', 30 );
function qit_footer_TagFooterInner() {
}

;
/**
 * @qit_footer_TagFooterClose
 */
add_action( 'footer_parts', 'qit_footer_TagFooterClose', 100 );
function qit_footer_TagFooterClose() {
	?>        </div>

    </footer>
    <!-- END FOOTER -->
	<?php
}

;
