<?php 
if (!$media) {
    echo '<p>Set your logo on company info page, thank you.</p>';
    return;
}
$image_width = 600-$options['block_padding_left']-$options['block_padding_right'];
if ($options['logo_width']) {
    $image_width = min($options['logo_width'], $image_width);
}
$media->set_width($image_width);
?>
<a  class="test" href="<?php echo esc_url($media->link) ?>" target="_blank"><img src="https://staging3.qit.software/wp-content/uploads/2023/01/logo.png" width="100" height="<?php echo $media->height ?>" border="0" alt="<?php echo esc_attr($media->alt) ?>"></a>
