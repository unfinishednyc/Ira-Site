	<?php
        
         $gallNum = range(A,D);
 
        shuffle($gallNum);
    
        //echo json_encode($gallNum[0]);
        
        $gallPull = "gallery_images_" . $gallNum[0];
        
        if (have_posts()) :while (have_posts()) :the_post();?>

	<?php 
        $counter = 0;
        while(the_repeater_field($gallPull)): ?>
		<a href="<?php the_sub_field('gallery_image'); ?>">
	  	<img alt="<?php if(the_sub_field('gallery_image_caption')) { the_sub_field('gallery_image_caption'); } else { the_title(); } ?>" src="<?php the_sub_field('gallery_image_thumb'); ?>">
		</a>;	
	<?php
        
        $counter++;
        endwhile; 
        
        $link = "<a href=\"http://www.vectordiary.com/isd_premium/006-photorealistic-car/photorealistic-mustang-vector-car.jpg\"><img src=\"http://www.vectordiary.com/isd_premium/006-photorealistic-car/photorealistic-mustang-vector-car.jpg\">";
        $link2 = "<a href=\"http://www.mrcleancarwash.com/common/images/blue_car.png\"><img src=\"http://www.mrcleancarwash.com/common/images/blue_car.png\">";
        echo $link;
        echo $link2;
        ?>
            
                
               
                
                
	
	
	<?php // Chris, Each group of 30 is in "gallery_images_A" , "gallery_images_B", "gallery_images_C", and "gallery_images_D"?>
	
	
	

	<?php endwhile; endif;
        
       
        
       
 ?>


	





