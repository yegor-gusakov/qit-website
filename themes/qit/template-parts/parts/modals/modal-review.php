<?php
$post = get_post( get_the_id() );
$slug = $post->post_name; ?>
<div class="modal fade bd-example-modal-lg"
     id="<?= $slug ?>-<?= get_the_id() ?>" tabindex="-1"
     aria-labelledby="<?= $slug ?>-Label"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
				<?php the_field( 'video_review' ); ?>
            </div>

        </div>
    </div>
</div>