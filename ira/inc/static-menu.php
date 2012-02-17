<div id="header">
		<h1>
			<a href="<?php bloginfo('home'); ?>">			<object data="<?php bloginfo('template_directory'); ?>/images/logo.svg" type="image/svg+xml" width="350" height="27" id="mySVGObject"></object></a>
		</h1>
	
<script type="text/javascript">
$(document).ready(function() {
	
	$('.flicktitle').click(function() {
	  $(this).fadeTo('fast', 0);
	  $('.menu-main-container').slideToggle("normal", "swing");	
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

	
});	
</script>

	<?php if(is_home()) { ?><h2 class="flicktitle">World Map</h2><?php } else
	
	 { ?><h2 class="flicktitle"><?php the_title();?></h2><?php } ?>
	
	<?php wp_nav_menu(); ?>
	
</div><!--/#header-->
