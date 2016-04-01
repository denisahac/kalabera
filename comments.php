<?php
/*
The comments page for Kalabera
*/

// don't load it if you can't comment
if ( post_password_required() ) {
  return;
}

if ( have_comments() ) : ?>

  <h3 id="comments-title" class="h2"><?php comments_number( __( '<span>No</span> Comments', 'bonestheme' ), __( '<span>One</span> Comment', 'bonestheme' ), __( '<span>%</span> Comments', 'bonestheme' ) );?></h3>

  <section class="comments">
    <?php
      wp_list_comments( array(
        'style'             => 'div',
        'short_ping'        => true,
        'avatar_size'       => 40,
        'callback'          => 'bones_comments',
        'type'              => 'all',
        'reply_text'        => __('Reply', 'bonestheme'),
        'page'              => '',
        'per_page'          => '',
        'reverse_top_level' => null,
        'reverse_children'  => ''
      ) );
    ?>
  </section>

  <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
  	<nav class="navigation navigation__comments" role="navigation">
    	<div class="navigation__comment navigation__comment-prev"><?php previous_comments_link( __( '&larr; Previous Comments', 'bonestheme' ) ); ?></div>
    	<div class="navigation__comment navigation__comment--next"><?php next_comments_link( __( 'More Comments &rarr;', 'bonestheme' ) ); ?></div>
  	</nav>
  <?php endif; ?>

  <?php if ( ! comments_open() ) : ?>
  	<p class="no-comments"><?php _e( 'Comments are closed.' , 'bonestheme' ); ?></p>
  <?php endif; ?>

<?php endif; ?>

<?php comment_form(); // Comment Form?>

