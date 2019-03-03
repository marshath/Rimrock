<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap">

						<main id="main" class="main-wrap" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'inner-wrap' ); ?> role="article">

								<header class="article-header">

									<h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline vcard">
										<?php printf( __( '%2$s on %1$s', 'bonestheme' ),
											/* the time the post was published */
											'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
											/* the author of the post */
											'<span class="by">by</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
										); ?>
									</p>

								</header>

								<section class="entry-content">
									<?php the_excerpt(); ?>
								</section>

								<footer class="article-footer">
									<p class="footer-comment-count">
										<?php comments_number( __( '<span>No</span> Comments', 'bonestheme' ), __( '<span>One</span> Comment', 'bonestheme' ), __( '<span>%</span> Comments', 'bonestheme' ) );?>
									</p>
									<?php printf( '<p class="footer-category">' . __('Filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>
									<?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
								</footer>

							</article> <?php // end #post-<id> .article-wrap ?>

							<?php endwhile; ?>

								<?php bones_page_navi(); ?>

							<?php else : ?>

								<article id="post-not-found" class="article-content">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
										<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
									</footer>
								</article> <?php // end #post-not-found .article-wrap ?>

							<?php endif; ?>

						</main> <?php // end #main .main-wrap ?>

					<?php get_sidebar(); ?>

				</div> <?php // end #inner-content .wrap ?>
			</div> <?php // end #content ?>

<?php get_footer(); ?>
