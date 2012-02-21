
<?php // SOCIAL MEDIA BOX
	if(( 'gallery' == get_post_type() ) || ( 'post' == get_post_type() ) !=is_home()) { ?>

		<div id="share" class="widget social">
			<div id="shareclose" title="Click to close sharing options"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery-close.png" alt="Close" width="16" height="16" /></div><?php 
			
			include('inc/share.php'); 
			
		?></div>
		
		<?php if(( 'gallery' == get_post_type()) && !get_field('gallery_is_portfolio')) {?>
		
		<div class="gallerycontrols cf">

			<div>
				<div id="slideshow_pause">&nbsp;</div>
				<div id="sharetoggle"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-share.png" alt="icon-share" width="30" height="30" /></div>
				<div id="jplayer">

					<div id="jquery_jplayer_1" class="jp-jplayer"></div>

					<div id="jp_container_1" class="jp-audio">
						<div class="jp-controls">
							<div class="jp-play">play</div>
							<div class="jp-pause">pause</div>
						</div>
					</div><!--/#jp_container_1-->
					
				</div><!--/#jplayer-->
			</div>

		</div><!--/#gallerycontrols-->
		
<?php }

} ?>


<!-- GLOBAL JAVSCRIPT -->

<script type="text/javascript">
	$(document).ready(function() {
	
		
		$('.flicktitle').click(function() {
		  $(this).fadeTo("fast", 0, "linear");
		  <?php if(( 'gallery' == get_post_type() ) || is_home()) { ?>$('.galleria-container').fadeTo('300','.5');<?php } ?>
		  $('.menu-main-container').slideToggle("fast", "linear");
		});
	
		$('#menu-main > li.first.menu-item > a').click(function() {
			$('#menu-main > li.first.menu-item > ul').fadeToggle("fast", "linear");
			$('#menu-main > li.menu-item > ul > li.menu-item > ul').hide('slow', 0);
			$('#menu-main > li.filmmakers_menu  > ul').fadeOut("fast");
			return false;	
	  });
	
		$('#menu-main > li.menu-item > ul.sub-menu > li.menu-item > a').click(function() {
			$('#menu-main > li.menu-item > ul.sub-menu > li.menu-item > ul').css('display','none');
			$(this).siblings('ul').fadeToggle("fast", "linear");
			return false;
	  });


		$('#menu-main > li.filmmakers_menu > a').click(function() {
			$('#menu-main > li.first.menu-item > ul').fadeOut('fast');;
			$('#menu-main > li.filmmakers_menu  > ul').fadeToggle("fast", "linear");
			return false;			
	  });
	
	


	  
	  var mouse_is_inside = false;

    $('#menu-main a').hover(function(){ 
        mouse_is_inside=true; 
    }, function(){ 
        mouse_is_inside=false; 
    });

    $("body").mouseup(function(){ 
        if(! mouse_is_inside) $('.menu-main-container').hide();
        if(! mouse_is_inside) $('.galleria-container').fadeTo('fast','1');
        if(! mouse_is_inside) $('.flicktitle').fadeTo('fast', 1);
        if(! mouse_is_inside) $('ul.sub-menu').hide('fast', 'linear');
    });
	  
	  
	
	});	
</script>


<?php

// HOME POST JAVASCRIPT-->

		if(is_home() || ('gallery' == get_post_type())) { ?>
		
	<div id="overlay">&nbsp;</div>	
	
	<script>
	
		$('.gallerycontrols').fadeTo(4000, 1);
	
		<?php if(!get_field('gallery_is_portfolio')) { ?>
		
		$("#sharetoggle").click(function(){
			$('#share').fadeToggle("slow");
			$('#overlay').fadeToggle("slow");
		});
		
		$('#slideshow_pause').click(function() {
		  var gallery = Galleria.get(0);
		  gallery.playToggle();
		  $(this).toggleClass('pause');

			if (xxx = true) {
				$("#jquery_jplayer_1").jPlayer("play");
				xxx = false;
			}

			if ($("#jquery_jplayer_1").data("jPlayer").status.paused == false) {
	      $("#jquery_jplayer_1").jPlayer("pause");
	      var xxx = true;
		  }
  
		});	
			
		<?php } ?>

		Galleria.loadTheme('<?php bloginfo('stylesheet_directory'); ?>/js/galleria/themes/fullscreen/galleria.fullscreen.min.js');

		$('#galleria').galleria({
			<?php
		if(is_home() || !get_field('gallery_is_portfolio')) { 
			?>thumbnails: false,<?php } ?>
			
			queue:true,
			transitionSpeed:700,
			initialTransition:"fade",
			preload: 'all',
			<?php if(!is_home()) : ?>
			extend: function() {
				this.play(4000);
			}<?php endif; ?>
		});
		
		$('#gallerybutton').click(function() {
			$(this).toggleClass("active");
			var gallery = Galleria.get(0);
			gallery.playToggle();
			return false;
		});

		// SHARING JAVASCRIPT
		overlay = $('<div></div>').prependTo('body').attr('id', 'overlay');
		// SHARE NAV
		$('#sharebutton, #shareclose').click(function() {
		  $('.galleria-container').toggleClass('lighter');
		  $('#overlay').toggle();
		  $('body').toggleClass('sharebg');
		  $('html').toggleClass('sharebg');
		  $('#share').fadeToggle("fast", "linear");
			var gallery = Galleria.get(0);
			gallery.playToggle();

		});
				
		// Accordion Scripts
		$(".toggle_container").hide();
		
		$("li.trigger").click(function(){
			$(this).toggleClass("active").next().slideToggle("slow");
		});

		$("#cancel").click(function(){
			$('.toggle_container').slideUp("slow" );
		});

		$("#twitter-share-link").click(function(e){
			var status= 'Hey everyone! View a gallery at ';
			var storyUrl = "<?php the_permalink();?>";
			var nownessUrl=encodeURIComponent("<?php bloginfo('home');?>");
			var left = (screen.width/2)-300;
			var top = (screen.height/2)-210;
			window.open("http://twitter.com/intent/tweet?"+nownessUrl+"&text="+status+"&url="+storyUrl+"","Twitter","width=600,height=255,top="+top+",left="+left);
						return false;
		});



		// EMAIL FORM SCRIPTS
		var messageDelay = 4000;  // How long to display status messages (in milliseconds)
		
		$( init );
		

		// Initialize the form
		
		function init() {
		
		  $('#contactForm').submit( submitForm );
		
		  // When the "Escape" key is pressed, close the form
		  //$('#contactForm').keydown( function( event ) {
		  //  if ( event.which == 27 ) {
		  //    $('#contactForm').fadeOut();
		  //    $('#content').fadeTo( 'slow', 1 );
		  //  }
		  //} );
		
		}
		

	// Submit the form via Ajax
	
	function submitForm() {
	  var contactForm = $(this);
	
	  // Are all the fields filled in?
	
	  if ( !$('#senderName').val() || !$('#senderEmail').val() || !$('#friendName').val() || !$('#friendEmail').val() ) {
	
	    // No; display a warning message and return to the form
	    $('#incompleteMessage').fadeIn().delay(messageDelay).fadeOut();
	    contactForm.fadeOut().delay(messageDelay).fadeIn();
	
	  } else {
	
	    // Yes; submit the form to the PHP script via Ajax
	
	    $('#sendingMessage').fadeIn();
	//   contactForm.fadeOut(); 
	
	    $.ajax( {
	      url: contactForm.attr( 'action' ) + "?ajax=true",
	      type: contactForm.attr( 'method' ),
	      data: contactForm.serialize(),
	      success: submitFinished
	    } );
	  }
	
	  // Prevent the default form submission occurring
	  return false;
	}
	
	
	// Handle the Ajax response
	
	function submitFinished( response ) {
	  response = $.trim( response );
	  $('#sendingMessage').fadeOut();
	
	  if ( response == "success" ) {
	
	    $('#successMessage').fadeIn().delay(messageDelay).fadeOut();
	    $('#senderName').val( "" );
	    $('#senderEmail').val( "" );
	    $('#friendName').val( "" );
	    $('#friendEmail').val( "" );
	
	  } else {
	
	    // Form submission failed: Display the failure message,
	    // then redisplay the form
	    $('#failureMessage').fadeIn().delay(messageDelay).fadeOut();
	    $('#contactForm').delay(messageDelay+500).fadeIn();
	  }
	}
</script>

<?php } // gallery  ?>






<?php 

	// PRESS PAGE SCRIPTS
	
if(is_page('press')) { ?>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$("ul.medialist > li > .prettyrtrigger > a:first-child").css('display','block');
			$(".medialist li a[rel^='prettyPhoto']").prettyPhoto({
				social_tools:false,
				animation_speed: 'fast',
				theme: 'light_square',
				slideshow: 5000,
				default_width: 500,
				default_height: 500,
				horizontal_padding:0,
				deeplinking:false,
				overlay_gallery: false
			});	
		});
	</script><? } ?>




<?php if (( 'post' == get_post_type()) && !is_home() && ('gallery' != get_post_type()) ) 

// BLOG POST JAVASCRIPT

{ ?><script type="text/javascript">

	Galleria.loadTheme('<?php bloginfo('stylesheet_directory'); ?>/js/galleria/themes/twelve/galleria.twelve.min.js');
	
	$('#galleria').galleria();
	
	$(document).ready(function(){
	
		$('#reload ul li:nth-child(4n)').css('margin-right','0');
		
		$('#reload li').hover(
			function () {
				$('#reload li').not(this).css('opacity','.4');
			},
			function () {
				$('#reload li').css('opacity','1');
		  }
		);
		
				
		// Accordion Scripts
		$(".toggle_container").hide();
		
		$("div.trigger").click(function(){
			$(this).toggleClass("active").next().fadeToggle("slow");
		});

		$("#cancel").click(function(){
			$('#overgallery.toggle_container').fadeToggle("slow");
		});

		

		/* LOAD MORE POSTS */
		$('#reload ul li:gt(11)').hide();
		
		$('.next').click(function() {
		    if ($('#reload ul li:visible:last').is(':last-child')) {
		        return false;
		    }
		
		    var currentIndex = $('#reload ul').children('li:visible:last').index(),
		        nextIndex = currentIndex + 13;
		    $('#reload ul li:lt(' + nextIndex + '):gt(' + currentIndex + ')').show();
		});
		

		$.ajaxSetup({cache:false});
	
	<?php 
	
	
	 $args = array('post_type'=> 'sidebar', 'posts_per_page' => 100); query_posts( $args ); 

	if (have_posts()) : while (have_posts()) : the_post();
	
	
	if(get_field('sidebar_authors')):
	
		while(the_repeater_field('sidebar_authors')): ?>
		$('.auth-item-<?php the_sub_field('sidebar_author_id'); ?> a').click(function() {
			$('#reload').fadeTo('200',0)
			$("#reload").load("<?php bloginfo('template_url'); ?>/inc/refresh.php?authid=<?php the_sub_field('sidebar_author_id'); ?>",function() {
			  $('#reload').fadeTo('200',1);
			});

			return false;
		});
		<?php endwhile; endif;
		
		
	if(get_field('sidebar_tags')): 	
		
		while(the_repeater_field('sidebar_tags')): ?>
		$('.tag-item-<?php the_sub_field('sidebar_tag_id'); ?> a').click(function() {
			$('#reload').fadeTo('200',0)
			$("#reload").load("<?php bloginfo('template_url'); ?>/inc/refresh.php?tagid=<?php the_sub_field('sidebar_tag_id'); ?>",function() {
			  $('#reload').fadeTo('200',1);
			});

			return false;
		});
		<?php endwhile; endif;
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		endwhile; endif; ?>
	
		$('.auth-item-<?php echo $authidnumber; ?> a').click(function() {
			$('#reload').fadeTo('200',0)
			$("#reload").load("<?php bloginfo('template_url'); ?>/inc/refresh.php?authid=<?php echo $authidnumber; ?>",function() {
			  $('#reload').fadeTo('200',1);
			});

			return false;
		});
				
		<?php
			$categories=get_categories();
		  foreach($categories as $category) { 
			 	$catidnumber = $category->term_id;
			 ?>
		
			$('.cat-item-<?php echo $catidnumber; ?> a').click(function() {
				$('#reload').fadeTo('200',0)
				$("#reload").load("<?php bloginfo('template_url'); ?>/inc/refresh.php?catid=<?php echo $catidnumber; ?>",function() {
				  $('#reload').fadeTo('200',1);
				});

				return false;
			});
		
		<?php } ?>
		

		
		// Accordion Scripts
		$(".toggle_container").hide();
		
		$("li.trigger").click(function(){
			$(this).toggleClass("active").next().slideToggle("slow");
		});

		$("#twitter-share-link").click(function(e){
			var status= 'Hey everyone! View a gallery at ';
			var storyUrl = "<?php the_permalink();?>";
			var nownessUrl=encodeURIComponent("<?php bloginfo('home');?>");
			var left = (screen.width/2)-300;
			var top = (screen.height/2)-210;
			window.open("http://twitter.com/intent/tweet?"+nownessUrl+"&text="+status+"&url="+storyUrl+"","Twitter","width=600,height=255,top="+top+",left="+left);
						return false;
		});



		// EMAIL FORM SCRIPTS
		var messageDelay = 4000;  // How long to display status messages (in milliseconds)
		
		$( init );
		

		// Initialize the form
		
		function init() {
		
		  $('#contactForm').submit( submitForm );
		
		  // When the "Escape" key is pressed, close the form
		  //$('#contactForm').keydown( function( event ) {
		  //  if ( event.which == 27 ) {
		  //    $('#contactForm').fadeOut();
		  //    $('#content').fadeTo( 'slow', 1 );
		  //  }
		  //} );
		
		}
		

		// Submit the form via Ajax
		
		function submitForm() {
		  var contactForm = $(this);
		
		  // Are all the fields filled in?
		
		  if ( !$('#senderName').val() || !$('#senderEmail').val() || !$('#friendName').val() || !$('#friendEmail').val() ) {
		
		    // No; display a warning message and return to the form
		    $('#incompleteMessage').fadeIn().delay(messageDelay).fadeOut();
		    contactForm.fadeOut().delay(messageDelay).fadeIn();
		
		  } else {
		
		    // Yes; submit the form to the PHP script via Ajax
		
		    $('#sendingMessage').fadeIn();
		//   contactForm.fadeOut(); 
		
		    $.ajax( {
		      url: contactForm.attr( 'action' ) + "?ajax=true",
		      type: contactForm.attr( 'method' ),
		      data: contactForm.serialize(),
		      success: submitFinished
		    } );
		  }
		
		  // Prevent the default form submission occurring
		  return false;
		}
		
		
		// Handle the Ajax response
		
		function submitFinished( response ) {
		  response = $.trim( response );
		  $('#sendingMessage').fadeOut();
		
		  if ( response == "success" ) {
		
		    $('#successMessage').fadeIn().delay(messageDelay).fadeOut();
		    $('#senderName').val( "" );
		    $('#senderEmail').val( "" );
		    $('#friendName').val( "" );
		    $('#friendEmail').val( "" );
		
		  } else {
		
		    // Form submission failed: Display the failure message,
		    // then redisplay the form
		    $('#failureMessage').fadeIn().delay(messageDelay).fadeOut();
		    $('#contactForm').delay(messageDelay+500).fadeIn();
		  }
		}
	


			
	
	});
</script>
<?php } ?>


<?php wp_footer(); ?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27745154-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>