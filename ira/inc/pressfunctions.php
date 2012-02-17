<?php 
//
// Press Custom Post Type
//
register_post_type('press', array(	'label' => 'Press','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'press'),'query_var' => true,'labels' => array (
  'name' => 'Press',
  'singular_name' => 'Press Clipping',
  'menu_name' => 'Press Clippings',
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






?>

