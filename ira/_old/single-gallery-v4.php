<?php get_header(); ?>


<div id="galleria">

	<?php if (have_posts()) :while (have_posts()) :the_post();?>

	<?php 
        while(the_repeater_field('gallery_images_A')): 
            $galImg = the_sub_field('gallery_image');
            if(the_sub_field('gallery_image_caption')) { $galCap = the_sub_field('gallery_image_caption'); } else { $galCap = the_title(); };
            $galThumb = the_sub_field('gallery_image_thumb');
		$gall_1[] = "<a href=" . $galImg . "><img alt=" . $galCap . " src=" . $galThumb . "></a>";	
	endwhile; ?>
                
               <?php 
               while(the_repeater_field('gallery_images_B')): 
            $galImg = the_sub_field('gallery_image');
            if(the_sub_field('gallery_image_caption')) { $galCap = the_sub_field('gallery_image_caption'); } else { $galCap = the_title(); };
            $galThumb = the_sub_field('gallery_image_thumb');
		$gall_2[] = "<a href=" . $galImg . "><img alt=" . $galCap . " src=" . $galThumb . "></a>";	
	endwhile; 
               ?>
                
                <?php 
                while(the_repeater_field('gallery_images_C')): 
            $galImg = the_sub_field('gallery_image');
            if(the_sub_field('gallery_image_caption')) { $galCap = the_sub_field('gallery_image_caption'); } else { $galCap = the_title(); };
            $galThumb = the_sub_field('gallery_image_thumb');
		$gall_3[] = "<a href=" . $galImg . "><img alt=" . $galCap . " src=" . $galThumb . "></a>";	
	endwhile; 
        ?>
                
                <?php 
                while(the_repeater_field('gallery_images_D')): 
            $galImg = the_sub_field('gallery_image');
            if(the_sub_field('gallery_image_caption')) { $galCap = the_sub_field('gallery_image_caption'); } else { $galCap = the_title(); };
            $galThumb = the_sub_field('gallery_image_thumb');
		$gall_4[] = "<a href=" . $galImg . "><img alt=" . $galCap . " src=" . $galThumb . "></a>";	
	endwhile; 
        ?>
                
                
	
	
	<?php // Chris, Each group of 30 is in "gallery_images_A" , "gallery_images_B", "gallery_images_C", and "gallery_images_D"?>
	
	
	

	<?php endwhile; endif;
                
 $rows[0]=$gall_1;
 $rows[1]=$gall_2;
 $rows[2]=$gall_3;
 $rows[3]=$gall_4;
 
// $rows = array_merge($gall_a, $gall_b, $gall_c, $gall_d);       
// shuffle($gall_a);
// $gallNum = array(1,2,3,4);
// 
// shuffle($gallNum);
// 
// $keyOne = $gallNum[0];
 
 
 
 //echo "$gall_" . $keyOne;
 
     

 ?>

	<!-- START TWO DEMO IMAGES, FOR TESTING -->
  <a href="<?php bloginfo('stylesheet_directory'); ?>/images/gallery/Lippke003.jpg">
  	<img title="Title Goes Here"
  	     alt="Image Alt Goes Here"
  	     src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery/thumbs/Lippke003.jpg">
	</a>
  <a href="<?php bloginfo('stylesheet_directory'); ?>/images/gallery/por1.jpg">
  	<img title="Title Goes Here"
  	     alt="Image Alt Goes Here"
  	     src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery/por1-t.jpg">
	</a>
	<!-- END TWO DEMO IMAGES -->
	
	
	
	
</div>

	






<?php get_footer(); ?>

