<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap">

					<main id="main" class="main-wrap" role="main">
						
						<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('article-wrap'); ?> role="article">

								<header class="article-header">

									<h3 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<p class="byline vcard">
										<?php printf( __( 'Posted %1$s by %2$s', 'bonestheme' ),
										/* the time the post was published */
										'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
											/* the author of the post */
											'<span class="by">by</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
										); ?>
									</p>

								</header> <?php // end .article-header ?>

								<section class="entry-content">
									<?php the_excerpt( '<span class="read-more">' . __( 'Read more &raquo;', 'bonestheme' ) . '</span>' ); ?>
								</section>

								<footer class="article-footer">

									<?php if(get_the_category_list(', ') != ''): ?>
										<?php printf( __( 'Filed under: %1$s', 'bonestheme' ), get_the_category_list(', ') ); ?>
									<?php endif; ?>

									<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer> <?php // end .article-footer ?>

							</article> <?php // #post-<id> .article-wrap ?>

						<?php endwhile; ?>

							<?php bones_page_navi(); ?>

						<?php else : ?>

							<article id="post-not-found" class="article-wrap">
								<header class="article-header">
									<h1><?php _e( 'Sorry, No Results.', 'bonestheme' ); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e( 'Try your search again.', 'bonestheme' ); ?></p>
								</section>
								<footer class="article-footer">
									<p><?php _e( 'This is the error message in the search.php template.', 'bonestheme' ); ?></p>
								</footer>
							</article> <?php // #post-not-found .article-wrap ?>

						<?php endif; ?>

					</main> <?php // #main .main-wrap ?>

					<?php get_sidebar(); ?>

				</div> <?php // end #inner-content .wrap ?>
			</div> <?php // end #content ?>

<?php get_footer(); ?>
