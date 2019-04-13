<?php
/*
 Template Name: Home page
*/
?>

<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap">

					<main id="main" class="home-wrap" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'splash' ); ?>>

							<header class="article-header">
								<h1 class="page-title"><?php the_title(); ?></h1>
							</header>

							<section class="splash-content">
								<div class="splash-band">Neutron Dawn</div>
								<div class="splash-album">Rimrock</div>
								<div class="splash-cta">Now available
									<div class="btn-cta"><a href="<?php echo esc_url( home_url( '/music/' ) ); ?>">Download Rimrock</a></div>
								</div>
								<div class="splash-spiral"><img src="<?php echo esc_url( home_url() ); ?>/library/images/splash_spiral.svg"></div>
								<div class="screen-reader-text">
									<?php // the content
										the_content();
									?>
								</div>
								
							</section>

						</article>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'main-wrap home-videos' ); ?>>
								
							<header>
								<h3>Videos</h3>
								<div class="home-btns"><a href="<?php echo esc_url( home_url( '/videos/' ) ); ?>" class="btn">View all videos</a></div>
							</header>

							<section class="entry-content">
								
								<?php // new query on videos page
			
									$vids = new WP_Query('page_id=14');
																		
									if ( $vids->have_posts() ) : $vids->the_post();
									
										echo '<div class="video">';
									
								
										$rows = get_field('video');
										if($rows) $i = 0; { 			// start counter
											shuffle( $rows ); 
											foreach($rows as $row) { 
												$i++;
												if($i==4) break; 		// only display 3 videos, 4-1=3
												echo '<div class="video-wrap">
													<a href="', esc_url( home_url( '/library/videos' ) ), $row['video_link'], '.mp4">
																							
														<div class="video-cover">
															<figure>
																<img src="', $row['video_image'], '" alt="', $row['video_title'], '">
															</figure>
														</div>
				
														<div class="video-info">
														
															<h3 class="video-title">', $row['video_title'], '</h3>
															
															<div class="video-details">
																<span class="video-year">', $row['video_year'], '</span> • <span class="video-duration">', $row['video_duration'], ' min</span>
															</div>
														
														</div>
													</a>
												</div>';
											}
										}
										
										echo '</div>';
									
									endif;
									wp_reset_postdata()
								?>
								
							</section>

						</article>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'main-wrap home-photos' ); ?>>
								
							<header>
								<h3>Photos</h3>
								<div class="home-btns"><a href="<?php echo esc_url( home_url( '/photos/' ) ); ?>" class="btn">View all photos</a></div>
							</header>

							<section class="entry-content">
								
								<?php // new query on photos page
			
									$pics = new WP_Query('page_id=16');
																		
									if ( $pics->have_posts() ) : $pics->the_post();
												
										echo '<div class="photo-wrap">
											<ul class="gallery">';				
											
											$images = get_field('photo_gallery');
											
											if( $images ):
												$rand_keys = array_rand($images, 3);
											
												foreach( $rand_keys as $key ):
													echo '<li>
														<a href="', $images[$key]['url'], '">
															<figure itemprop="image">
																<img srcset="', $images[$key]['sizes']['medium'], ' 300w,
																	',$images[$key]['sizes']['large'], ' 600w" 
																	src="', $images[$key]['sizes']['medium'], '" 
																	alt="', $images[$key]['alt'], '. ', $images[$key]['caption'], '" />
															</figure>
														</a>
													</li>';
												endforeach;
											
											endif; 
											
											echo '</ul>
										</div>';
									
									endif;
										
									wp_reset_postdata()
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
