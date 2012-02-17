<?php 

// WE DONT NEED TO CALL THE HEADER (OR FOOTER... SINCE WE'RE ONLY GETTING DATA WITH THIS SCRIPT

?>


<?php 

	// FOR TESTING, I'M USING POST # 188
	$post_id = 188; // DECLARE  THIS, IF YOU WANT, PLACE CREATE A POST ID VARIABLE
	
?>
	


<?php // THIS SPITS OUT THE IMAGES ?>
<?php if(get_field('map_gallery_images_set', $post_id)): ?>

		<?php while(the_repeater_field('map_gallery_images_set', $post_id)): ?>
        <img src="<?php the_sub_field('map_gallery_image'); ?>" alt="<?php the_sub_field('map_gallery_image_alt'); ?>" />
        <span class="caption"><?php the_sub_field('map_gallery_image_caption'); ?></span>
    <?php endwhile; ?>
 
<?php endif; ?>


<?php // I'm using the info here: http://codex.wordpress.org/Function_Reference/get_post � as well as a custom plugin that lets me get custom fields, seen here: http://plugins.elliotcondon.com/advanced-custom-fields/documentation/get_field ... ?>


