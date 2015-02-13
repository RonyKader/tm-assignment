<?php
/**
 * @package tm-project
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php tm_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

		<?php
			$query_post = get_post_meta( get_the_ID(), '_tm_ronypost', true );
			foreach ($query_post as $key => $id) {
				    $var_id = get_post( $id ) ;
					setup_postdata( $var_id );
					?>
					<div class="col-md-4">			
					<h2>
						<?php echo get_the_title( $id ); ?>
					</h2>

			        <?php echo get_the_post_thumbnail( $id,'member');?>

			        </div>
			        <?php

			wp_reset_postdata();
			}		
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php tm_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->