<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package qit
 */

?>
<?php
//get_template_part( 'template-parts/parts/modals/modal', 'quote' );

?>
</main>
<!-- END CONTENT -->
<?php
/**
 * footer_parts hook
 *
 * @hooked qit_footer_TagFooterForm - 10
 * @hooked qit_footer_TagFooterOpen - 20
 * @hooked qit_footer_TagFooterInner - 30
 * @hooked qit_footer_TagFooterClose - 100
 *
 */
do_action( 'footer_parts' );
?>
<?php
if(is_page([4296])):
	?>
    <div id="bottom-row" class="bottom-row">
        <div id="price-notice" class="price-notice">
            <div class="price-notice-container container h-100">
                <button type="button"
                        class="price-notice-close border-0 bg-transparent p-0 qit-software-icon-closemark"
                        aria-label="Close"></button>

                <div class="price-notice-container-row row h-100">
                    <div class="price-notice-container-left col-lg-7">
                        <h5 class="title-selected">Selected:</h5>
                        <div class="modal-subtotal-lists">
                            <ul>
                                <li class="modal-subtotal__expert-list modal-subtotal-list d-none"></li>
                                <li class="modal-subtotal__level-list modal-subtotal-list d-none"></li>

                                <li class="modal-subtotal__duration-list modal-subtotal-list">
                                    <p>1 month</p></li>
                            </ul>
                        </div></div>
                    <div class="price-notice-container-right alert col-lg-5 d-block">
                        <p>Please select the missing steps to know a price </p>
                    </div>
                    <div class="price-notice-container-right price col-lg-5 d-none">
                        <div class="row">
                            <div class="col-rating"><h4 class="price">$25</h4>
                                <span>/ hour</span>
                            </div>
                            <div class="col-divider"></div>
                            <div class="col-duration"><h4
                                        class="price endprice">
                                    $4200</h4><span
                                        class="duration">/ 1 month</span></div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
endif;
?>
<?php wp_footer(); ?>

<?php /**
 * <div class="div-rekki" style="background: black;width: 5px;height: 20px;position: fixed; left:20%" ></div>
 */ ?>
<?php
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
</html>
