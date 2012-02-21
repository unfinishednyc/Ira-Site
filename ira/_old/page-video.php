<?php get_header(); ?>

<div class="content cols cols6">






<div class="marquee">
<div class="video-js-box tube-css"><!-- Begin VideoJS -->
  <!-- Using the Video for Everybody Embed Code http://camendesign.com/code/video_for_everybody -->
  <video id="example_video_1" class="video-js" width="960" height="640" controls="controls" poster="<?php bloginfo('stylesheet_directory'); ?>/images/vid_screenshot.png">
    <source src="<?php bloginfo('stylesheet_directory'); ?>/inc/irene.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
  </video>
  <!-- Download links provided for devices that can't play video in the browser. -->
  <p class="vjs-no-video"><strong>Download Video:</strong>
    <a href="<?php bloginfo('stylesheet_directory'); ?>/inc/irene.mp4">MP4</a>,
    <!-- Support VideoJS by keeping this link. -->
  </p>
</div><!-- End VideoJS -->
</div>


<div class="col col4 first">

	<div class="post">
		<h3>The Studio</h3>
		
		<p>Sem arcu mi sapien massa vulputate amet donec mattis. Est donec ut. Fermentum cras consectetuer. Nec est semper. Placerat aliquam mus. Pretium cras eget. In blandit ipsum. Erat mi amet sapien dapibus lorem vehicula nullam mollit ut nunc vitae suspendisse pharetra nam a et sagittis sed qui tellus. Cursus quis integer dictum faucibus pretium. Non vestibulum aut. Sodales a imperdiet. Duis tincidunt dignissim nulla vel ultrices feugiat vestibulum nascetur libero pellentesque mi nam maecenas enim. Wisi in vitae. Maecenas tempor venenatis. Condimentum congue consectetuer nulla.</p>
		<p>Non vestibulum aut. Sodales a imperdiet. Duis tincidunt dignissim nulla vel ultrices feugiat vestibulum nascetur libero pellentesque mi nam maecenas enim. Wisi in vitae. Maecenas tempor venenatis. Condimentum congue consectetuer nulla.</p>
		<p>Sem arcu mi sapien massa vulputate amet donec mattis. Est donec ut. Fermentum cras consectetuer.</p>
		
		<div class="more">
			<p><a href="#">More</a></p>
		</div>
	</div><!--/.post-->
</div><!--/.col4-->

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