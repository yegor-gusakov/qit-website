<?php
/*
 * Home: Candidates
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field               = get_query_var( 'referral_program_field' );
$candidates_repeater = $field['candidates_repeater'];
?>
<section class="section section__candidates" id="timeline">
    <div class="container ">
	    <?php if ( $candidates_repeater ):$i = 1; ?>
            <div class="section__candidates-row row text-center justify-content-center">
                <div class="col-12 col-lg-7">
                    <div class="timeline">
                        <ul>
						    <?php foreach ( $candidates_repeater as $candidate ): ?>
							    <?php $candidate_title = $candidate['title'];$candidate_text  = $candidate['text']; ?>
                                <li data-candidate-num="<?= $i ?>">
                                    <div class="content">
                                        <h3 class="timeline-title"><?= $candidate_title ?></h3>
                                        <p class="timeline-text"><?= $candidate_text ?></p>
                                    </div>
                                </li>
							    <?php $i ++;endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
	    <?php endif; ?>
    </div>
</section>