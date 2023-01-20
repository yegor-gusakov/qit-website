<?php
$contact_title    = get_field('modal_contact_title','theme_settings');
$contact_form     = get_field('modal_window_form','theme_settings');
$modal_img = get_field( 'modal_window_form_image', 'theme_settings' );
$burger_close= get_template_directory_uri().'/assets/userfiles/icons/closemark.svg';

?>
<div class="modal modal__quote fade" id="globalModalQuote" tabindex="-1" aria-labelledby="globalModalQuoteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header border-0 p-0">
                <button type="button" class="modal-close border-0 bg-transparent" data-bs-dismiss="modal" aria-label="Close"><?=file_get_contents($burger_close)?></button>
            </div>
            <div class="modal-body p-lg-0">
                <div class="container-fluid h-100 p-lg-0">
                    <div class="row h-100 w-100 m-0">
                        <div class="modal-form d-lg-flex col-lg-6 p-sm-5 justify-content-center flex-column">
                            <h4 class="modal-form-heading"><?= $contact_title ?></h4>
	                        <?= do_shortcode( $contact_form ) ?>
                        </div>
                        <div class="modal-img p-lg-0 d-none d-sm-none d-lg-block col-12 col-sm-12 col-lg-6"><img class="h-100" src="<?= $modal_img['url'] ?>" alt="<?= $modal_img['alt'] ?>"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
