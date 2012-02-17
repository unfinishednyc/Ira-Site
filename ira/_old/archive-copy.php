<?php get_header(); ?>


<div class="content cols cols6">

<?php if ( have_posts() ) :	the_post();?>


	<div class="marquee">
		<img src="<?php the_field('marquee_image'); ?>" alt="<?php the_title(); ?>" width="960" height="640" />
	</div>
			
	<div class="col col4 first">

		<div class="post">
			<h3><a href="<?php the_permalink(); ?>" title="Click to Read Post"><?php the_title(); ?></a></h3>
			<span class="meta">POSTED BY <?php the_author();?> on <?php the_date(); ?></span>

<!--
			<div class="marquee">
				<a href="<?php the_permalink(); ?>" title="Click to Read Post"><img src="<?php the_field('marquee_image'); ?>" alt="<?php the_title(); ?>" width="633" /></a>
			</div>
-->
			
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

<?php include('inc/share.php'); ?>
<?php endif; ?>

</div><!--/.col4-->




<?php // THIS IS THE BOTTOM OF THE BLOG POST PAGE ?>

<div class="content cols cols6">
		<div class="recent col col4 first">
		<h4>Recent Posts</h4>

		<div id="reload">
			<ul>

			<?php wp_reset_query();
			query_posts( 'posts_per_page=12' ); while (have_posts()) : the_post(); ?>

				<li>
					<a href="<?php the_permalink(); ?>" title="Click to Read Post"><img src="<?php the_field('post_thumbnail'); ?>" alt="<?php the_title(); ?>" width="156" height="156"/></a>
					<h5><a href="<?php the_permalink(); ?>" title="Click to Read Post"><?php the_field('post_short_title'); ?></a></h5>
					<p><a href="<?php the_permalink(); ?>" title="Click to Read Post"><?php the_field('post_short_summary'); ?></a></p>
				</li>
				
			<?php endwhile; wp_reset_query(); ?>

			</ul>
		</div>
		</div><!--/.recent -->


<?php include('inc/sidebar.php'); ?>

</div><!-- /.content -->




<?php get_footer(); ?>
