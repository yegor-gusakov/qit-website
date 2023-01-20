<?php
/*
 * HireDev: Cards
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field = get_query_var( 'hire_dev_field' );
$badge = $field['badge'];
$title = $field['title'];
$cards = $field['cards_repeater'];
?>
<?php

if ( $cards ):?>
    <section class="section section__cards">
        <div class="container">
	        <?php if ( $badge ): ?>
                <div class="section__cards-row row justify-content-center">
                    <h6 class="section__cards-row-badge m-0 w-auto text-white text-uppercase"><?= $badge ?></h6>
                </div>
	        <?php endif; ?>
	        <?php if ( $title ): ?>
                <div class="section__cards-row row text-center">
                    <h2 class="section__cards-row-title"><?= $title ?></h2>
                </div>
	        <?php endif; ?>
            <div class="section__cards-row row">
				<?php foreach ( $cards as $card ): ?>
					<?php $card_title = $card['title'];
					$card_text        = $card['text'];
					?>
                    <div class="col-lg-4  col-md-6 col-sm-6 cards-card">
                        <div class="card border-0 h-100">
                            <div class="row m-0">
                                <div class="card-header border-0 bg-transparent row align-items-center p-0">
                                    <div class="col-lg-9 col-md-9 col-9 card-title">
                                        <h4 class="title m-0"><?= $card_title ?></h4>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 p-0">
                                    <div class="card-body">
                                        <p class="card-text"><?= $card_text ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>