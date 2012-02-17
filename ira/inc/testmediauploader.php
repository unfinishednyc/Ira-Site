<?php 


// Creates before and after post type
add_action('init', 'post_type_before_after');
function post_type_before_after()
{
  $labels = array(
    'name' => _x('Before and Afters', 'post type general name'),
    'singular_name' => _x('Before and After', 'post type singular name'),
    'add_new' => _x('Add New', 'before_and_after'),
    'add_new_item' => __('Add New Before and After')
 
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_position' => null,
    'supports' => array('title','excerpt, editor'));
 
  register_post_type('before_and_after',$args);
 
}



$prefix = 'sic_';
 
$meta_box = array(
	'id' => 'my-meta-box',
	'title' => 'Before and Afters',
	'page' => 'before_and_after',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => 'Before',
			'desc' => 'Select a Before Image',
			'id' => 'upload_image',
			'type' => 'text',
			'std' => ''
		),
				array(
			'name' => '',
			'desc' => 'Select an After Image',
			'id' => 'upload_image_button',
			'type' => 'button',
			'std' => 'Browse'
		),
	array(
			'name' => 'After',
			'desc' => 'Select an After Image',
			'id' => 'upload_image2',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => '',
			'desc' => '',
			'id' => 'upload_image_button2',
			'type' => 'button',
			'std' => 'Browse'
		),
	)
);
 
add_action('admin_menu', 'mytheme_add_box');
 
// Add meta box
function mytheme_add_box() {
	global $meta_box;
 
	add_meta_box($meta_box['id'], $meta_box['title'], 'mytheme_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}
 
// Callback function to show fields in meta box
function mytheme_show_box() {
	global $meta_box, $post;
 
	// Use nonce for verification
	echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
 
		echo '<tr>',
				'<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
		switch ($field['type']) {
 
 
 
 
//If Text		
			case 'text':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
					'<br />', $field['desc'];
				break;
 
 
//If Text Area			
			case 'textarea':
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
					'<br />', $field['desc'];
				break;
 
 
//If Button	
 
				case 'button':
				echo '<input type="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				break;
		}
		echo 	'<td>',
			'</tr>';
	}
 
	echo '</table>';
}
 
add_action('save_post', 'mytheme_save_data');
 
// Save data from meta box
function mytheme_save_data($post_id) {
	global $meta_box;
 
	// verify nonce
	if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
 
	foreach ($meta_box['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}
 
function my_admin_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('my-upload', get_bloginfo('template_url') . '/functions/my-script.js', array('jquery','media-upload','thickbox'));
wp_enqueue_script('my-upload');
}
function my_admin_styles() {
wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');























?>

