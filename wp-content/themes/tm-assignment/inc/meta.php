<?php 

add_filter( 'cmb2_meta_boxes', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb2_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_tm_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['team_meatabox'] = array(
		'id'            => 'team_meatabox',
		'title'         => __( 'Write Your Bio Info Here', 'cmb2' ),
		'object_types'  => array( 'teams', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		'fields'        => array(
			array(
				'name'       => __( 'Upload Your Hover Image', 'tm' ),
				'desc'       => __( 'Please Upload Your hover Image ', 'tm' ),
				'id'         => $prefix . 'file_large',
				'type'       => 'file',
				'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
				// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
				// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
				// 'on_front'        => false, // Optionally designate a field to wp-admin only
				// 'repeatable'      => true,
			),
			array(
				'name'       => __( 'Full Name :', 'tm' ),
				'desc'       => __( 'Write your offcial Name ', 'tm' ),
				'id'         => $prefix . 'fullname',
				'type'       => 'text',
				'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
				// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
				// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
				// 'on_front'        => false, // Optionally designate a field to wp-admin only
				// 'repeatable'      => true,
			),
			array(
				'name' => __( 'Designation', 'tm' ),
				'desc' => __( 'Write your Designation', 'tm' ),
				'id'   => $prefix . 'designation',
				'type' => 'text',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Email Address', 'tm' ),
				'desc' => __( 'Write your Email Address', 'tm' ),
				'id'   => $prefix . 'email',
				'type' => 'text_email',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Phone Number', 'tm' ),
				'desc' => __( 'Write your phone number', 'tm' ),
				'id'   => $prefix . 'phone',
				'type' => 'text',
				// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Company Name', 'tm' ),
				'desc' => __( 'Write your company Name', 'tm' ),
				'id'   => $prefix . 'company',
				'type' => 'text',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Website ', 'tm' ),
				'desc' => __( 'Write your website url', 'tm' ),
				'id'   => $prefix . 'url',
				'type' => 'text_url',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Facebook Address ', 'tm' ),
				'desc' => __( 'Write your Facebook Username', 'tm' ),
				'id'   => $prefix . 'facebook',
				'type' => 'text',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Twitter Address ', 'tm' ),
				'desc' => __( 'Write your twitter Username', 'tm' ),
				'id'   => $prefix . 'twitter',
				'type' => 'text_url',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Google Pluse : ', 'tm' ),
				'desc' => __( 'Write your google Pluse Username', 'tm' ),
				'id'   => $prefix . 'googlepluse',
				'type' => 'text_url',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Pinterest Address : ', 'tm' ),
				'desc' => __( 'Write your pinterest Username', 'tm' ),
				'id'   => $prefix . 'pinterest',
				'type' => 'text',
				// 'repeatable' => true,
			),
		),
	);

	
	/**
	 * Repeatable Field Groups
	 */
	$meta_boxes['repeat_metabox'] = array(
		'id'            => 'repeat_metabox',
		'title'         => __( 'Select your Memeber From Here', 'tm' ),
		'object_types'  => array( 'page' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		'fields'        => array(
			array(
				'name'        => __( 'Select Your Member', 'tm' ),
                'id'          => $prefix . 'ronypost',
                'type'        => 'select',
                'options'	  =>'all_posts',		             
				'repeatable'  => true 
			)
			)
		);

		// Add other metaboxes as needed

	return $meta_boxes;
}



 ?>