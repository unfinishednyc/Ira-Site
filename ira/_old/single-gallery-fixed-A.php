<?php get_header(); ?>


<div id="galleria">

	<?php
        
        $gallNum = "A";
 
        //shuffle($gallNum);
    
        //echo json_encode($gallNum[0]);
        
        $gallPull = "gallery_images_" . $gallNum;//[3];
        
        if (have_posts()) :while (have_posts()) :the_post();?>

	<?php 
        $counter = 0;
        while(the_repeater_field($gallPull)): ?>
		<a href="<?php the_sub_field('gallery_image'); ?>">
	  	<img alt="<?php if(the_sub_field('gallery_image_caption')) { the_sub_field('gallery_image_caption'); } else { the_title(); } ?>" src="<?php the_sub_field('gallery_image_thumb'); ?>">
		</a>;	
	<?php
        
        $counter++;
        endwhile; ?>
                
               
                
                
	
	
	<?php // Chris, Each group of 30 is in "gallery_images_A" , "gallery_images_B", "gallery_images_C", and "gallery_images_D"?>
	
	
	

	<?php endwhile; endif;
        
        //echo $counter;
        
       
 ?>
 
 <script language="javascript" type="text/javascript">
        var count = <?php echo $counter ?>
        </script>

	<!-- START TWO DEMO IMAGES, FOR TESTING -->
<!--  <a href="<?php bloginfo('stylesheet_directory'); ?>/images/gallery/Lippke003.jpg">
  	<img title="Title Goes Here"
  	     alt="Image Alt Goes Here"
  	     src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery/thumbs/Lippke003.jpg">
	</a>
  <a href="<?php bloginfo('stylesheet_directory'); ?>/images/gallery/por1.jpg">
  	<img title="Title Goes Here"
  	     alt="Image Alt Goes Here"
  	     src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery/por1-t.jpg">
	</a>-->
	<!-- END TWO DEMO IMAGES -->
	
	
	
	
</div>

	






<?php get_footer(); ?>

