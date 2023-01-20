<?php
/*
 * Dedicated: Candidates
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field               = get_query_var( 'dedicated_team_field' );
$badge               = $field['badge'];
$title               = $field['title'];
$candidates_repeater = $field['candidates_repeater'];
?>
<section class="section section__candidates" id="timeline">
    <div class="container ">
		<?php if ( $badge ): ?>
            <div class="section__candidates-row row justify-content-center">
                <h6 class="section__candidates-row-badge m-0  w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
		<?php endif; ?>
		<?php if ( $title ): ?>
            <div class="section__candidates-row row text-center">
                <h2 class="section__candidates-row-title"><?= $title ?></h2>
            </div>
		<?php endif; ?>
	    <?php if ( $candidates_repeater ):$i = 1; ?>
            <div class="section__candidates-row row text-center">
                <div class="col">
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
							    <?php
							    $i ++;
						    endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
	    <?php endif; ?>
    </div>
</section>