<?php

use Victoria\Utils;

$id          = basename(__FILE__) . $block['id'];
$align_class = $block['align'] ? 'align' . $block['align'] : '';
$class = $block['className'] ?? '';

$class = $class . ' ' . $align_class;

$name = get_field('name');
$photograph = get_field('photograph');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class); ?>">
<div class="container mx-auto">
	<div><?php echo wp_kses_post( $name ); ?></div>
	<div><?php echo wp_get_attachment_image((int)$photograph, 'full'); ?></div>
</div>
</section>
