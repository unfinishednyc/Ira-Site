<?php 

// WE DONT NEED TO CALL THE HEADER (OR FOOTER... SINCE WE'RE ONLY GETTING DATA WITH THIS SCRIPT

?>


<?php 

	// FOR TESTING, I'M USING POST # 188
	$post_id = $_GET['postid']; // DECLARE  THIS, IF YOU WANT, PLACE CREATE A POST ID VARIABLE
	
	$post_id_data = get_post($post_id, ARRAY_A);
	$post_title 	= $post_id_data['post_title']; // POST'S TITLE

  $post_author 	= get_field('map_gallery_name', $post_id); // POST'S ARTIST'S NAME
  
  $thumb_url 		= get_field('map_gallery_thumbnail', $post_id); // URL TO THUMB
  
  $summary			=	get_field('map_gallery_summary', $post_id); // URL TO THUMB

  $gallery_cat	=	get_field('map_gallery_category', $post_id); // URL TO THUMB


?>
	


<?php // THIS SPITS OUT THE IMAGES ?>
<?php if(get_field('map_gallery_images_set', $post_id)): ?>

		<?php while(the_repeater_field('map_gallery_images_set', $post_id)): ?>
        <img src="<?php the_sub_field('map_gallery_image'); ?>" alt="<?php the_sub_field('map_gallery_image_alt'); ?>" />
        
    <?php endwhile; ?>
 
<?php endif; ?>


<?php // I'm using the info here: http://codex.wordpress.org/Function_Reference/get_post � as well as a custom plugin that lets me get custom fields, seen here: http://plugins.elliotcondon.com/advanced-custom-fields/documentation/get_field ... ?>


