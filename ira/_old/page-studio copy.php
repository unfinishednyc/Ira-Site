<?php get_header(); ?>

<div class="content cols cols6">
<?php if ( have_posts() ) :	the_post();?>

	<div class="marquee">
		<img src="<?php the_field('marquee_image'); ?>" alt="<?php the_title(); ?>" width="960" height="640" />
	</div>

<div class="col col4 first">

	<div class="post">
		<h3><?php the_title(); ?></h3>
		
		<?php the_content();?>
		
	</div><!--/.post-->
</div><!--/.col4-->
<?php endif; ?>
<div class="col col2 sidebar">

	<div class="widget">
		<ul>
			<li><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/_temp-sidebarphoto1.jpg" alt="_temp-sidebarphoto1" width="215" height="143" /></a>Sodales a imperdiet.</li>
			<li><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/_temp-sidebarphoto2.jpg" alt="_temp-sidebarphoto2" width="215" height="143" /></a>Lorem ipsum dolor.</li>
		</ul>
	</div>

</div>

</div><!-- /.content -->

<?php get_footer(); ?>