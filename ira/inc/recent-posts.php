		<div id="refresh" class="recent col col4 first">
		 <h4>Recent Posts</h4>
			<ul>

			<?php query_posts( 'cat=1&posts_per_page=6' ); while (have_posts()) : the_post(); ?>

				<li>
					<a href="<?php the_permalink(); ?>" title="Click to Read Post"><img src="<?php the_field('post_thumbnail'); ?>" alt="<?php the_title(); ?>" width="210" height="210"/></a>
					<h5><a href="<?php the_permalink(); ?>" title="Click to Read Post"><?php the_field('post_short_title'); ?></a></h5>
					<p><a href="<?php the_permalink(); ?>" title="Click to Read Post"><?php the_field('post_short_summary'); ?></a></p>
				</li>
				
			<?php endwhile; wp_reset_query(); ?>

			</ul>
		</div><!--/.recent -->
