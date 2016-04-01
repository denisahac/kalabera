<?php get_header(); // Header ?>
<!-- #content -->
<div id="content">
	<!-- #inner-content -->
	<div id="inner-content">
		<!-- #main -->
		<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
			<!-- #post-not-found -->
			<article id="post-not-found" class="article">

				<header class="article__header">

					<h1><?php _e( 'Epic 404 - Article Not Found', 'bonestheme' ); ?></h1>

				</header>

				<section class="article__content">

					<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'bonestheme' ); ?></p>

				</section>

				<section class="form form--search">

					<p><?php get_search_form(); // Search form ?></p>

				</section>

				<footer class="article__footer">

						<p><?php _e( 'This is the 404.php template.', 'bonestheme' ); ?></p>

				</footer>

			</article> <!-- end of: #post-not-found -->

		</main> <!-- end of: #main -->

	</div> <!-- end of: #inner-content -->

</div> <!-- end of: #content -->

<?php get_footer(); // Footer ?>
