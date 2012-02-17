<?php get_header(); ?>

<div class="content cols cols6">

<?php if (have_posts()) :while (have_posts()) :the_post();

	// VIDEO CODE

	if(get_field('video')) { ?>

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
			
<?php } elseif(get_field('marquee_image')) { ?>
	<div class="marquee">
		<img src="<?php the_field('marquee_image'); ?>" alt="<?php the_title(); ?>" width="960" height="540" />
	</div>

<?php  }?>



<div class="col col4 first">

	<div class="post">
		<h3><?php the_title(); ?></h3>
		
			<?php the_content(); ?>		

	</div><!--/.post-->
</div><!--/.col4-->

<div class="col col2 sidebar">


		<div class="widget">
		<ul>

	<?php if(get_field('page_sidebar_item')): ?>
	
		<?php while(the_repeater_field('page_sidebar_item')): ?>

			<li>
				<a target="_blank" href="<?php the_sub_field('page_sidebar_link'); ?>">
				<img src="<?php the_sub_field('page_link_thumbnail'); ?>" alt="" width="215" height="143" /><br /><?php the_sub_field('page_sidebar_title'); ?>
				</a>
			</li>
	  
	  <?php endwhile; endif;?>


		</ul>		
	</div>


</div>

<?php endwhile;endif;?>


</div><!-- /.content -->

<?php get_footer(); ?>