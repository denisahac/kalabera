<?php
/*
 Template Name: Custom Page Example
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); // Header ?>
<!-- #content -->
<div id="content">
	<!-- #inner-content -->
	<div id="inner-content">
		<!-- #main -->
		<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="article__header">

					<h1 class="article__title"><?php the_title(); ?></h1>

					<p class="article__meta">
						<?php printf( __( 'Posted <time class="article__datetime" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="article__author">%3$s</span>', 'kalabera' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
					</p>


				</header>

				<section class="article__content" itemprop="articleBody">
					<?php
						// the content (pretty self explanatory huh)
						the_content();

						/*
						 * Link Pages is used in case you have posts that are set to break into
						 * multiple pages. You can remove this if you don't plan on doing that.
						 *
						 * Also, breaking content up into multiple pages is a horrible experience,
						 * so don't do it. While there are SOME edge cases where this is useful, it's
						 * mostly used for people to get more ad views. It's up to you but if you want
						 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
						 *
						 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
						 *
						*/
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'kalabera' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
					?>
				</section>


				<footer class="article__footer">

          <?php the_tags( '<p class="tags"><span class="tags__title">' . __( 'Tags:', 'kalabera' ) . '</span> ', ', ', '</p>' ); ?>

				</footer>

				<?php comments_template(); // Comments ?>

			</article>

			<?php endwhile; else : ?>
			<!-- #post-not-found -->
			<article id="post-not-found" class="article">
				<header class="article__header">
					<h1><?php _e( 'Oops, Post Not Found!', 'kalabera' ); ?></h1>
				</header>

				<section class="article__content">
					<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'kalabera' ); ?></p>
				</section>

				<footer class="article__footer">
					<p><?php _e( 'This is the error message in the page-custom.php template.', 'kalabera' ); ?></p>
				</footer>
			</article> <!-- end of: #post-not-found -->

			<?php endif; ?>

		</main> <!-- end of: #main -->

		<?php get_sidebar(); // Sidebar ?>

	</div> <!-- end of: #inner-content -->

</div> <!-- end of: #content -->

<?php get_footer(); // Footer ?>
