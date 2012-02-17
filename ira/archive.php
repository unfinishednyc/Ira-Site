<?php get_header(); ?>

<div class="content cols cols6">

<?php if ( have_posts() ) :	the_post();?>


<?php if(get_field('show_marquee')){ ?>


	<?php if(get_field('marquee_gallery')): ?>
	 <div id="galleria" class="marquee">
	
	    <?php while(the_repeater_field('marquee_gallery')): ?>
			  <a href="<?php the_sub_field('marquee_gallery_image'); ?>">
			  	<?php $image = wp_get_attachment_image_src(get_sub_field('marquee_gallery_image'), 'thumbnail'); ?>
					<img src="<?php echo $image[0]; ?>" />
				</a>
	    <?php endwhile; ?>

	 </div>
	<?php endif; ?>

<?php } elseif(get_field('marquee_image')) { ?>

	<div class="marquee">
		<img src="<?php the_field('marquee_image'); ?>" alt="<?php the_title(); ?>" width="960" height="640" />
	</div>
			
<?php } ?>


	<div class="col col4 first">

		<div class="post">
			<h3><?php the_title(); ?></h3>
			<span class="meta">POSTED BY <?php the_author();?> on <?php the_date(); ?></span>


			<?php if(get_field('main_gallery_link')) { 

		    $post_object = get_field('main_gallery_link'); ?>
		    
				<p><a href="<?php echo get_permalink($post_object->ID);?>">> View Full Gallery</a></p>
				
			<? } ?>

			
			<?php the_content(); ?>


		</div><!-- /.post -->



<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div class="pagination">
		<div class="previous"><?php next_posts_link( __( '<img src="' . get_bloginfo('template_directory') .'/images/icon-tiny-prev.gif" alt="Older Posts" /> Older posts', 'twentyten' ) ); ?></div>
		<div class="next"><?php previous_posts_link( __( 'Newer posts <img src="' . get_bloginfo('template_directory') .'/images/icon-tiny-next.gif" alt="Newer Posts" />', 'twentyten' ) ); ?></div>
	</div>
<?php endif; ?>

	</div>

	<div class="col col2 sidebar top">
	
		<div class="widget social">
			<h5>Share</h5>
			<?php include('inc/share.php'); ?>
		</div>
	
	</div><!--/.sidebar-->

<?php endif; ?>

</div><!--/.col4-->



<?php // THIS IS THE BOTTOM OF THE BLOG POST PAGE ?>

<div class="content cols cols6">
		<div class="recent col col4 first">
			<h4>Recent Posts</h4>
	
			<div id="reload" class="cf">
				<ul>
	
				<?php wp_reset_query();
				query_posts( 'posts_per_page=-1' ); while (have_posts()) : the_post(); ?>
	
					<li>
						<a class="reloadimgholder" href="<?php the_permalink(); ?>" title="Click to Read Post"><img src="<?php the_field('post_thumbnail'); ?>" alt="<?php the_title(); ?>" width="156" height="156"/></a>
						<h5><a href="<?php the_permalink(); ?>" title="Click to Read Post"><?php the_field('post_short_title'); ?></a></h5>
						<p><a href="<?php the_permalink(); ?>" title="Click to Read Post"><?php the_field('post_short_summary'); ?></a></p>
					</li>
					
				<?php endwhile; wp_reset_query(); ?>
	
				</ul>
				
			</div>
			<p class="next">> View More</p>
		</div><!--/.recent -->


<?php include('inc/sidebar.php'); ?>

</div><!-- /.content -->




<?php get_footer(); ?>
