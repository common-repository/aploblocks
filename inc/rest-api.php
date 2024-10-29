<?php
/**************************************************************************************
 * 
 * 	Registers a rest endpoint & callback
 * the callback function is provided a pattern id which then gets requested from the api
 * 
 **************************************************************************************/

if ( ! is_admin() ) {
    require_once( ABSPATH . 'wp-admin/includes/post.php' );
	require_once(ABSPATH . 'wp-admin/includes/file.php');
	require_once(ABSPATH . 'wp-admin/includes/media.php');
	require_once(ABSPATH . 'wp-admin/includes/image.php');
}


/*****************************************************************************************************
 * 
 * gets a pattern from the pattern api given a pattern id, uploads media if required and
 * returns the modified pattern to the editor
 * 
 ****************************************************************************************************/ 
function get_pattern( $data ) {
  
	$id = $data['id'];  

	$response = get_external_pattern($id);

	if (is_wp_error( $response )) {
		$result = array("resp" => "1", "message" => $response->get_error_message());
		return $result;
	} 

	$response_body = json_decode($response["body"]);
	$response_data = $response_body->content;

	// Get all the media urls from the pattern data 
	preg_match_all('#"https://aploblocks.com/wp-content/uploads/(\d{4})/(\d{2})/(.*?)"#', $response_data, $matches, PREG_OFFSET_CAPTURE);

	$image_array = array();
	foreach ($matches[0] as $match) {
		array_push($image_array, trim($match[0],'"'));
	}

	/* $image_array now contains a list of all the images in the pattern */
	/* loop to replace each image name with an image from the media library */
	$new_image ='';
	foreach (array_unique($image_array) as $image) {

		$image = trim($image,'"');
		
		$exists = post_exists( 'aploblocks-pattern-' . trim(basename($image),'"'), '', '', 'attachment' );
		if ($exists) {
			/* the image is already in the media library */
			global $wpdb;
			$query = "SELECT guid FROM {$wpdb->posts} WHERE id = '$exists'";
			$result = print_r($wpdb->get_var($query),true);
			$new_image = $result;
	
		} else {
			/* upload the image to the media library */
			$uploadResult = upload_image($image,"aploblocks-pattern-" . basename($image));

			if (is_wp_error( $uploadResult )) {
				$result = array("resp" => "2", "message" => $uploadResult->get_error_message());
				return $result;
			} 
			$new_image = $uploadResult[1];
		}
	
		// Replace the old pattern url with the new url
		$response_data = preg_replace('#'.$image.'#',$new_image,$response_data);

	}

	$result = array("pattern" => $response_data, "resp" => 0);
	return $result;
}

  
/*******************************************************************************************************
 * 
 * upload media if it doesn't exist already in the media library 
 * 
 *******************************************************************************************************/
 
function upload_image( $file, $description ) {

	$file_array  = [ 'name' => wp_basename( $file ), 'tmp_name' => download_url( $file ) ];
 
	// If error storing temporarily, return the error.
	if ( is_wp_error( $file_array['tmp_name'] ) ) {
		$err = (print_r($file_array['tmp_name'],true));
	 	return $file_array['tmp_name'];
	}
 
	$id = media_handle_sideload( $file_array, 0, $description );

	// If error storing permanently, unlink.
	if ( is_wp_error( $id ) ) {
	 @unlink( $file_array['tmp_name'] );
		return $id;
	}
 
	$value = wp_get_attachment_url( $id );

	return array($id,$value);
 }


/*********************************************************************************************************
* 
* Get a single pattern from the pattern api given an id of the pattern
*
**********************************************************************************************************/
 function get_external_pattern($id) {
	$api = 'https://aploblocks.com/wp-json/aplopatterns/v2/rawpattern';

	$response = wp_remote_get(
		add_query_arg(
			array(
				'version'     => APLOBLOCKS_PLUGIN_VERSION,
				'id'         => $id,
				'prolic' => '',
				'type' => ''

			),
			$api
		),
	array(
		'timeout' => 10,
		'headers' => array(
			'Accept' => 'application/json'
		)
	)
	);

	return($response);

 }


 /* add a route for the editor to request a pattern from the api */
 add_action( 'rest_api_init', function () {
	register_rest_route( 'aploblocks/v2', '/pattern', array(
	  'methods' => 'GET,POST',
	  'callback' => 'get_pattern',
	) );
  } );