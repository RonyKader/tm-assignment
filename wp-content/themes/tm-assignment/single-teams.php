<?php 

get_header();
?>
<section>
	<div class="teamarea">
		<div class="container">
			<div class="row">
				<header>
					This is Our Team
				</header>
				<?php 
				
					$memebers = latest_team_post( 'teams',3);
					if ( $memebers ) {
						foreach ($memebers as $post ) {
							setup_postdata( $post );
						?><div class="col-md-4"><?php
							the_title( '<h2>', '</h2>', true );
							?>
							<div class="single-member">
								<?php the_post_thumbnail( 'member', array( 'class'=>'responsive' ) ); ?>
									<div class="clearfix"></div>
								<div class="hov">
									<img class="responsive" src="<?php echo get_template_directory_uri(); ?>/images/speaker3.png" alt="">
								</div>
									<div class="custom-icon">
										<ul class="list-unstyled list-inline">
											<li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></i></a></li>
											<li><a href="http://www.twitter.co"><i class="fa fa-twitter"></i></a></li>
											<li><a href="http://www.gplus.com"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="http://www.pinterest.com"><i class="fa fa-pinterest-p"></i></a></li>
										</ul>
										<a href="<?php the_permalink() ;?>"><i class="fa fa-link"></i></a>
									</div>
								<!-- / .hov -->
							</div>
							<!-- / .single-member -->

					</div>
				<!-- / .col-md-4 -->

				<div class="col-md-8">
					<h2>
						Here is my All Information
					</h2>
					<table class="table">
						<tr>
							<td>
								Full Name :
							</td>
							<td>
								Md. Tarikul Islam 
							</td>
						</tr>
						<tr>
							<td>Designation</td>
							<td>WordPress Developer</td>
						</tr>
						<tr>
							<td>Company Name</td>
							<td>weDevs</td>
						</tr>
						<tr>
							<td>Email Address</td>
							<td>rony.ksr06@gmail.com</td>
						</tr>
						<tr>
							<td>PHone Number</td>
							<td>01911873186</td>
						</tr>
						<tr>
							<td>Web Url</td>
							<td>http://www.rony.w3zones.com</td>
						</tr>

					</table>
				</div>
							<?php
						}
					}


				 ?>			

			</div>
		</div>
	</div>
</section>

<?php
get_footer();

 ?>