<?php
/*
 * CUSTOM POST TYPE TAXONOMY TEMPLATE
 *
 * This is the custom post type taxonomy template. If you edit the custom taxonomy name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom taxonomy is called "register_taxonomy('shoes')",
 * then your template name should be taxonomy-shoes.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates#Displaying_Custom_Taxonomies
*/
?>

<?php get_header(); // Header ?>
<!-- #content -->
<div id="content">
	<!-- #inner-content -->
	<div id="inner-content">
		<!-- #main -->
		<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<h1 class="archive-title"><span><?php _e( 'Posts Categorized:', 'kalabera' ); ?></span> <?php single_cat_title(); ?></h1>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<!-- .article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?> role="article">

				<header class="article__header">

					<h3 class="article__title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h3>

					<p class="byline vcard">
						<?php
							printf(__('Posted <time class="article__datetime" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="article__author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'kalabera'), get_the_time('Y-m-j'), get_the_time(__('F jS, Y', 'kalabera')), bones_get_the_author_posts_link(), get_the_term_list( get_the_ID(), 'custom_cat', "", ", ", "" ));
						?>
					</p>

				</header>

				<section class="article__content">
					<?php the_excerpt( '<span class="read-more">' . __( 'Read More &raquo;', 'kalabera' ) . '</span>' ); ?>
				</section>

				<footer class="article__footer">

				</footer>

			</article> <!-- end of: .article -->

			<?php endwhile; ?>

				<?php bones_page_navi(); ?>

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
						<p><?php _e( 'This is the error message in the taxonomy-custom_cat.php template.', 'kalabera' ); ?></p>
				</footer>
			</article> <!-- enf of: #post-not-found -->

			<?php endif; ?>

		</main> <!-- end of: #main -->

		<?php get_sidebar(); // Sidebar ?>

	</div> <!-- end of: #inner-content -->

</div> <!-- end of: #content -->

<?php get_footer(); // Footer ?>
