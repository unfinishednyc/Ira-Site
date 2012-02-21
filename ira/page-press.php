<?php get_header(); ?>

<div class="content">

<ul class="medialist">

<?php $args = array('post_type'=> 'press', 'posts_per_page' => 100); query_posts( $args ); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<li style="background: url('<?php the_field('full_color_press_thumbnail'); ?>');">
	<span><img src="<?php the_field('bw_press_thumbnail'); ?>" alt="<?php the_title();?>"></span>
		
		<?php if(get_field('press_gallery_images')): ?>
 			<div class="prettyrtrigger">
	    <?php while(the_repeater_field('press_gallery_images')): ?>
	    <a
				rel="prettyPhoto[<?php the_ID();?>]" 
				href="<?php the_sub_field('press_gallery_image'); ?>"
				<?php if(get_sub_field('press_gallery_image_caption')): ?>
				title="<?php the_sub_field('press_gallery_image_caption'); ?>" <?php endif; ?>
				>
				
	        <?php the_sub_field('press_gallery_image_alt_text'); ?>
	        
			</a>
    <?php endwhile;?></div><?php endif; ?>

	</li>
	
<?php endwhile;endif;?>
<?php wp_reset_query(); ?>

</ul>

</div><!-- /.content -->

<?php get_footer(); ?>

