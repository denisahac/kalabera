<?php get_header(); // Header ?>
<!-- #content -->
<div id="content">
	<!-- #inner-content -->
	<div id="inner-content">
		<!-- #main -->
		<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?> role="article">

				<header class="article__header">

					<h3 class="article__title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					<p class="article__meta">
						<?php printf( __( 'Posted', 'kalabera' ).' %1$s %2$s',
          		/* the time the post was published */
					    '<time class="article__datetime" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
							/* the author of the post */
							'<span class="by">'.__('by', 'kalabera').'</span> <span class="article__author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
						); ?>
					</p>

				</header>

				<section class="article__content">

					<?php the_post_thumbnail(); ?>

					<?php the_excerpt(); ?>

				</section>

				<footer class="article__footer">

				</footer>

			</article>

			<?php endwhile; ?>

				<?php bones_page_navi(); // Pagination ?>

			<?php else : ?>
			<!-- #post-not-found -->
			<article id="post-not-found" class="article">
				<header class="article__header">
					<h1><?php _e( 'Oops, Post Not Found!', 'kalabera' ); ?></h1>
				</header>
				<section class="article__content">
					<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'kalabera' ); ?></p>
				</section>
				<footer class="article__footer">
					<p><?php _e( 'This is the error message in the archive.php template.', 'kalabera' ); ?></p>
				</footer>
			</article> <!-- end of: #post-not-found -->

			<?php endif; ?>

		</main> <!-- end of: #main -->

		<?php get_sidebar(); // Sidebar ?>

	</div> <!-- end of: #inner-content -->

</div> <!-- end of: #content -->

<?php get_footer(); // Footer ?>
