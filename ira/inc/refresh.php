			<ul>
			<?php require_once('../../../../wp-blog-header.php');
			
				if($_GET["catid"]) : $category = $_GET["catid"]; 

				query_posts( 'posts_per_page=-1&cat=' . $category ); while (have_posts()) : the_post(); ?>

				<li>
					<a href="<?php the_permalink(); ?>" title="Click to Read Post"><img src="<?php the_field('post_thumbnail'); ?>" alt="<?php the_title(); ?>" width="156" height="156"/></a>
					<h5><a href="<?php the_permalink(); ?>" title="Click to Read Post"><?php the_field('post_short_title'); ?></a></h5>
					<p><a href="<?php the_permalink(); ?>" title="Click to Read Post"><?php the_field('post_short_summary'); ?></a></p>
				</li>
				
				
			<?php endwhile; endif; ?>
			
			
			




			<?php if($_GET["authid"]) : $author = $_GET["authid"]; 

				query_posts( 'posts_per_page=-1&author=' . $author ); while (have_posts()) : the_post(); ?>

				<li>
					<a href="<?php the_permalink(); ?>" title="Click to Read Post"><img src="<?php the_field('post_thumbnail'); ?>" alt="<?php the_title(); ?>" width="156" height="156"/></a>
					<h5><a href="<?php the_permalink(); ?>" title="Click to Read Post"><?php the_field('post_short_title'); ?></a></h5>
					<p><a href="<?php the_permalink(); ?>" title="Click to Read Post"><?php the_field('post_short_summary'); ?></a></p>
				</li>
				
				
			<?php endwhile; endif; ?>




			<?php if($_GET["tagid"]) : $tag = $_GET["tagid"]; 

				query_posts( 'posts_per_page=-1&tag=' . $tag ); while (have_posts()) : the_post(); ?>

				<li>
					<a href="<?php the_permalink(); ?>" title="Click to Read Post"><img src="<?php the_field('post_thumbnail'); ?>" alt="<?php the_title(); ?>" width="156" height="156"/></a>
					<h5><a href="<?php the_permalink(); ?>" title="Click to Read Post"><?php the_field('post_short_title'); ?></a></h5>
					<p><a href="<?php the_permalink(); ?>" title="Click to Read Post"><?php the_field('post_short_summary'); ?></a></p>
				</li>
				
				
			<?php endwhile; endif; ?>







				<script type="text/javascript">
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
						

						
					});
				</script>
			
			
			
			
			<?php wp_reset_query(); ?>

			</ul>
			