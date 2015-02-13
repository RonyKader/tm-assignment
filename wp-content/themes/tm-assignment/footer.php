<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package tm-project
 */
?>

	</div><!-- #content -->

<section>
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
					<footer id="colophon" class="site-footer" role="contentinfo">
						<div class="site-info">
							<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'tm' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'tm' ), 'WordPress' ); ?></a>
							<span class="sep"> | </span>
							<?php printf( __( 'Theme: %1$s by %2$s.', 'tm' ), 'tm-project', '<a href="http://rony.w3zones.com" rel="designer">Rony Kader (Md.Tarikul Islam)</a>' ); ?>
						</div><!-- .site-info -->
					</footer><!-- #colophon -->
					
				</div>
			</div>
		</div>
	</div>
</section>


</div><!-- #page -->
<script>
	// slider activation
	// You can also use "$(window).load(function() {"
	jQuery(function ($) {

	  // Slideshow 4
	  jQuery("#slider4").responsiveSlides({
	    auto: true,
	    pager: false,
	    nav: true,
	    speed: 500,
	    namespace: "callbacks",
	    before: function () {
	      jQuery('.events').append("<li>before event fired.</li>");
	    },
	    after: function () {
	      jQuery('.events').append("<li>after event fired.</li>");
	    }
	  });

	 
	});

</script>
<?php wp_footer(); ?>

</body>
</html>
