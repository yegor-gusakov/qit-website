<?php
$post = get_post(get_the_id());
$slug = $post->post_name;?>
<div class="modal fade"
     id="<?= $slug ?>-<?= get_the_id() ?>" tabindex="-1"
     aria-labelledby="<?= $slug ?>-Label"
     aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"
				    id="exampleModalLabel"><?= get_the_id() ?></h5>
				<button type="button" class="btn-close"
				        data-bs-dismiss="modal"
				        aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php the_field('video_review'); ?>
			</div>

		</div>
	</div>
</div>