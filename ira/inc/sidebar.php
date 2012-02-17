	<div class="col col2 sidebar bottom">
	
		<div class="widget">
			<h5>Categories</h5>
			<ul>
			<li class="cat-item cat-item-1">
				<a href="http://216.70.89.244/?catid=1" title="View all Blog Posts filed under Blog">All</a>
			</li>

			<?php wp_list_categories('orderby=name&title_li='); ?>
			 
			</ul>
		</div>
		<?php






 $args = array('post_type'=> 'sidebar', 'posts_per_page' => 100); query_posts( $args ); 

	if (have_posts()) : while (have_posts()) : the_post();
	
		if(get_field('sidebar_authors')): ?>


		<div class="widget">
			<h5>Authors</h5>
			<ul>


 
	    <?php while(the_repeater_field('sidebar_authors')): ?>
	    <li class="auth-item-<?php the_sub_field('sidebar_author_id'); ?>">
		    <a
					rel="<?php the_sub_field('sidebar_author_name'); ?>" 
					href="<?php the_sub_field('sidebar_author_name'); ?>"
					title="<?php the_sub_field('sidebar_author_name'); ?>">
					
		        <?php the_sub_field('sidebar_author_name'); ?>
		        
				</a>
			</li>
    <?php endwhile;
    
    	 ?></ul>
		</div>
		<?php
		
		endif; 
    
    		if(get_field('sidebar_tags')): 
   
		?><div class="widget">
			<h5>Keywords</h5>
			<ul>
 
	    <?php while(the_repeater_field('sidebar_tags')): ?>
		    <li class="tag-item-<?php the_sub_field('sidebar_tag_id'); ?>">
			    <a
						rel="<?php the_sub_field('sidebar_tag_name'); ?>" 
						href="<?php the_sub_field('sidebar_tag_name'); ?>"
						title="<?php the_sub_field('sidebar_tag_name'); ?>">
						
			        <?php the_sub_field('sidebar_tag_name'); ?>
			        
					</a>
				</li>
    <?php endwhile;
    
    	 ?></ul>
		</div><?php
    
		endif; endwhile; endif; wp_reset_query(); ?>
	
	</div>
