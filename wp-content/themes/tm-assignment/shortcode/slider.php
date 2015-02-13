<?php 
add_shortcode( 'content', function( $attr, $content = null ) {

	$default = array(
		'lat' => '24.01667',
		'long' => '89.21667',
		'height' => '300',
		'width'  => '600'
 		);


	$data = shortcode_atts( $default, $attr );
	$map = '<img src="https://maps.googleapis.com/maps/api/staticmap?center=%f,%f&zoom=11&size=%dx%d">';

		return sprintf($map,$data[ 'lat' ],$data[ 'long' ],$data[ 'width' ],$data[ 'height' ] );

} 
);



add_shortcode( 'slider', function( $attr, $content = null ) {

	$default = array(
		'id' => '16',
		'height' => '30px',
		'width'  => '60px'
		);

	$data = shortcode_atts( $default, $attr );
	$image_ids = explode( ',',$data[ 'id' ] );
	ob_start();
?>
<section class="slider-area">
	  <div id="wrapper">
	    <!-- Slideshow 4 -->
	    <div class="callbacks_container">
	      <ul class="rslides" id="slider4">
				<?php					
					$show_image= '';	
					foreach ($image_ids as $image_id ) {
				    $full_image = wp_get_attachment_image_src( $image_id );

		            $rony = get_post( $image_id );
				     $image_stracture ='<img style="width: %d !important; height: %d !important;" src="%s" alt="images"/>';

						$show_image = sprintf( $image_stracture,$data['width'],$data['height'],$full_image[0]);						

						?><li>
						 <?php echo $show_image; ?>
						  <p class="caption"><?php echo $rony->post_excerpt; ?></p>
						</li><?php
					}

					?>

		      </ul>
		    </div>
	</div>
	</section>
	<?php
	$cont = ob_get_clean();
	return $cont;


} );


 ?>