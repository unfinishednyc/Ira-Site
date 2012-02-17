	<title><?php global $page, $paged;
	// Add the blog name
	bloginfo( 'name' );
	// Add the page name
	wp_title( '&mdash;', true, 'left' );
	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " &mdash; $site_description";
	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' &mdash; ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
?></title>

