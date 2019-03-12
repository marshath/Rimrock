<?php
/*
 Template Name: Home page
*/
?>

<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap">

					<main id="main" class="home-wrap" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'splash' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<header class="article-header">
								<h1 class="page-title"><?php the_title(); ?></h1>
							</header>

							<section class="entry-content" itemprop="articleBody">
								<div class="splash-band">Neutron Dawn</div>
								<div class="splash-album">Rimrock</div>
								<div class="splash-cta">Now available
									<div class="btn-cta"><a href="">Download Rimrock</a></div>
								</div>
								<div class="splash-spiral"><img src="http://localhost:5757/neutrondawn.com/library/images/splash_spiral.svg" alt="spiral graphic"></div>
							</section>

						</article>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'main-wrap home-videos' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								
							<header>
								<h3>Videos</h3>
								<div class="home-btns"><a href="/videos/" class="btn">View all videos</a></div>
							</header>

							<section class="entry-content" itemprop="articleBody">
								
								<?php // new query on videos page
			
									$vids = new WP_Query('page_id=14');
																		
									if ( $vids->have_posts() ) : $vids->the_post();
									
										// check if the repeater field has rows of data
										if( have_rows('video') ):
									
										echo '<div class="video">';
										
										 	// loop through the rows of data
										 	while ( have_rows('video') ) : the_row();
										 		// counter to break loop
										 		$i++;
										 		if( $i > 3 ): 
													break;
												endif;
										
												// display videos
										
												echo '<div class="video-wrap">
													<a href="video-link">
												
														<div class="video-cover">
															<figure><img src="', the_sub_field('video_image'), '" alt=""></figure>
															</figure>
														</div>
														
														<div class="video-info">
														
															<h3 class="video-title">', the_sub_field('video_title'), '</h3>
															
															<div class="video-details">
																<span class="video-year">', the_sub_field('video_year'), '</span> • <span class="video-duration">', the_sub_field('video_duration'), ' min</span>
															</div>
														
														</div>
													</a>
												</div>';
										
										endwhile;
									
										echo '</div>';
										
										endif;
									
									endif;
									wp_reset_postdata()
								?>
							</section>

						</article>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'main-wrap home-photos' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								
							<header>
								<h3>Photos</h3>
								<div class="home-btns"><a href="/photos/" class="btn">View all photos</a></div>
							</header>

							<section class="entry-content" itemprop="articleBody">
								
								<?php // new query on photos page
			
									$pics = new WP_Query('page_id=16');
																		
									if ( $pics->have_posts() ) : $pics->the_post();
									
										echo '<div class="photo-wrap">
											<ul class="gallery">';
											
												$images = get_field('photo_gallery');
												$rand1 = array_rand($images);
												$rand2 = array_rand($images);
												$rand3 = array_rand($images);
											
											    if( $images ):
													echo '<li><a href="'. $images[$rand1]['url'] .'">'. wp_get_attachment_image( $images[$rand1]['ID'], $size['medium'] ) .'</a></li>'; 
													echo '<li><a href="'. $images[$rand2]['url'] .'">'. wp_get_attachment_image( $images[$rand2]['ID'], $size['medium'] ) .'</a></li>'; 
													echo '<li><a href="'. $images[$rand3]['url'] .'">'. wp_get_attachment_image( $images[$rand3]['ID'], $size['medium'] ) .'</a></li>'; 
												endif;
											
											echo '</ul>
										</div>';
									
									endif;
										
									wp_reset_postdata()
								?>
								
								<?php // the content
									the_content();
								?>
							</section>

						</article>

					<?php endwhile; else : ?>
						<? // no content for the homepage ?>
					<?php endif; ?>

					</main>

				</div>
			</div>

<?php get_footer(); ?>
