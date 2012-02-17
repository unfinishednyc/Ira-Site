


<!-- SOCIAL MEDIA BOX -->


<?php if(( 'gallery' == get_post_type() ) || is_home() || ( 'post' == get_post_type() )) { ?>
		<div id="flickholder" class="hideonout"><span class="flicktitle2">Share</span></div>
		<div id="share" class="widget social">
			<ul>
<!-- 				<li><a href="https://www.facebook.com/dialog/permissions.request?api_key=205013996178545&app_id=205013996178545&display=popup&fbconnect=1&locale=en_US&next=http%3A%2F%2Fstatic.ak.fbcdn.net%2Fconnect%2Fxd_proxy.php%3Fversion%3D3%23cb%3Df192b3c158%26origin%3Dhttp%253A%252F%252Fwww.nowness.com%252Ff1fdd93cb4%26relation%3Dopener%26transport%3Dpostmessage%26frame%3Df1cc63d8fc%26result%3D%2522xxRESULTTOKENxx%2522&perms=publish_stream%2Cemail&return_session=1&sdk=joey&session_version=3" class="popup"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-fb.gif" alt="icon-fb" width="19" height="19" /> Facebook</a></li> -->
				<li><a href="#" class="popup"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-fb.gif" alt="icon-fb" width="19" height="19" /> Facebook</a></li>
<!-- 				<li><a class="twitter popup" href="http://twitter.com/share?text=<?php the_title();echo "%20-%20";  the_permalink(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-twitter.gif" alt="icon-twitter" width="19" height="19" /> Twitter</a></li> -->
				<li><a class="twitter popup" href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-twitter.gif" alt="icon-twitter" width="19" height="19" /> Twitter</a></li>

				<li class="trigger"><a href="#" onclick="return false;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-mail.gif" alt="icon-mail" width="19" height="19" /> Email</a></li>
					<div class="toggle_container bottom">
                <div class="textbox send-to-friend hide">
                  <form action="/issue/sendtofriend" id="sendToFriend" method="post">
                     <div class="field">
                       <input class="watermarked required" id="senderName" name="senderName" title="Your Name" type="text" onfocus="if(this.value == 'Your Name') { this.value = ''; }" value="Your Name" />
                     </div>
                     <div class="field">
                       <input class="watermarked required" id="senderEmail" name="senderEmail" title="Your Email" type="text" onfocus="if(this.value == 'Your Email') { this.value = ''; }" value="Your Email" />
                     </div>
                     <div class="field">
                       <input class="watermarked required" id="recipientName" name="recipientName" title="Friend&#39;s Name" type="text" onfocus="if(this.value == 'Name of friend') { this.value = ''; }" value="Name of friend" />
                     </div>
                     <div class="field">
                       <input class="watermarked required" id="recipientEmail" name="recipientEmail" title="Friend&#39;s Email" type="text" onfocus="if(this.value == 'value') { this.value = ''; }" value="Email of Friend" />
                     </div>
                     
                      <div class="field">
                       <span class="btn-span"><input id="submitEmailToFriend" type="submit" class="comment-btn message-btn" value="Send To Friend" /></span>
                      </div>
                      <input id="ajaxRequest" name="ajaxRequest" type="hidden" value="true" />
                      <input id="subject" name="subject" type="hidden" value="{0}, have you seen the new NOWNESS?" />
                      <input id="id" name="id" type="hidden" value="1756" />
                      <input id="itemId" name="itemId" type="hidden" value="1721" />
                  </form>
                </div>
					</div>

				<li class="trigger"><a href="#" onclick="return false;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-link.gif" alt="icon-link" width="19" height="19" /> Premalink</a></li>		
					<div class="toggle_container">
					
                <div class="textbox hide copy-item">                    
                    <textarea id="copyBox" class="copyable permalink-box" cols="10" rows="10"><?php the_permalink(); ?></textarea>                   
                            <br />
                <div id="copyContainer">
                  <span class="btn-span"><input id="copyToClipBoard" type="submit" class="comment-btn copy-btn" value="Copy Link" /></span>
                 </div>                
                </div>
					</div>
				
				<!-- <li><a href="#">Embed</a></li> -->		
			</ul>
		</div>
		
<?php } ?>



<!-- PRESS PAGE JAVASCRIPT-->


<?php if(is_page('press')) { ?>

	<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$(".medialist li a:first").css('display','block');
			$(".medialist li a[rel^='prettyPhoto']").prettyPhoto({
				social_tools:false,
				animation_speed: 'fast',
				theme: 'light_square',
				slideshow: 3000,
				default_width: 500,
				default_height: 500,
				horizontal_padding:0,
				deeplinking:false,
				overlay_gallery: false
			});	
		});
	</script>	
<? } ?>


<!-- HOME/GALLERY POST JAVASCRIPT-->

<?php if(( 'gallery' == get_post_type() ) || is_home()) {?> 
	<script>
	
		Galleria.loadTheme('<?php bloginfo('stylesheet_directory'); ?>/js/galleria/themes/fullscreen/galleria.fullscreen.min.js');
		
		$('#galleria').galleria();
	
	</script>
<? } ?>


<!-- BLOG POST JAVASCRIPT-->

<?php if (( 'post' == get_post_type()) && !is_home() && ('gallery' != get_post_type()) ) { ?>

<script type="text/javascript">

	Galleria.loadTheme('<?php bloginfo('stylesheet_directory'); ?>/js/galleria/themes/twelve/galleria.twelve.min.js');
	
	$('#galleria').galleria();
	
</script>

<script type="text/javascript">
	
	$(document).ready(function(){

		$.ajaxSetup({cache:false});
	
			<?php
				$categories=get_categories();
			  foreach($categories as $category) { 
			 	$catidnumber = $category->term_id;
			 ?>
		
			$('.cat-item-<?php echo $catidnumber; ?> a').click(function() {
				$('#reload').fadeTo('200',0)
				$("#reload").load("<?php bloginfo('template_url'); ?>/inc/refresh.php?catid=<?php echo $catidnumber; ?>");
				$('#reload').fadeTo('100',1)

				return false;
			});
			<?php } ?>
	
	});
</script>

<?php } ?>



<!-- GLOBAL JAVSCRIPT -->

<script type="text/javascript">
	$(document).ready(function() {
	
		// Main Nav
		$('.flicktitle').click(function() {
		  <?php if(( 'gallery' == get_post_type() ) || is_home()) { ?>$('.galleria-container').fadeTo('fast','.5');<?php } ?>
		  $(this).fadeTo('fast', 0);
		  $('.menu-main-container').slideToggle("fast", "linear");	
		});
	
		$('#menu-main > li.first.menu-item > a').click(function() {
			$('#menu-main > li.first.menu-item > ul').fadeToggle("fast", "linear");
			$('#menu-main > li.menu-item > ul > li.menu-item > ul').hide('slow', 0);
			return false;
	  });
	
		$('#menu-main > li.menu-item > ul > li.menu-item').click(function() {
			$('#menu-main > li.menu-item > ul > li.menu-item > ul').css('display','none');
			$(this).children('ul').fadeToggle("fast", "linear");
			return false;
	  });
	
	
		// SHARE NAV
		$('#flickholder').click(function() {
		  $('.galleria-container').toggleClass('darker');
		  $('#share').slideToggle("fast", "linear");	
		});
		
		// From Previous Templates
		$('body.archive .post:first div.marquee, body.single .post:first div.marquee').remove();

		
		// Accordion Scripts
		$(".toggle_container").hide();
		
		$("li.trigger").click(function(){
			$(this).toggleClass("active").next().slideToggle("slow");
		});





	});	
</script>

<?php wp_footer(); ?>

<!-- GOOGLE ANALYTICS -->

</body>
</html>