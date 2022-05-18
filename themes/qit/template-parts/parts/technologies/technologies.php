<?php
$thumbnail = get_the_post_thumbnail_url( $args['id'] );
$title     = get_the_title( $args['id'] );
?>
<div class="col-lg-2 col-sm-3 col-sm-6 col-6 mb-5 technology-col">
    <div class="card mb-3 h-100 justify-content-between">
        <div class="card-img ">

            <img src="<?= $thumbnail ?>"
                 class="card-img-top mx-auto my-0"
                 alt="<?= $title ?>"></div>

        <div class="card-body">
            <h5 class="card-title text-center m-0"><?= $title ?></h5>
        </div>
    </div>
</div>