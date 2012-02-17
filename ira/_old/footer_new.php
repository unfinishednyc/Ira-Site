
<?php // SOCIAL MEDIA BOX
	if(( 'gallery' == get_post_type() ) || ( 'post' == get_post_type() ) !=is_home()) { ?>

		<div id="share" class="widget social">
			<div id="shareclose"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery-close.png" alt="Close" width="16" height="16" /></div><?php 
			
			include('inc/share.php'); 
			
		?></div>
		
<?php } ?>


<!-- GLOBAL JAVSCRIPT -->

<script type="text/javascript">
	$(document).ready(function() {
		$('.gallerycontrols').fadeTo(4000, 1);
		
		$('.flicktitle').click(function() {
		  $(this).fadeTo('fast', 0);
		  <?php if(( 'gallery' == get_post_type() ) || is_home()) { ?>$('.galleria-container').fadeTo('fast','.5');<?php } ?>
		  $('.menu-main-container').slideToggle("fast", "linear");
		});
	
		$('#menu-main > li.first.menu-item > a').click(function() {
			$('#menu-main > li.first.menu-item > ul').fadeToggle("fast", "linear");
			$('#menu-main > li.menu-item > ul > li.menu-item > ul').hide('slow', 0);
			
	  });
	
		$('#menu-main > li.menu-item > ul.sub-menu > li.menu-item > a').click(function() {
			$('#menu-main > li.menu-item > ul.sub-menu > li.menu-item > ul').css('display','none');
			$(this).siblings('ul').fadeToggle("fast", "linear");
			return false;
	  });
	
	});	
</script>


<?php




// HOME POST JAVASCRIPT-->

		if(is_home() || ('gallery' == get_post_type())) { ?> 
	
	<script>

		Galleria.loadTheme('<?php bloginfo('stylesheet_directory'); ?>/js/galleria/themes/fullscreen/galleria.fullscreen.min.js');<?php

		if(is_home()) { ?>$('#galleria').galleria(/* {thumbnails: false} */{preload: 'all',initialTransition:"fade",transitionSpeed:700,queue:true});<?php } else { ?> 

		$('#galleria').galleria({
			<?php /* if(!get_field('gallery_is_portfolio')) { */?>thumbnails: false,<?php /* } */ ?>
			preload: 'all',
			extend: function() {
				this.play(5000);
			}
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
		
		// From Previous Templates
		$('body.archive .post:first div.marquee, body.single .post:first div.marquee').remove();

		
		// Accordion Scripts
		$(".toggle_container").hide();
		
		$("li.trigger").click(function(){
			$(this).toggleClass("active").next().slideToggle("slow");
		});

		$("#cancel").click(function(){
			$('.toggle_container').slideUp("slow" );
		});


		$("#twitter-share-link").click(function(e){var status= 'Hey everyone! View a gallery at ';
		var storyUrl = "<?php the_permalink();?>";
		var nownessUrl=encodeURIComponent("<?php bloginfo('home');?>");
		window.open("http://twitter.com/intent/tweet?"+nownessUrl+"&text="+status+"&url="+storyUrl+"","Twitter","width=600,height=255");
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
	

<?php } // end only gallery  ?>
	</script>
<?php } // end home or gallery ?>




<?php 

	// PRESS PAGE SCRIPTS
	
if(is_page('press')) { ?>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$(".medialist li a:first").css('display','block');
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

		$("#twitter-share-link").click(function(e){var status= 'Hey everyone! View a gallery at ';
		var storyUrl = "<?php the_permalink();?>";
		var nownessUrl=encodeURIComponent("<?php bloginfo('home');?>");
		window.open("http://twitter.com/intent/tweet?"+nownessUrl+"&text="+status+"&url="+storyUrl+"","Twitter","width=600,height=255");
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

<!-- GOOGLE ANALYTICS -->

</body>
</html>