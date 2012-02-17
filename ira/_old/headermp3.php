<!DOCTYPE html>
<html>
<head>

<?php include('inc/the_page_title.php'); ?>

	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" />

<?php if(!is_page('press')) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_directory'); ?>/js/pp/css/prettyPhoto.css" />
	<? } elseif (( 'gallery' != get_post_type()) || ( 'post' != get_post_type())) { ?>	
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_directory'); ?>/js/pp/css/prettyPhoto-press.css" />
<? } ?>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<?php if(!is_page('press')) {?>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.prettyPhoto.js"></script>
	<? } else { ?>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.prettyPhoto.press.js"></script>
<? } ?>

<?php if(( 'gallery' == get_post_type() ) || is_home() || ( 'post' == get_post_type() )) { ?>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/galleria/galleria-1.2.5.js"></script>
	
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.jplayer.min.js"></script>

	<?php the_post(); ?>

	<?php if(the_field('gallery_soundtrack')) { ?>

		<script type="text/javascript">
			
			//<![CDATA[
			$(document).ready(function(){
			
				$("#jquery_jplayer_1").jPlayer({
					ready: function (event) {
						$(this).jPlayer("setMedia", {
							mp3:"<?php the_field('gallery_soundtrack') ?>",
						});
					},
					swfPath: "<?php bloginfo('stylesheet_directory'); ?>/js",
					supplied: "mp3",
					wmode: "window"
				});
			});
			//]]>
		</script>
		
		<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_directory'); ?>/css/jplayer.css" /> 
	
	<? } ?>

<? } ?>

<?php if(( 'gallery' == get_post_type() ) || is_home() ) { ?>
	<script type="text/javascript">
		document.ontouchmove = function(e){ e.preventDefault(); }
	</script>
<?php } ?>

	<script type="text/javascript" src="http://use.typekit.com/tox4tzn.js"></script>
	
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<?php if(is_page('studio')) {?>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/video.js" type="text/javascript"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/ready.js" type="text/javascript"></script>
<?php } ?>

<?php if(is_page('connect')) { include( 'inc/contact-page-map.php' ); } ?>

<?php if(is_page('map-test') || ( 'mapgallery' == get_post_type() ) ) { include( 'map-header.php' ); } ?>

<?php wp_head(); ?>

</head>




<body <?php body_class(); ?> <?php if(is_page('map-test') || ( 'mapgallery' == get_post_type() ) ) {?>onload="load();"<?php } ?>>

	<div id="header">
	
		<h1><a href="<?php bloginfo('home'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-<?php if(( is_page('263') )) { ?>map<?php } elseif( 'gallery' == get_post_type() ) { ?>light<?php } else { ?>dark<?php } ?>.png" alt="<?php bloginfo( 'name' ); ?>" width="344" height="18" /></a></h1>
	
		<?php if(is_home()) { ?><h2 class="flicktitle">Enter</h2>
		<?php } elseif(is_archive() || ( 'post' == get_post_type() )) { ?>
			<h2 class="flicktitle"><?php if(get_field('menu_title')): the_field('menu_title'); else : echo 'Blog'; endif; ?></h2>
		<?php } else { ?>
			<h2 class="flicktitle"><?php the_title();?></h2>
		<?php } ?>
		
		<?php wp_nav_menu(); ?>

			
	</div><!--/#header-->
<?php if(( 'gallery' == get_post_type() ) || is_home() || ( 'post' == get_post_type() )) { ?>
		<div id="flickholder"><span class="flicktitle2">Share</span></div>
		<div id="share" class="widget social">
			<ul>
				<li><a href="https://www.facebook.com/dialog/permissions.request?api_key=205013996178545&app_id=205013996178545&display=popup&fbconnect=1&locale=en_US&next=http%3A%2F%2Fstatic.ak.fbcdn.net%2Fconnect%2Fxd_proxy.php%3Fversion%3D3%23cb%3Df192b3c158%26origin%3Dhttp%253A%252F%252Fwww.nowness.com%252Ff1fdd93cb4%26relation%3Dopener%26transport%3Dpostmessage%26frame%3Df1cc63d8fc%26result%3D%2522xxRESULTTOKENxx%2522&perms=publish_stream%2Cemail&return_session=1&sdk=joey&session_version=3" class="popup"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-fb.gif" alt="icon-fb" width="19" height="19" /> Facebook</a></li>
				<li><a class="twitter popup" href="http://twitter.com/share?text=<?php the_title();echo "%20-%20";  the_permalink(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-twitter.gif" alt="icon-twitter" width="19" height="19" /> Twitter</a></li>

				<li class="trigger"><a href="#" onclick="return false;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-mail.gif" alt="icon-mail" width="19" height="19" /> Email</a></li>
					<div class="toggle_container">
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
                       <span class="btn-span"><input id="submitEmailToFriend" type="submit" class="comment-btn message-btn" value="Send" /></span>
                      </div>
                      <input id="ajaxRequest" name="ajaxRequest" type="hidden" value="true" />
                      <input id="subject" name="subject" type="hidden" value="{0}, have you seen the new NOWNESS?" />
                      <input id="id" name="id" type="hidden" value="1756" />
                      <input id="itemId" name="itemId" type="hidden" value="1721" />
                  </form>
                </div>
					</div>

				<li class="trigger"><a href="#" onclick="return false;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-link.gif" alt="icon-link" width="19" height="19" />Premalink</a></li>		
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

		<div id="jquery_jplayer_1" class="jp-jplayer"></div>
		<div id="jp_container_1" class="jp-audio">
			<a href="javascript:;" class="jp-play" tabindex="1">play</a><a href="javascript:;" class="jp-pause" tabindex="1">pause</a>
		</div>
		
<?php } ?>
