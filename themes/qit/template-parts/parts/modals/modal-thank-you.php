<?php
$email_send   = get_template_directory_uri()
                . '/assets/userfiles/icons/email-send.svg';
$burger_close = get_template_directory_uri()
                . '/assets/userfiles/icons/closemark.svg';

?>
<div class="modal modal__thank-you fade" id="thank-you" tabindex="-1" aria-labelledby="thank-youLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header border-0 p-0">
                <button type="button" class="modal-close border-0 bg-transparent p-0" data-bs-dismiss="modal" aria-label="Close"><?= file_get_contents( $burger_close ) ?></button>
            </div>
            <div class="modal-body p-0">
                <div class="container-fluid p-0">
                    <div class="row m-0">
                        <div class="col">
							<?= file_get_contents( $email_send ) ?>
                            <h4><?=__('This message was sent','qit')?></h4>
                            <p><?= __('Thank you for your interest. We’ll be in contact with you ASAP','qit')?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
