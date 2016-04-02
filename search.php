<?php get_header(); // Header ?>
<!-- #content -->
<div id="content">
  <!-- #inner-content -->
	<div id="inner-content">
    <!-- #main -->
		<main id="main" role="main">
			<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'kalabera' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?> role="article">

					<header class="article__header">

						<h3 class="article__title">
              <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            </h3>

						<p class="article__meta">
							<?php printf( __( 'Posted %1$s by %2$s', 'kalabera' ),
						    /* the time the post was published */
						    '<time class="article__datetime" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
						    /* the author of the post */
						    '<span class="by">by</span> <span class="article__author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
							); ?>
						</p>

					</header>

					<section class="article__content">
						<?php the_excerpt( '<span class="read-more">' . __( 'Read more &raquo;', 'kalabera' ) . '</span>' ); ?>

					</section>

					<footer class="article__footer">

						<?php if(get_the_category_list(', ') != ''): ?>
  					<?php printf( __( 'Filed under: %1$s', 'kalabera' ), get_the_category_list(', ') ); ?>
  					<?php endif; ?>

 					  <?php the_tags( '<p class="tags"><span class="tags__title">' . __( 'Tags:', 'kalabera' ) . '</span> ', ', ', '</p>' ); ?>

					</footer> 

				</article>

			<?php endwhile; ?>

			<?php bones_page_navi(); ?>

			<?php else : ?>
      <!-- #post-not-found -->
			<article id="post-not-found" class="article">
				<header class="article__header">
					<h1><?php _e( 'Sorry, No Results.', 'kalabera' ); ?></h1>
				</header>

				<section class="article__content">
					<p><?php _e( 'Try your search again.', 'kalabera' ); ?></p>
				</section>

				<footer class="article__footer">
					<p><?php _e( 'This is the error message in the search.php template.', 'kalabera' ); ?></p>
				</footer>
			</article> <!-- end of: #post-not-found -->

			<?php endif; ?>

		</main> <!-- end of: #main -->

		<?php get_sidebar(); // Sidebar ?>

	</div> <!-- end of: #inner-content -->

</div> <!-- end of: #content -->

<?php get_footer(); // Footer ?>
