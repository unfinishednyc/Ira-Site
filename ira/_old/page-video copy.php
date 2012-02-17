<?php get_header(); ?>

<div class="content cols cols6">


<div class="marquee video-js-box tube-css"><!-- Begin VideoJS -->
  <!-- Using the Video for Everybody Embed Code http://camendesign.com/code/video_for_everybody -->
  <video id="example_video_1" class="video-js" width="960" height="396" controls="controls" preload="auto" poster="http://video-js.zencoder.com/oceans-clip.png">
    <source src="http://video-js.zencoder.com/oceans-clip.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
    <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm; codecs="vp8, vorbis"' />
    <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg; codecs="theora, vorbis"' />
    <!-- Flash Fallback. Use any flash video player here. Make sure to keep the vjs-flash-fallback class. -->
    <object id="flash_fallback_1" class="vjs-flash-fallback" width="960" height="396" type="application/x-shockwave-flash"
      data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">
      <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
      <param name="allowfullscreen" value="true" />
      <param name="flashvars" value='config={"playlist":["http://video-js.zencoder.com/oceans-clip.png", {"url": "http://video-js.zencoder.com/oceans-clip.mp4","autoPlay":false,"autoBuffering":true}]}' />
      <!-- Image Fallback. Typically the same as the poster image. -->
      <img src="http://video-js.zencoder.com/oceans-clip.png" width="960" height="396" alt="Poster Image"
        title="No video playback capabilities." />
    </object>
  </video>
  <!-- Download links provided for devices that can't play video in the browser. -->
  <p class="vjs-no-video"><strong>Download Video:</strong>
    <a href="http://video-js.zencoder.com/oceans-clip.mp4">MP4</a>,
    <a href="http://video-js.zencoder.com/oceans-clip.webm">WebM</a>,
    <a href="http://video-js.zencoder.com/oceans-clip.ogv">Ogg</a><br>
    <!-- Support VideoJS by keeping this link. -->
    <a href="http://videojs.com">HTML5 Video Player</a> by VideoJS
  </p>
</div><!-- End VideoJS -->



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