		 <!-- Footer -->
      <footer itemscope itemtype="http://schema.org/WPFooter">
        <!-- #inner-footer -->
				<div id="inner-footer">

					<nav role="navigation">
						<?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links',            // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'kalabera' ),   // nav name
    					'menu_class' => 'nav nav__footer',              // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav>

					<p class="source-org copyright">&copy; <span itemprop="copyrightYear"><?php echo date('Y'); ?></span> <span itemprop="creator"><?php bloginfo( 'name' ); ?></span>.</p>

				</div> <!-- end of: #inner-footer -->
			</footer> <!-- end of: Footer  -->
		</div> <!-- end of: #container -->

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>
</html> <!-- end of site. what a ride! -->
