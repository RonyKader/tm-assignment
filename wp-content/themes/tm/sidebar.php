<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package techMasters
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-md-3" style="background-color: #693;">
	<div id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #secondary -->
</div><!-- .con-md-3 -->
