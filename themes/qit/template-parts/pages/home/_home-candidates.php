<?php
/*
 * Home: Coop Model
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field               = get_query_var( 'home_field' );
$badge               = $field['badge'];
$title               = $field['title'];
$candidates_repeater = $field['candidates_repeater'];

?>

<section class="section__candidates section " id="timeline">
    <div class="container ">
        <div class="section__candidates-row row ">
            <div class="section__candidates-row row justify-content-center"><h6
                        class="section__candidates-row-badge  w-auto text-white text-uppercase"><?= $badge ?></h6>
            </div>
            <div class="section__candidates-row row text-center">
                <h2 class="section__candidates-row-title"><?= $title ?></h2>
            </div>
			<?php if ( $candidates_repeater ):
				$i = 1;
				?>
                <div class="timeline">
                    <ul>

						<?php foreach ( $candidates_repeater as $candidate ): ?>
							<?php
							$candidate_title = $candidate['title'];
							$candidate_text  = $candidate['text'];
							?>
                            <li data-candidate-num="<?=$i?>">
                                <div class="content">
                                    <h3><?= $candidate_title ?></h3>
                                    <p><?= $candidate_text ?></p>
                                </div>

                            </li>
							<?php
							$i ++;
						endforeach; ?>

                    </ul>
                </div>

			<?php endif; ?>


        </div>
</section>