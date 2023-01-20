<?php
$post = get_post( get_the_id() );
$slug = $post->post_name;

$video = get_field('video_review',get_the_ID());
//print_r($video);
?>
<div class="modal modal-videoReview  fade bd-example-modal-lg" id="<?= $slug ?>-<?= get_the_id() ?>" tabindex="-1" aria-labelledby="<?= $slug ?>-Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0">
	            <?= $video ?>
            </div>
        </div>
    </div>
</div>