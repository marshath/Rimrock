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
						
						

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'home-video' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<section class="entry-content" itemprop="articleBody">
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
