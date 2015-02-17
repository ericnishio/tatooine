<?php
add_action( 'after_setup_theme', 'tatooine_setup' );

function tatooine_setup()
{
  load_theme_textdomain( 'tatooine', get_template_directory() . '/languages' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  global $content_width;
  if ( ! isset( $content_width ) ) $content_width = 640;
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
  register_sidebar( array (
    'name' => __( 'Sidebar Widget Area', 'tatooine' ),
    'id' => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => "</li>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
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

add_action( 'wp_enqueue_scripts', 'remove_default_stylesheet', 20 );

function remove_default_stylesheet() {
  wp_dequeue_style( 'style' );
  wp_deregister_style( 'style' );

  wp_register_style( 'new-style', get_stylesheet_directory_uri() . '/css/main.css', false, '1.0.0' );
  wp_enqueue_style( 'new-style' );
}
