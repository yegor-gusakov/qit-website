<?php

$id = $args['id'];
//print_r($id);
$arrow = get_template_directory_uri().'/assets/userfiles/icons/Arrow.svg';
?>
<div class="accordion-item">
    <h2 class="accordion-header" id="<?= get_post_field( 'post_name', $id)?>">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-<?= get_post_field( 'post_name', $id)?>" aria-expanded="false" aria-controls="<?= get_post_field( 'post_name', $id)?>"><?= get_the_title($id)?>
            <?= file_get_contents($arrow)?>
        </button>
    </h2>
    <div id="faq-<?= get_post_field( 'post_name', $id)?>" class="accordion-collapse collapse" aria-labelledby="<?= get_post_field( 'post_name', $id)?>" data-bs-parent="#accordionFAQ">
        <div class="accordion-body">
	        <?= get_post_field('post_content', $id);?>
        </div>
    </div>
</div>