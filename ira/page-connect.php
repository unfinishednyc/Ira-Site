<?php get_header(); ?>

<?php if (have_posts()) :while (have_posts()) :the_post(); ?>

<div id="map_canvas" style="width:100%;height:400px;"></div>

<div class="content cols cols6">

	<div class="col col2 first">
		<?php the_field('contact_left_column'); ?>
	</div>

	<div class="col col3 directions">
		<?php the_field('contact_right_column'); ?>
		<p><em><a style="opacity:1" href="<?php the_field('contact_print_directions'); ?>">> Print Directions</a></em></p>		
	</div>
	
	<div class="col printlink">
		&nbsp;
	</div>

</div>

<?php endwhile;endif;?>

<?php get_footer(); ?>