<!DOCTYPE html>
<html>
<head>

<?php include('inc/the_page_title.php');


	?><link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" />

<?php if(!is_page('press') && ( 'gallery' != get_post_type()) && !is_home()) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_directory'); ?>/js/pp/css/prettyPhoto.css" />
	<? } elseif(( 'gallery' != get_post_type()) && !is_home()) {  ?>	
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_directory'); ?>/js/pp/css/prettyPhoto-press.css" />
<? } ?>
<?php // LOAD IN THE REGULAR STUFF AT THE BEGINNING ?>
	<script type="text/javascript" src="http://use.typekit.com/tox4tzn.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/svg.js"></script>	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<?php ?>
<?php if(!is_page('press') && ( 'gallery' != get_post_type()) && !is_home()) {?>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.prettyPhoto.js"></script>
	<? } elseif(( 'gallery' != get_post_type()) && !is_home()) { ?>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.prettyPhoto.press.js"></script><? } ?>
	<?php if(( 'gallery' == get_post_type() ) || is_home() || ( 'post' == get_post_type() )) { ?><script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/galleria/galleria-1.2.5.js"></script>
<? } ?>

<?php if(( 'gallery' == get_post_type() ) || is_home() ) { ?>
	<script type="text/javascript"> document.ontouchmove = function(e){ e.preventDefault(); } </script><?php
	
	if(!get_field('gallery_is_portfolio')) : global $post; ?>
	
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.jplayer.min.js"></script>

	<script type="text/javascript">
		
		//<![CDATA[
		$(document).ready(function(){
		
			$("#jquery_jplayer_1").jPlayer({
				volume: 0.3,
				ready: function (event) {
					$(this).jPlayer("setMedia", {
						mp3:"<?php the_field('gallery_soundtrack') ?>",
					});
					$(this).jPlayer("play");
				},
				swfPath: "<?php bloginfo('stylesheet_directory'); ?>/js",
				supplied: "mp3",
				wmode: "window"
			});
			
			
			
		});
		//]]>
	</script>
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_directory'); ?>/css/jplayer.css" /><?php endif; }
	
	
	
 
	if(get_field('video')) {
	
	?><script src="<?php bloginfo('stylesheet_directory'); ?>/js/video.js" type="text/javascript"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/ready.js" type="text/javascript"></script><?php
	} 
	
	if(is_page('connect')) { include( 'inc/contact-page-map.php' ); }
	
	/* if(is_page('map-test') || ( 'mapgallery' == get_post_type() ) ) { include( 'map-header.php' ); } */ ?>

	<meta name="viewport" content="width=device-width, maximum-scale=1.0" />

	<?php wp_head();  
	
?></head>

<body <?php body_class(); ?> <?php if(is_page('map-test') || ( 'mapgallery' == get_post_type() ) ) {?>onload="load();"<?php } ?>>

	<div id="header">
	
		<h1>
			<a href="<?php bloginfo('home'); ?>"><?php 
	
				//Detect special conditions devices
				$iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
				$iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
				$iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
				if(stripos($_SERVER['HTTP_USER_AGENT'],"Android") && stripos($_SERVER['HTTP_USER_AGENT'],"mobile")){
				        $Android = true;
				}else if(stripos($_SERVER['HTTP_USER_AGENT'],"Android")){
				        $Android = false;
				        $AndroidTablet = true;
				}else{
				        $Android = false;
				        $AndroidTablet = false;
				}
				$webOS = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
				$BlackBerry = stripos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
				$RimTablet= stripos($_SERVER['HTTP_USER_AGENT'],"RIM Tablet");
				//do something with this information
				if( $iPod || $iPhone ){
				?> 
				<img style="display:block;" src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-dark.png" alt="<?php bloginfo( 'name' ); ?>" width="344" height="18" />
				
				<?php }else if($iPad){
				?> 
				<img style="display:block;" src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-dark.png" alt="<?php bloginfo( 'name' ); ?>" width="344" height="18" />
				
				<?php } else {  ?> 		
						<object data="<?php bloginfo('template_directory'); ?>/images/logo.svg" type="image/svg+xml" width="350" height="27" id="mySVGObject"></object>
				
				<?php } /*
				else if($Android){
				        //were an Android Phone -- do something here
				}else if($AndroidTablet){
				        //were an Android Phone -- do something here
				}else if($webOS){
				        //were a webOS device -- do something here
				}else if($BlackBerry){
				        //were a BlackBerry phone -- do something here
				}else if($RimTablet){
				        //were a RIM/BlackBerry Tablet -- do something here
				}
				*/
			
			?></a></h1>
	
		<?php if(is_home()) { ?><h2 class="flicktitle">Enter</h2><?php
				
				} elseif(is_archive() || ( 'post' == get_post_type() )) {
				
			?><h2 class="flicktitle enter"><?php if(get_field('menu_title')): the_field('menu_title'); else : echo 'Blog'; endif; ?></h2>
		<?php } elseif('gallery' == get_post_type()) { ?>
		
			<?php if(get_field('gallery_is_portfolio')) { ?> 

				<h2 class="flicktitle"><?php if(get_field('menu_title')) { ?><?php the_field('menu_title'); } else { the_title(); } ?></h2><?php

				 } else {  

				?><h2><?php if(get_field('menu_title')) { ?><?php the_field('menu_title'); } else { the_title(); } ?></h2><?php 
				
					}
				
				} else {
				
			?><h2 class="flicktitle"><?php the_title();?></h2>
		<?php } if(( 'gallery' == get_post_type()) && get_field('gallery_is_portfolio')) : wp_nav_menu(); elseif(is_home()) : wp_nav_menu(); elseif(is_page() || ( 'post' == get_post_type()) ) : wp_nav_menu(); endif;?>
		
	</div><!--/#header-->

