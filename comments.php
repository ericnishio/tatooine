<?php if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) return; ?>
<section id="comments" class="comments">
  <?php if ( have_comments() ): ?>
    <?php global $comments_by_type; ?>
    <?php $comments_by_type = &separate_comments( $comments ); ?>
    <?php if ( ! empty( $comments_by_type['comment'] ) ): ?>
      <section class="section section-container">
          <div class="section-inner">
            <section id="comments-list" class="comments">
              <h3 class="comments-heading"><?php comments_number(); ?></h3>
              <?php if ( get_comment_pages_count() > 1 ) : ?>
                <nav id="comments-nav-above" class="comments-navigation" role="navigation">
                  <div class="paginated-comments-links">
                    <?php paginate_comments_links(); ?>
                  </div>
                </nav>
              <?php endif; ?>
              <ul>
              <?php wp_list_comments( array(
                'callback' => 'comments_callback',
              ) ); ?>
              </ul>
              <?php if ( get_comment_pages_count() > 1 ) : ?>
                <nav id="comments-nav-below" class="comments-navigation" role="navigation">
                  <div class="paginated-comments-links">
                    <?php paginate_comments_links(); ?>
                  </div>
                </nav>
              <?php endif; ?>
            </section>
          </div>
        </section>
    <?php endif; ?>
    <?php if ( ! empty( $comments_by_type['pings'] ) ): ?>
      <?php $ping_count = count( $comments_by_type['pings'] ); ?>
      <section id="trackbacks-list" class="comments">
        <h3 class="comments-heading"><?php echo '<span class="ping-count">' . $ping_count . '</span> ' . ( $ping_count > 1 ? __( 'Trackbacks', 'tatooine' ) : __( 'Trackback', 'tatooine' ) ); ?></h3>
        <ul>
          <?php wp_list_comments( 'type=pings&callback=tatooine_custom_pings' ); ?>
        </ul>
      </section>
    <?php endif; ?>
  <?php endif; ?>
  <section class="section section-secondary section-container">
    <div class="section-inner">
      <?php if ( comments_open() ) comment_form( array(
        'class_submit' => 'button',
        'comment_notes_after' => '',
        'fields' => array(
          'author' =>
            '<div class="form-group">'
            . '<label for="author">' . __( 'Your name', 'tatooine' ) . '</label>'
            . ( $req ? '<span class="required">*</span>' : '' )
            . '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] )
            . '" size="30"' . $aria_req . '>'
            . '</div>',
          'email' =>
            '<div class="form-group">'
            . '<label for="email">' . __( 'Your email', 'tatooine' ) . '</label>'
            . ( $req ? '<span>*</span>' : '' )
            . '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . $aria_req . '">'
            . '</div>',
          'url' =>
            '<div class="form-group">'
            . '<label for="url">' . __( 'Website', 'tatooine' ) . '</label>'
            . '<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] )
            . '" size="30">'
            . '</div>',
        ),
        'comment_field' =>
          '<div class="form-group">'
          . '<label for="comment">' . __( 'Comment', 'tatooine' ) . '</label>'
          . '<textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea>'
          . '</div>',
      ) ); ?>
    </div>
  </section>
</section>
