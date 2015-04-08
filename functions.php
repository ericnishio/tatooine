<?php

add_action( 'after_setup_theme', 'tatooine_setup' );
function tatooine_setup()
{
  load_theme_textdomain( 'tatooine', get_template_directory() . '/languages' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  global $content_width;
  if ( ! isset( $content_width ) ) $content_width = 768;
  register_nav_menus( array( 'main-menu' => __( 'Main Menu', 'tatooine' ) ) );
}

add_action( 'wp_enqueue_scripts', 'tatooine_load_scripts' );
function tatooine_load_scripts()
{
  wp_enqueue_script( 'jquery' );
}

add_action( 'comment_form_before', 'tatooine_enqueue_comment_reply_script' );
function tatooine_enqueue_comment_reply_script()
{
  if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

add_filter( 'the_title', 'tatooine_title' );
function tatooine_title( $title ) {
  if ( $title == '' ) {
    return '&rarr;';
  } else {
    return $title;
  }
}

add_filter( 'wp_title', 'tatooine_filter_wp_title' );
function tatooine_filter_wp_title( $title )
{
  return $title . esc_attr( get_bloginfo( 'name' ) );
}

add_action( 'widgets_init', 'tatooine_widgets_init' );
function tatooine_widgets_init()
{
  register_sidebar( array(
    'name'          => 'Footer Column 1',
    'id'            => 'footer_column_1',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="footer-heading">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => 'Footer Column 2',
    'id'            => 'footer_column_2',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="footer-heading">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => 'Footer Column 3',
    'id'            => 'footer_column_3',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="footer-heading">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => 'Footer Bottom',
    'id'            => 'footer_bottom',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="footer-heading">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => 'Below Post Left',
    'id'            => 'below_post_left',
    'before_widget' => '<div class="below-post-widget below-post-widget-left">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="below-post-heading">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => 'Below Post Right',
    'id'            => 'below_post_right',
    'before_widget' => '<div class="below-post-widget below-post-widget-right">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="below-post-heading">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => 'After More Link',
    'id'            => 'after_more_link',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
  ) );
}

function tatooine_custom_pings( $comment )
{
  $GLOBALS['comment'] = $comment;
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
  <?php
}

add_filter( 'get_comments_number', 'tatooine_comments_number' );
function tatooine_comments_number( $count )
{
  if ( !is_admin() ) {
    global $id;
    $comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
    return count( $comments_by_type['comment'] );
  } else {
    return $count;
  }
}

add_action( 'wp_enqueue_scripts', 'add_vendor_scripts' );
function add_vendor_scripts()
{
  wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.min.js' );
  wp_enqueue_script( 'bootstrap-js' );
}

add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link()
{
  return '<a class="more-link" href="' . get_permalink() . '">' . __('Read more', 'tatooine') . ' <i class="fa fa-angle-right"></i></a>';
}

add_filter('edit_post_link', 'custom_edit_post_link');
function custom_edit_post_link($output)
{
  return '<a href="' . get_edit_post_link() . '">' . __('Edit Post', 'tatooine') . '</a>';
}

/**
 * Checks if the current user is the author of the post.
 * @return boolean
 */
function is_post_author()
{
  global $post;
  global $current_user;

  get_currentuserinfo();

  return $post->post_author == $current_user->ID;
}

function comments_callback( $comment, $args, $depth )
{
  $GLOBALS['comment'] = $comment;

  ?>
  <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
    <article id="comment-<?php comment_ID(); ?>" class="comment-body">
      <div class="comment-avatar">
        <?php echo get_avatar( $comment, 80 ); ?>
      </div>
      <header class="comment-meta">
        <div class="comment-author vcard">
          <span class="author-name"><?php comment_author(); ?></span>
        </div>
        <div class="comment-time">
          <time <?php comment_time( 'c' ); ?>>
            <span class="date"><?php comment_date(); ?></span>
            <span class="time"><?php comment_time(); ?></span>
          </time>
        </div>
      </header>
      <div class="comment-content"><?php comment_text(); ?></div>
      <footer class="comment-footer">
        <div class="comment-status">
          <?php if ( $comment->comment_approved == '0' ): ?>
            <span class="comment-awaiting-moderation"><?php echo __('Your comment is awaiting moderation.', 'tatooine'); ?></span>
          <?php endif ?>
        </div>
        <div class="comment-reply">
          <?php comment_reply_link( array_merge( $args, array(
            'reply_text' => __( '<i class="fa fa-comments-o"></i> Reply', 'tatooine' ),
            'depth' => $depth,
            'max_depth' => $args['max_depth'],
          ) ) ); ?>
        </div>
      </footer>
    </article>
  </li>
  <?php
}

/**
 * Beautifies a string by adding an <em> toward the end of it.
 * @param string string
 * @return string
 */
function beautify_string( $string )
{
  $length = strlen( $string );

  if ( $length > 3 ) {
    $pos = $length - 3;
  } else {
    $pos = $length - 1;
  }

  $replacement = substr( $string, $pos, 1 );

  return substr_replace( $string, "<em>$replacement</em>", $pos, 1 );
}

add_filter( 'the_content', 'widget_added_after_more_link' );
function widget_added_after_more_link( $text )
{
  $sidebar_id = 'after_more_link';

  if ( is_single() && is_active_sidebar( $sidebar_id ) ) {
    $pos1 = strpos( $text, '<span id="more-' );
    $pos2 = strpos( $text, '</span>', $pos1 );

    if ( $pos1 && $pos2 ) {
      ob_start();
      dynamic_sidebar( $sidebar_id );
      $widget_content = ob_get_contents();
      ob_end_clean();

      $text1 = substr( $text, 0, $pos2 );
      $text2 = substr( $text, $pos2 );

      $text = $text1 . $widget_content . $text2;
    }
  }

  return $text;
}

/**
 * Renders a sidebar.
 * @param string sidebar_id
 * @return string
 */
function render_sidebar( $sidebar_id )
{
  if ( is_active_sidebar( $sidebar_id ) ) {
    return dynamic_sidebar( $sidebar_id );
  } else {
    return '';
  }
}

function html5_shiv() {
  ?>
  <!--[if lt IE 10]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <?php
}
if ( !is_admin() ) {
  add_action( 'wp_head','html5_shiv' );
}
