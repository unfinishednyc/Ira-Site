
			<ul>
				<li class="firstshare">
					<script>function fbs_click() {
						u=location.href;t=document.title;
						var left = (screen.width/2)-300;
						  var top = (screen.height/2)-210;
window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=600,height=420,top='+top+',left='+left); return false;}</script>
					<a rel="nofollow" href="http://www.facebook.com/share.php?u=<;url>" onclick="return fbs_click()" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-fb.gif" alt="icon-fb" width="19" height="19" /> Facebook</a></li>
				<li id="twitter-share-link"><a class="twitter popup" href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-twitter.gif" alt="icon-twitter" width="19" height="19" /> Twitter</a><input id="twitter-share-url" type="hidden" value='<?php the_permalink();?>' /><input id="twitter-share-status" type="hidden" value='<?php the_title();?>' /></li>
				<li class="trigger"><a href="#" onclick="return false;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-mail.gif" alt="icon-mail" width="19" height="19" /> Email</a></li>
				
				<div id="emailform" class="toggle_container bottom">
              
					<div id="form">  

						<div id="sendingMessage" class="statusMessage"><p>Please wait...</p></div>
						<div id="successMessage" class="statusMessage"><p>Thanks for sharing!<br/>A link to this gallery has been sent</p></div>
						<div id="failureMessage" class="statusMessage"><p>There was a problem. Please try again.</p></div>
						<div id="incompleteMessage" class="statusMessage"><p>Please complete all the fields in the form before sending.</p></div>

						<form id="contactForm" action="<?php bloginfo('template_directory'); ?>/inc/processForm.php" method="post">
				      <label for="senderName">Your Name</label>
				      	<input type="text" name="senderName" id="senderName" <?php /* placeholder="Your Name" */?>required="required" maxlength="50" />
				      <label for="senderEmail">Your Email</label>
					      <input type="email" name="senderEmail" id="senderEmail" <?php /* placeholder="Your Email"*/?> required="required" maxlength="50" />
				      <label for="friendName">Friend's Name</label>
				      <input type="text" name="friendName" id="friendName" <?php /* placeholder="Friend's Name"*/?> required="required" maxlength="50" />
				      <label for="friendEmail">Friend's Email</label>
				      <input type="email" name="friendEmail" id="friendEmail" <?php /* placeholder="Friend's Email"*/?> required="required" maxlength="50" />
				      <input type="hidden" name="link" id="link" value="<?php global $post; the_permalink();?>" />
						  <div id="formButtons">
						    <input type="submit" id="sendMessage" name="sendMessage" value="Send Email" />
						    <!-- <input type="button" id="cancel" name="cancel" value="Cancel" /> -->
						  </div>
						</form>

					</div><!--#form--> 
								
				</div>

				<li class="trigger lastshare"><a href="#" onclick="return false;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-link.gif" alt="icon-link" width="19" height="19" />Permalink</a></li>
				<div id="copylink" class="toggle_container">
					<textarea><?php the_permalink(); ?></textarea>
				</div> 
				
			</ul>

