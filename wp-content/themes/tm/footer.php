<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package techMasters
 */
?>

			</div><!-- #content -->
		</div><!-- .row -->
		<div class="row">
			<div class="col-md-12" style="background-color: #dd0;">
				<footer id="colophon" class="site-footer" role="contentinfo">
					<div class="site-info">
						<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'tm' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'tm' ), 'WordPress' ); ?></a>
						<span class="sep"> | </span>
						<?php printf( __( 'Theme: %1$s by %2$s.', 'tm' ), 'techMasters', '<a href="http://underscores.me/" rel="designer">Munna Khan</a>' ); ?>
					</div><!-- .site-info -->
				</footer><!-- #colophon -->
			</div><!-- .con-md-12 -->
		</div><!-- .row -->
	</div><!-- #page -->
</div><!-- .container -->

<?php wp_footer(); ?>

</body>
</html>
