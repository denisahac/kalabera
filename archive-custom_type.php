<?php
/*
 * CUSTOM POST TYPE ARCHIVE TEMPLATE
 *
 * This is the custom post type archive template. If you edit the custom post type name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is called "register_post_type( 'bookmarks')",
 * then your template name should be archive-bookmarks.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); // Header ?>
<!-- #content -->
<div id="content">
	<!-- #inner-content -->
	<div id="inner-content">
		<!-- #main -->
		<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<h1 class="archive-title"><?php post_type_archive_title(); ?></h1>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?> role="article">

					<header class="article__header">

						<h3 class="article__title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<p class="article__meta"><?php
							printf( __( 'Posted <time class="article__datetime" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="article__author">%3$s</span>', 'kalabera' ), get_the_time( 'Y-m-j' ), get_the_time( __( 'F jS, Y', 'kalabera' ) ), get_author_posts_url( get_the_author_meta( 'ID' ) ));
						?></p>

					</header>

					<section class="article__content">

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
					<p><?php _e( 'This is the error message in the custom posty type archive template.', 'kalabera' ); ?></p>
				</footer>
			</article> <!-- end of: #post-not-found -->

			<?php endif; ?>

		</main>

		<?php get_sidebar(); // Sidebar ?>

	</div> <!-- end of: #inner-content -->

</div> <!-- end of: #content -->

<?php get_footer(); // Footer ?>
