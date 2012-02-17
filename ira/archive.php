<?php get_header(); ?>

<div class="content cols cols6">

<?php if ( have_posts() ) :	the_post();?>






<?php if(!get_field('disable_marquee')) : 


	if(get_field('video')) : ?>

	<div class="marquee">
	
		<div class="video-js-box tube-css">
		<!-- Begin VideoJS -->
		<video id="example_video_1" class="video-js" width="960" height="540" controls="controls" poster="<?php the_field('video_poster'); ?>" allowfullscreen>
		  <!-- Default Video -->
		  <source src="<?php the_field('video'); ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'/>
		  <!-- Firefox Fallback. -->
		  <source src="<?php the_field('video_ogv'); ?>" type='video/ogg; codecs="theora, vorbis" />
      <!-- Flash Fallback. -->
      <object id="flash_fallback_1" class="vjs-flash-fallback" width="960" height="540" type="application/x-shockwave-flash"
        data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">
        <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
        <param name="allowfullscreen" value="true" />
        <param name="flashvars" value='config={"playlist":["<?php the_field('video_poster'); ?>", {"url": "<?php the_field('video'); ?>","autoPlay":false,"autoBuffering":true}]}' />
        <!-- Image Fallback.  -->
        <img src="<?php the_field('video_poster'); ?>" width="960" height="540" alt="Poster Image" title="No video playback capabilities." />
      </object>
		  
		</video>
		<p class="vjs-no-video"><strong>Download Video:</strong>
		  <a href="<?php bloginfo('stylesheet_directory'); ?>/images/test.mp4">Click here to Download the video.</a>
		</p>
		</div><!-- End VideoJS -->
	</div>
			
<?php elseif(get_field('marquee_gallery')) : 	?>
	 <div id="galleria" class="marquee">
	
	    <?php while(the_repeater_field('marquee_gallery')): ?>
			  <a href="<?php the_sub_field('marquee_gallery_image'); ?>">
			  	<?php $image = wp_get_attachment_image_src(get_sub_field('marquee_gallery_image'), 'thumbnail'); ?>
					<img src="<?php echo $image[0]; ?>" />
				</a>
	    <?php endwhile; ?>
	 </div>
	 
	 <?php if(get_field('gallery_credits')) :  
	
		?><div id="creditsclick" class="trigger" title="Click to view credits">Credits</div>
			<div id="overgallery" class="toggle_container">
				<a href="javascript:void(0);" id="cancel" title"Click to hide Credits"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery-close.png" alt="gallery-close" width="16" height="16" /></a>
			<?php the_field('gallery_credits');
			
			if(get_field('link_to_full_gallery')) : ?><p class="viewfullgallery">
		    	<a href="<?php the_field('link_to_full_gallery');?>">> View Full Gallery</a>
		    </p><? endif; ?>
			</div>
		<?php 
	 
	 endif;
	 
	 elseif(get_field('marquee_image')) : ?>
	 
	<div class="marquee">
		<img src="<?php the_field('marquee_image'); ?>" alt="<?php the_title(); ?>" width="960" height="540" />
	</div>
	 
	<?php else : ?>

	<div class="marquee">
		<img src="<?php the_field('marquee_image'); ?>" alt="<?php the_title(); ?>" width="960" height="640" />
	</div>
			
<?php endif; endif; ?>


	<div class="col col4 first">

		<div class="post">
			<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
			<span class="meta">POSTED BY <?php the_author();?> on <?php the_date(); ?></span>


			<?php if(get_field('link_to_full_gallery')) : ?><p class="viewfull">
		    	<a href="<?php the_field('link_to_full_gallery');?>">> View Full Gallery</a>
		    </p><? endif; ?>

			<?php the_content(); ?>


		</div><!-- /.post -->



<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div class="pagination">
		<div class="previous"><?php next_posts_link( __( '<img src="' . get_bloginfo('template_directory') .'/images/icon-tiny-prev.gif" alt="Older Posts" /> Previous post', 'twentyten' ) ); ?></div>
		<div class="next"><?php previous_posts_link( __( 'Next post <img src="' . get_bloginfo('template_directory') .'/images/icon-tiny-next.gif" alt="Newer Posts" />', 'twentyten' ) ); ?></div>
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
