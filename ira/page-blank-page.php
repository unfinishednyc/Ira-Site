<div id="galleria">
       
        <?php
        $gallNum = range(A,D);
 
        shuffle($gallNum);
        
            $gallPull_1 = "gallery_images_" . $gallNum[0]; 
            $gallPull_2 = "gallery_images_" . $gallNum[1]; 
            $gallPull_3 = "gallery_images_" . $gallNum[2]; 
            $gallPull_4 = "gallery_images_" . $gallNum[3]; ?>
    

	<?php if (have_posts()) :while (have_posts()) : the_post();?>

	
	<?php while(the_repeater_field($gallPull_1)): ?>
		<a href="<?php the_sub_field('gallery_image'); ?>">
	  	<img alt="<?php if(the_sub_field('gallery_image_caption')) { the_sub_field('gallery_image_caption'); } else { the_title(); } ?>" src="<?php the_sub_field('gallery_image_thumb'); ?>">
		</a>	
	<?php endwhile; ?>
	              
	<?php while(the_repeater_field($gallPull_2)): ?>
		<a href="<?php the_sub_field('gallery_image'); ?>">
	  	<img alt="<?php if(the_sub_field('gallery_image_caption')) { the_sub_field('gallery_image_caption'); } else { the_title(); } ?>" src="<?php the_sub_field('gallery_image_thumb'); ?>">
		</a>	
	<?php endwhile; ?>
	              
	<?php while(the_repeater_field($gallPull_3)): ?>
		<a href="<?php the_sub_field('gallery_image'); ?>">
	  	<img alt="<?php if(the_sub_field('gallery_image_caption')) { the_sub_field('gallery_image_caption'); } else { the_title(); } ?>" src="<?php the_sub_field('gallery_image_thumb'); ?>">
		</a>	
	<?php endwhile; ?>
	              
	<?php while(the_repeater_field($gallPull_4)): ?>
		<a href="<?php the_sub_field('gallery_image'); ?>">
	  	<img alt="<?php if(the_sub_field('gallery_image_caption')) { the_sub_field('gallery_image_caption'); } else { the_title(); } ?>" src="<?php the_sub_field('gallery_image_thumb'); ?>">
		</a>	
	<?php endwhile; ?>
	

	<?php endwhile; endif; ?>

		
</div>