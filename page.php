<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap">

					<main id="main" class="main-wrap" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'inner-wrap' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<header class="article-header">
								<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
							</header> <?php // end .article header ?>

							<section class="entry-content" itemprop="articleBody">
								<?php 
									// the content
									the_content();
								?>
								
								<?php 
								//------------------------------
								// ----------- MUSIC -----------
								//------------------------------
								if (is_page('music')) {
									
									echo '<div class="album">';
									
									// check if the repeater field has rows of data
									if( have_rows('album') ):
									
									 	// loop through the rows of data
									    while ( have_rows('album') ) : the_row();
									
									        // display albums
											echo '<div class="album-wrap">
											
												<div class="album-cover">
													<figure><img src="', the_sub_field('album_cover'), '" alt=""></figure>
												</div>
												
												<div class="album-info">
													
													<h3 class="album-title">', the_sub_field('album_title'), '</h3>
													
													<div class="album-details">
													
														<div class="album-subdetails">
															<span class="album-year">', the_sub_field('album_year'), '</span> 
															• 
															<span class="album-dmr">dmr0', the_sub_field('dmr_age'), '</span>
														</div>
														
														<div class="album-buttons">
															<div class="album-download">Download: </div>
															<a href="', the_sub_field('download_itunes'), '" class="btn">iTunes</a>
															<a href="', the_sub_field('download_mp3'), '" class="btn">MP3</a>
														</div>
														
													</div>
													
													<ol class="album-tracks">
															', the_sub_field('track_list'), '
													</ol>
													
												</div>
												
											</div>'; // album wrap
									        
									    endwhile;
									
									else :
									    // no rows found
									endif;
									
									echo '</div>
									<div class="footnote"><b>*</b> indicates song written by other bands</div>';
								
								} // end music ?>
								
								<?php 
								//-------------------------------
								// ----------- VIDEOS -----------
								//-------------------------------
								if (is_page('videos')) {
									
									echo '<div class="video">';
									
									// check if the repeater field has rows of data
									if( have_rows('video') ):
									
									 	// loop through the rows of data
									    while ( have_rows('video') ) : the_row();
									
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
									
									else :
									    // no rows found
									endif;
									
										echo '<div class="video-wrap"></div>'; // extra div to force widow element right
									echo '</div>';
								
								} // end videos ?>
								
								<?php 
								//-------------------------------
								// ----------- PHOTOS -----------
								//-------------------------------
								if (is_page('photos')) {
									
									echo '<div class="photo-wrap">';
									
									$images = get_field('photo_gallery');

									if( $images ): ?>
									    <ul class="gallery">
									        <?php foreach( $images as $image ): ?>
									            <li>
									                <figure>
									                	<a href="<?php echo $image['url']; ?>">
										                    <img src="<?php echo $image['sizes']['medium']; ?>" 
										                    srcset="<?php echo $image['sizes']['medium']; ?> 300w,
										                    <?php echo $image['sizes']['large']; ?> 600w"
										                    alt="<?php echo $image['alt']; echo '. '; echo $image['caption'] ?>" />
										                </a>
									                </figure>
									            </li>
									        <?php endforeach; ?>
									    </ul>
									<?php endif;
									
									echo '</div>';
								
								} // end photos ?>	

							</section> <?php // end .content-entry ?>

						</article> <?php // end #post-<id> .inner-wrap ?>

						<?php endwhile; else : ?>

							<article id="post-not-found" class="article-wrap">
								<header class="article-header">
									<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
								</section>
								<footer class="article-footer">
									<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
								</footer>
							</article> <?php // end #post-not-found .inner-wrap ?>

						<?php endif; ?>

					</main> <?php // end #main .main-wrap ?>

				</div> <?php // end #inner-content .wrap ?>
			</div> <?php // end #content ?>

<?php get_footer(); ?>
