<?php 
/**
 * Template Name: Repeat Page
 */

get_header(); ?>


				<section>
					<div class="teamarea">
					<div class="container">
						<div class="row">
						<div class="col-md-12">							

							<?php while(have_posts()){
							               the_post(); ?>
								<header>
									This is Our Team
								</header>       

								
								<?php 			}
								
									$query_post = get_post_meta( get_the_ID(), '_tm_ronypost', true );
									foreach ($query_post as $key => $id) {
										    $var_id = get_post( $id ) ;
											setup_postdata( $var_id );
							
											//social list
											$facebook    = get_post_meta( $id, '_tm_facebook', true );
											$twitter     = get_post_meta( $id, '_tm_twitter', true );
											$googleplus  = get_post_meta( $id, '_tm_googlepluse', true );
											$pinterest   = get_post_meta( $id, '_tm_pinterest', true ); 
											//info list 
											$fullname    = get_post_meta( $id, '_tm_fullname', true );
											$designation = get_post_meta( $id, '_tm_designation', true );
											$email       = get_post_meta( $id, '_tm_email', true );
											$phone       = get_post_meta( $id, '_tm_phone', true );
											$company     = get_post_meta( $id, '_tm_company', true );
											$url         = get_post_meta( $id, '_tm_url', true );

											$hov_meta    = get_post_meta( $id, '_tm_file_large_id', true );
											$attachment  = wp_get_attachment_image_src( $hov_meta,'member_hov',true );

										

								           ?><div class="col-md-4"><?php
								           ?>
								           <h2>
											<?php echo get_the_title($id);?>
											</h2>
										
											<div class="single-member">
												<?php echo get_the_post_thumbnail( $id,'member', array( 'class'=>'responsive' ) ); ?>
													<div class="clearfix"></div>
												<div class="hov">
												<?php if ( $hov_meta ): ?>
													<img class="responsive" src="<?php echo $attachment[0];?>" alt="">									
												<?php endif ?>
												</div>
													<div class="custom-icon">
													<?php if ( !empty( $facebook ) ): ?>
														<ul class="list-unstyled list-inline">
														<?php if ( $facebook ): ?>
															<li><a href="https://www.facebook.com/<?php echo $facebook; ?>"><i class="fa fa-facebook"></i></a></li>											
														<?php endif ?>
														<?php if ( $twitter ): ?>
															<li><a href="https://www.twitter.com/<?php echo $twitter ;?>"><i class="fa fa-twitter"></i></a></li>											
														<?php endif ?>
														<?php if ( $googleplus ): ?>
															<li><a href="<?php echo $googleplus ;?>"><i class="fa fa-google-plus"></i></a></li>											
														<?php endif ?>
														<?php if ( $pinterest ): ?>
															<li><a href="https://www.pinterest.com/<?php echo $pinterest;?>"><i class="fa fa-pinterest-p"></i></a></li>											
														<?php endif ?>
														</ul>

													<?php endif ?>
														<a data-toggle="modal" href="#myModal-<?php echo $var_id->ID;?>"><i class="fa fa-link"></i></a>
										
													</div>
												<!-- / .hov -->
											</div>
											<!-- / .single-member -->
								</div>
								<!-- / .col-md-4 -->		
								<!-- Modal -->
								<div class="modal fade" id="myModal-<?php echo $var_id->ID;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Here is My All Information</h4>
								      </div>
								      <div class="modal-body">

											<div id="post-<?php echo $var_id->ID; ?>" <?php post_class(); ?>>

												<h2>
													<?php echo get_the_title( $id ); ?>
												</h2>
												<?php echo get_the_post_thumbnail( $id ); ?>


											<table class="table table-striped">
												<tr>
												<?php if ( $fullname ): ?>
													<td>Full Name :</td>
													<td><?php echo $fullname; ?></td>									
												<?php endif ?>
												</tr>
												<tr>
												<?php if ( $designation ): ?>
													<td>Designation :</td>
													<td><?php echo $designation; ?></td>									
												<?php endif ?>
												</tr>
												<tr>
												<?php if ( $email ): ?>
													<td>Email Address</td>
													<td><?php echo $email; ?></td>									
												<?php endif ?>
												</tr>
												<tr>
												<?php if ( $phone ): ?>
													<td>Phone Number</td>
													<td><?php echo $phone; ?></td>									
												<?php endif ?>
												</tr>
												<tr>
												<?php if ( $company ): ?>
													<td>Company Name</td>
													<td><?php echo $company ?></td>									
												<?php endif ?>
												</tr>
												<tr>
												<?php if ( $url ): ?>
													<td>Web Url</td>
													<td><?php echo $url ?></td>									
												<?php endif ?>
												</tr>
											</table>

										</div>


								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  
								      </div>
								    </div>
								  </div>
								</div>
					
								<?php } 	?>				

							</div>
						</div>
					</div>
				</section>						
								
				</div>

				</div>


	</div><!-- #primary -->

<?php get_footer(); ?>
