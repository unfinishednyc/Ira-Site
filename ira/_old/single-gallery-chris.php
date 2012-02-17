<?php get_header(); ?>


<div id="galleria">

	<?php
        
        $gallNum = range(A,D);
 
        shuffle($gallNum);
    
        //echo json_encode($gallNum[0]);
        
        $gallPull = "gallery_images_" . $gallNum[3];
        
        if (have_posts()) :while (have_posts()) :the_post();?>

	<?php 
        $counter = 0;
        while(the_repeater_field($gallPull)): ?>
		<a href="<?php the_sub_field('gallery_image'); ?>">
	  	<img alt="<?php if(the_sub_field('gallery_image_caption')) { the_sub_field('gallery_image_caption'); } else { the_title(); } ?>" src="<?php the_sub_field('gallery_image_thumb'); ?>">
		</a>;	
	<?php
        
        $count = ++$counter;
        endwhile; ?>
                
               
                
                
	
	
	<?php // Chris, Each group of 30 is in "gallery_images_A" , "gallery_images_B", "gallery_images_C", and "gallery_images_D"?>
	
	
	

	<?php endwhile; endif;?>
        
        
      <script language="javascript" type="text/javascript">
        var count = <?php echo $count ?>
        </script>
</div>
<!--<div id="1">
    <?php
//        $gallNum = range(A,D);
// 
//        shuffle($gallNum);
//        
//            $gallPull_1 = "gallery_images_" . $gallNum[0]; 
             ?>
    

	<?php // if (have_posts()) :while (have_posts()) : the_post();?>

	
	<?php 
//         $counter = 0;
//        while(the_repeater_field($gallPull_1)): ?>
		<a href="<?php //the_sub_field('gallery_image'); ?>">
	  	<img alt="<?php //if(the_sub_field('gallery_image_caption')) { the_sub_field('gallery_image_caption'); } else { the_title(); } ?>" src="<?php the_sub_field('gallery_image_thumb'); ?>">
		</a>	
	<?php 
//         $count = ++$counter;
//        endwhile; ?>
    <?php //endwhile; endif; ?>
</div>-->

 

               <?php get_footer(); ?>   