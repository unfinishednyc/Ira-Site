<?php

/* Template Name: Featured */ 

?>


<?php get_header(); ?>

<div class="content cols cols6">

<?php if (have_posts()) : the_post();?>

	<?php if(get_field('featured_item')): ?>
		<ul class="featured_items">
		<?php while(the_repeater_field('featured_item')): ?>

			<li>
				<a target="_blank" href="<?php the_sub_field('featured_item_link'); ?>">
				<img src="<?php the_sub_field('featured_item_image'); ?>" alt="" width="270" height="170" /><br /><?php the_sub_field('featured_item_title'); ?>
				</a>
			</li>
	  
	  <?php endwhile;?>
	  </ul>
<?php endif; endif;?>

</div><!-- /.content -->

<?php get_footer(); ?>