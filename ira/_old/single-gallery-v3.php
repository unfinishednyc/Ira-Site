<?php
/*
Template Name: Gallery Templates
 */
?>

<?php get_header(); ?>


<div id="galleria">

<?php if (have_posts()) :while (have_posts()) : the_post();?>


<?php while(the_repeater_field('gallery_images_A')):
		$gall_a[] =  ?><a href="<?php the_sub_field('gallery_image'); ?>">
	  	<img alt="<?php if(the_sub_field('gallery_image_caption')) { the_sub_field('gallery_image_caption'); } else { the_title(); } ?>" src="<?php the_sub_field('gallery_image_thumb'); ?>">
		</a><?php ;	
	 endwhile; ?>
                
<?php while(the_repeater_field('gallery_images_B')): 
		$gall_b[] = ?><a href="<?php the_sub_field('gallery_image'); ?>">
	  	<img alt="<?php if(the_sub_field('gallery_image_caption')) { the_sub_field('gallery_image_caption'); } else { the_title(); } ?>" src="<?php the_sub_field('gallery_image_thumb'); ?>">
		</a><?php ;	
	endwhile; ?>
                
                <?php while(the_repeater_field('gallery_images_C')): 
		$gall_c[] = ?><a href="<?php the_sub_field('gallery_image'); ?>">
	  	<img alt="<?php if(the_sub_field('gallery_image_caption')) { the_sub_field('gallery_image_caption'); } else { the_title(); } ?>" src="<?php the_sub_field('gallery_image_thumb'); ?>">
		</a><?php ;	
	endwhile; ?>
                
                <?php while(the_repeater_field('gallery_images_D')):
		$gall_d[] =  ?><a href="<?php the_sub_field('gallery_image'); ?>">
	  	<img alt="<?php if(the_sub_field('gallery_image_caption')) { the_sub_field('gallery_image_caption'); } else { the_title(); } ?>" src="<?php the_sub_field('gallery_image_thumb'); ?>">
		</a><?php ;	
	 endwhile; ?>


	<?php endwhile; endif;
                
	 $rows[a]=$gall_a;
	 $rows[b]=$gall_b;
	 $rows[c]=$gall_c;
	 $rows[d]=$gall_d;

	echo $rows; ?>

		
</div>



	
<?php get_footer(); ?>

