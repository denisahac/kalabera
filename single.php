<?php get_header(); // Header ?>
<!-- #content -->
<div id="content">
	<!-- #inner-content -->
	<div id="inner-content">
		<!-- #main -->
		<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php
					/*
					 * Ah, post formats. Nature's greatest mystery (aside from the sloth).
					 *
					 * So this function will bring in the needed template file depending on what the post
					 * format is. The different post formats are located in the post-formats folder.
					 *
					 *
					 * REMEMBER TO ALWAYS HAVE A DEFAULT ONE NAMED "format.php" FOR POSTS THAT AREN'T
					 * A SPECIFIC POST FORMAT.
					 *
					 * If you want to remove post formats, just delete the post-formats folder and
					 * replace the function below with the contents of the "format.php" file.
					*/
					get_template_part( 'post-formats/format', get_post_format() );
				?>

			<?php endwhile; ?>

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
						<p><?php _e( 'This is the error message in the single.php template.', 'kalabera' ); ?></p>
					</footer>
			</article> <!-- end of: #post-not-found -->

			<?php endif; ?>

		</main> <!-- end of: #main -->

		<?php get_sidebar(); // Sidebar ?>

	</div> <!-- end of: #inner-content -->

</div> <!-- end of: #content -->

<?php get_footer(); // Footer ?>
