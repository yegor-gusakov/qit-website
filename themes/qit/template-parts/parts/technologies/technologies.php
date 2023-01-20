<?php
$thumbnail = get_the_post_thumbnail_url( $args['id'] );
$title     = get_the_title( $args['id'] );
$link_to_page = get_field('hire_page',$args['id']);
?>
<div class="col-lg-2 col-sm-3 col-6 technology-col <?= strtolower($title) ?>">
    <?= (($link_to_page !=null)?'<a href="'.$link_to_page.'">':'')?>
    <div class="card h-100 ">
        <div class="card-img ">
            <img src="<?= $thumbnail ?>" class="card-img-top mx-auto my-0" alt="<?= $title ?>"></div>
        <div class="card-body">
            <h5 class="card-title text-center m-0"><?= $title ?></h5>
        </div>
    </div>
	<?= (($link_to_page !=null)?'</a>':'')?>

</div>