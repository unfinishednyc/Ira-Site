

<?php 

// WE DONT NEED TO CALL THE HEADER (OR FOOTER... SINCE WE'RE ONLY GETTING DATA WITH THIS SCRIPT

?>


<?php 

	// FOR TESTING, I'M USING POST # 188

        //$post_id = 182;
	$post_id = $_GET['postid']; // DECLARE  THIS, IF YOU WANT, PLACE CREATE A POST ID VARIABLE
	
//	$post_id_data = get_post($post_id, ARRAY_A);
//	$post_title 	= $post_id_data['post_title']; // POST'S TITLE
//
//  $post_author 	= get_field('map_gallery_name', $post_id); // POST'S ARTIST'S NAME
//  
//  $thumb_url 		= get_field('map_gallery_thumbnail', $post_id); // URL TO THUMB
//  
//  $summary			=	get_field('map_gallery_summary', $post_id); // URL TO THUMB
//
//  $gallery_cat	=	get_field('map_gallery_category', $post_id); // URL TO THUMB


?>
	


<?php // THIS SPITS OUT THE IMAGES ?>
<?php if(get_field('map_gallery_images_set', $post_id)): 

		while(the_repeater_field('map_gallery_images_set', $post_id)): 
                    //if(get_sub_field('map_gallery_image', $post_id)):
                        $img[] = get_sub_field('map_gallery_image'); 
                    //endif;
                    //if(get_sub_field('map_gallery_image', $post_id)):
                        $caption[] = get_sub_field('map_gallery_image_caption');
                    //endif;
        //$artist[] = get_sub_field('map_gallery_name', $post_id);
                        //$albTitle = the_title();
                $albArt = get_field('map_gallery_name',$post_id );
            $albTitle = get_the_title($post_id);
          $artist[] = "<div id='title'>" . $albTitle . "</div><div id='artist'>" . $albArt . "</div>";
                 
                endwhile; 
             //$img[] = "http://video-js.zencoder.com/oceans-clip.mp4?height=264&width=640";
            
              
 //            $albArt = get_field('map_gallery_name',$post_id );
            $albTitle = get_the_title($post_id);
          $artist[] = "<div id='title'>" . $albTitle . "</div><div id='artist'>" . $albArt . "</div>";
             //video size
             if(get_field('map_gallery_video',$post_id)):
                $img[] = get_field('map_gallery_video',$post_id)."?height=370&width=640";
             endif;
 endif; 
 
 $rows[img]=$img;
 $rows[cap]=$caption;
 $rows[art]=$artist;
 //$rows[vid]=$video;
 
 echo json_encode($rows);
 

 
//echo "<iframe src=http://player.vimeo.com/video/29774730?title=0&amp;byline=0&amp;portrait=0' width='400' height='225' frameborder='0' webkitAllowFullScreen allowFullScreen></iframe><p><a href='http://vimeo.com/29774730'>";


 ?>



<?php // I'm using the info here: http://codex.wordpress.org/Function_Reference/get_post as well as a custom plugin that lets me get custom fields, seen here: http://plugins.elliotcondon.com/advanced-custom-fields/documentation/get_field ... ?>


