<?php

function custom_loginpage_logo_link($url)
{
return get_bloginfo('wpurl');
}
add_filter("login_headerurl","custom_loginpage_logo_link");

/* Change WordPress dashboard CSS */
function custom_admin_styles() {
    echo '<style type="text/css">ENTER CSS HERE</style>';
}
add_action('admin_head', 'custom_admin_styles');


// Remove BackWPUp from the Admin Bar
function mytheme_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('backwpup');
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );


// FOR THE SPECIAL FEATURES on Advanced Custom Fields
update_option('acf_flexible_content_ac', 'FC9O-H6VN-E4CL-LT33');

// Remove Wordpress' jQuery and l10n file, except for admins

if( !is_admin()){
	wp_deregister_script('jquery');
	wp_deregister_script( 'l10n' );
}
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Ajax Post reloading scripts
	 
function jpb_template_redirect(){
  if( is_single() ){
    wp_enqueue_script( 'random-loop', get_bloginfo('template_directory') . '/js/refresh.js', array( 'jquery' ), '1.0' );
  }
}

function jpb_random_loop_cb(){
			query_posts( 'cat=1&posts_per_page=6&orderby=rand' ); while (have_posts()) : the_post(); ?>

				<li>
					<a href="<?php the_permalink(); ?>" title="Click to Read Post"><img src="<?php the_field('post_thumbnail'); ?>" alt="<?php the_title(); ?>" width="210" height="210"/></a>
					<h5><a href="<?php the_permalink(); ?>" title="Click to Read Post"><?php the_field('post_short_title'); ?></a></h5>
					<p><a href="<?php the_permalink(); ?>" title="Click to Read Post"><?php the_field('post_short_summary'); ?></a></p>
				</li>
				
			<?php endwhile; wp_reset_query();
  die();
}

add_action( 'template_redirect', 'jpb_template_redirect' );
add_action( 'wp_ajax_jpb_random_loop', 'jpb_random_loop_cb' );
add_action( 'wp_ajax_nopriv_jpb_random_loop', 'jpb_random_loop_cb' );














//
// Gallery Custom Post Type
//
register_post_type('gallery', array(	'label' => 'Galleries','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'supports' => array('title','editor'),'labels' => array (
  'name' => 'Galleries',
  'singular_name' => 'Gallery',
  'menu_name' => 'Galleries',
  'add_new' => 'Add Gallery',
  'add_new_item' => 'Add New Gallery',
  'edit' => 'Edit',
  'edit_item' => 'Edit Gallery',
  'new_item' => 'New Gallery',
  'view' => 'View Gallery',
  'view_item' => 'View Gallery',
  'search_items' => 'Search Galleries',
  'not_found' => 'No Galleries Found',
  'not_found_in_trash' => 'No Galleries Found in Trash',
  'parent' => 'Parent Gallery',
),) );

//
// Map Gallery Custom Post Type
//
register_post_type('mapgallery', array(	'label' => 'Galleries','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'labels' => array (
  'name' => 'Map Galleries',
  'singular_name' => 'Map Gallery',
  'menu_name' => 'Locations',
  'add_new' => 'Add Map Gallery',
  'add_new_item' => 'Add New Map Gallery',
  'edit' => 'Edit',
  'edit_item' => 'Edit Map Gallery',
  'new_item' => 'New Map Gallery',
  'view' => 'View Map Gallery',
  'view_item' => 'View Map Gallery',
  'search_items' => 'Search Map Galleries',
  'not_found' => 'No Map Galleries Found',
  'not_found_in_trash' => 'No Map Galleries Found in Trash',
  'parent' => 'Parent Map Gallery',
),) );

register_post_type('press', array(	'label' => 'Press','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'press'),'query_var' => true,'labels' => array (
  'name' => 'Press Clippings',
  'singular_name' => 'Press Clipping',
  'menu_name' => 'Press',
  'add_new' => 'Add Press Clipping',
  'add_new_item' => 'Add New Press Clipping',
  'edit' => 'Edit',
  'edit_item' => 'Edit Press Clipping',
  'new_item' => 'New Press Clipping',
  'view' => 'View Press Clipping',
  'view_item' => 'View Press Clipping',
  'search_items' => 'Search Press',
  'not_found' => 'No Press Found',
  'not_found_in_trash' => 'No Press Found in Trash',
  'parent' => 'Parent Press Clipping',
),) );

register_post_type('sidebar', array(	'label' => 'Sidebar','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'sidebar'),'query_var' => true,'labels' => array (
  'name' => 'Sidebars',
  'singular_name' => 'Sidebar',
  'menu_name' => 'Sidebars',
  'add_new' => 'Add Sidebar',
  'add_new_item' => 'Add New Sidebar',
  'edit' => 'Edit',
  'edit_item' => 'Edit Sidebar',
  'new_item' => 'New Sidebar',
  'view' => 'View Sidebar',
  'view_item' => 'View Sidebar',
  'search_items' => 'Search Sidebars',
  'not_found' => 'No Sidebar Found',
  'not_found_in_trash' => 'No Sidebar Found in Trash',
  'parent' => 'Parent Sidebar',
),) );


// Add Custom Menus

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'header_menu' => 'Navigation Menu below logo.',
		)
	);
}

// Add Custom Widgets
if ( function_exists('register_sidebar') )
    register_sidebar();




// ADD SLUG TO BODY_CLASS();

function add_body_class( $classes )
{
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'add_body_class' );

// REMOVE THE WORDPRESS UPDATE NOTIFICATION FOR ALL USERS EXCEPT SYSADMIN
       global $user_login;
       get_currentuserinfo();
       if (!current_user_can('update_plugins')) { // checks to see if current user can update plugins 
        add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
        add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
       }
       
// CUSTOMIZE ADMIN MENU ORDER
function custom_menu_order($menu_ord) {
  if (!$menu_ord) return true;
   	return array(
    'index.php', 
    'edit.php', 
    'edit.php?post_type=gallery',
    'edit.php?post_type=mapgallery', 
    'edit.php?post_type=press', 
		'edit.php?post_type=page',
		'edit.php?post_type=sidebar',
	);
}
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');

// CUSTOMIZE EXCERPT LENGTH
function new_excerpt_length($length) { 
    return 73;
}
add_filter('excerpt_length', 'new_excerpt_length');   



function replace_excerpt($content) {
       return str_replace('[...]',
               '<a class="readmore" href="'. get_permalink() .'">Read More <img src="' . get_bloginfo('template_directory') .'/images/icon-tiny-next.gif" alt="Newer Posts" /></a>',
               $content
       );
}
add_filter('the_excerpt', 'replace_excerpt');


// remove unncessary header info
function remove_header_info() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'adjacent_posts_rel_link');
}
add_action('init', 'remove_header_info');

// remove extra css that recent comments widget injects
function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'remove_recent_comments_style');


// customize admin footer text
function custom_admin_footer() {
        echo 'by <a href="http://unfinished.com">Unfinished.</a>';
} 
add_filter('admin_footer_text', 'custom_admin_footer');


function keep_me_logged_in_for_1_year( $expirein ) {
   return 31556926; // 1 year in seconds
}
add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_1_year' );


add_filter('gettext', 'change_howdy', 10, 3);

function change_howdy($translated, $text, $domain) {

    if (!is_admin() || 'default' != $domain)
        return $translated;

    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Welcome', $translated);

    return $translated;
}


// make TinyMCE allow iframes
add_filter('tiny_mce_before_init', create_function( '$a',
'$a["extended_valid_elements"] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]"; return $a;') );



/* Clean up the admin sidebar navigation *************************************************/
function remove_admin_menu_items() {
  $remove_menu_items = array(__('Links'), __('Comments'), __('Appearance'), __('Tools'));
  global $menu;
  end ($menu);
  while (prev($menu)){
    $item = explode(' ',$menu[key($menu)][0]);
    if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
      unset($menu[key($menu)]);}
    }
  }
add_action('admin_menu', 'remove_admin_menu_items');


// hook the translation filters
add_filter('gettext','change_post_to_article');
add_filter('ngettext','change_post_to_article');

function change_post_to_article( $translated ) {
$translated = str_ireplace('Post','Blog Post',$translated );// ireplace is PHP5 only
return $translated;
}

// Add all custom post types to the "Right Now" box on the Dashboard
add_action( 'right_now_content_table_end' , 'ucc_right_now_content_table_end' );

function ucc_right_now_content_table_end() {
  $args = array(
    'public' => true ,
    '_builtin' => false
  );
  $output = 'object';
  $operator = 'and';

  $post_types = get_post_types( $args , $output , $operator );

  foreach( $post_types as $post_type ) {
    $num_posts = wp_count_posts( $post_type->name );
    $num = number_format_i18n( $num_posts->publish );
    $text = _n( $post_type->labels->singular_name, $post_type->labels->name , intval( $num_posts->publish ) );
    if ( current_user_can( 'edit_posts' ) ) {
      $num = "<a href='edit.php?post_type=$post_type->name'>$num</a>";
      $text = "<a href='edit.php?post_type=$post_type->name'>$text</a>";
    }
    echo '<tr><td class="first b b-' . $post_type->name . '">' . $num . '</td>';
    echo '<td class="t ' . $post_type->name . '">' . $text . '</td></tr>';
  }

}