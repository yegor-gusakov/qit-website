<?php
$info = $args['information'];
$faq = $info['faq'];
?>

<section class="section section__faq">
    <div class="container">
        <div class="section__faq-row row justify-content-center">
            <h6 class="section__faq-row-badge m-0  w-auto text-white text-uppercase">    <?= __( 'faq', 'qit' ) ?></h6>
        </div>
        <div class="section__faq-row row text-center">
            <h2 class="section__faq-row-title"><?= __( 'Frequently asked questions', 'qit' ) ?></h2>
        </div>
        <div class="section__faq-row row justify-content-center m-0">
            <div class="col-12 col-lg-10 mx-auto column">
                <div class="section__faq-row-accordion accordion" id="accordionFAQ">
                    <?php foreach ($faq as $item):get_template_part('template-parts/parts/faq/faq','item',array('id'=>$item));endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>