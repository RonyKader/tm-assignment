<?php 
// Register Custom Post Type
function custom_teams_type() {

	$labels = array(
		'name'                => _x( 'Teams', 'Post Type General Name', 'tm_member' ),
		'singular_name'       => _x( 'Team', 'Post Type Singular Name', 'tm_member' ),
		'menu_name'           => __( 'Team Member', 'tm_member' ),
		'parent_item_colon'   => __( 'Parent Member', 'tm_member' ),
		'all_items'           => __( 'All Member', 'tm_member' ),
		'view_item'           => __( 'View Member', 'tm_member' ),
		'add_new_item'        => __( 'Add New Member', 'tm_member' ),
		'add_new'             => __( 'Add New Member', 'tm_member' ),
		'edit_item'           => __( 'Edit Member', 'tm_member' ),
		'update_item'         => __( 'Update Member', 'tm_member' ),
		'search_items'        => __( 'Search Team', 'tm_member' ),
		'not_found'           => __( 'Not found Member', 'tm_member' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'tm_member' ),
	);
	$args = array(
		'label'               => __( 'teams', 'tm_member' ),
		'description'         => __( 'Post Type Description', 'tm_member' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'thumbnail', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'teams', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_teams_type', 0 );


// Custom Post Query Function 
function latest_team_post( $post_type, $count ) {

	$new_param = array(
        "posts_per_page" => $count,
        "post_type" => $post_type,
        "orderby" => "ID",
        "order" => "DESC"      
		);

	$teams = get_posts( $new_param );
	return $teams;
}

function all_posts() {

	$rony= array();
	$posts = latest_team_post("teams",-1);
	foreach($posts as $p){
	    $rony[$p->ID]= $p->post_title;
	}
	return $rony;
}