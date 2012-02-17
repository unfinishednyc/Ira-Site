<?php
/*
Template Name: Gallery Templates
 */
?>

<?php get_header(); ?>


<div id="galleria">

	<?php if (have_posts()) :while (have_posts()) : the_post();?>

	
	<?php while(the_repeater_field('gallery_images_A')): ?>
		<a href="<?php the_sub_field('gallery_image'); ?>">
	  	<img alt="<?php if(the_sub_field('gallery_image_caption')) { the_sub_field('gallery_image_caption'); } else { the_title(); } ?>" src="<?php the_sub_field('gallery_image_thumb'); ?>">
		</a>	
	<?php endwhile; ?>
	              
	<?php while(the_repeater_field('gallery_images_B')): ?>
		<a href="<?php the_sub_field('gallery_image'); ?>">
	  	<img alt="<?php if(the_sub_field('gallery_image_caption')) { the_sub_field('gallery_image_caption'); } else { the_title(); } ?>" src="<?php the_sub_field('gallery_image_thumb'); ?>">
		</a>	
	<?php endwhile; ?>
	              
	<?php while(the_repeater_field('gallery_images_C')): ?>
		<a href="<?php the_sub_field('gallery_image'); ?>">
	  	<img alt="<?php if(the_sub_field('gallery_image_caption')) { the_sub_field('gallery_image_caption'); } else { the_title(); } ?>" src="<?php the_sub_field('gallery_image_thumb'); ?>">
		</a>	
	<?php endwhile; ?>
	              
	<?php while(the_repeater_field('gallery_images_D')): ?>
		<a href="<?php the_sub_field('gallery_image'); ?>">
	  	<img alt="<?php if(the_sub_field('gallery_image_caption')) { the_sub_field('gallery_image_caption'); } else { the_title(); } ?>" src="<?php the_sub_field('gallery_image_thumb'); ?>">
		</a>	
	<?php endwhile; ?>
	

	<?php endwhile; endif; ?>

		
</div>

	
<?php get_footer(); ?>

