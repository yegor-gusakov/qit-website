<?php

$group = $args['information']['be_part_information'];

//$title = $group['title'];
//$button  = $group['button'];

$title= get_field('be_part_text','qit_banners');
$button = get_field('be_part_button','qit_banners');
$bg_image= get_field('be_part_background','qit_banners');
?>
<section class="section section__banner-want-to-be-part" >
    <div class="container">
        <div class="section__banner-want-to-be-part-row row align-items-sm-center"   style="background-image: url(<?=$bg_image?>)">
            <div class="col-lg-7 ">
				<?php if ( $title ): ?>
                    <div class="section__banner-want-to-be-part-row">
                        <h3 class="section__banner-want-to-be-part-row-title"><?= $title ?></h3>
                    </div>
				<?php endif; ?>
                <a href="<?=$button['url']?>" target="_blank" class="button btn" ><?= $button['title'] ?></a>
            </div>
        </div>
    </div>
</section>
