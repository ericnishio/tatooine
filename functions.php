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
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="below-post-heading">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => 'Below Post Right',
    'id'            => 'below_post_right',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="below-post-heading">',
    'after_title'   => '</h2>',
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
  global $post;
  global $current_user;

  get_currentuserinfo();

  if ($post->post_author == $current_user->ID) {
    $output = '<a href="' . get_edit_post_link() . '">' . __('Edit Post', 'tatooine') . '</a>';
    return $output;
  }

  return false;
}

/**
 * Beautifies a string by adding an <em> toward the end of it.
 * @param string string
 * @return string
 */
function beautify_string($string)
{
  $length = strlen($string);

  if ($length > 3) {
    $pos = $length - 3;
  } else {
    $pos = $length - 1;
  }

  $replacement = substr($string, $pos, 1);

  return substr_replace($string, "<em>$replacement</em>", $pos, 1);
}

/**
 * Renders a sidebar.
 * @param string sidebar_id
 * @return string
 */
function render_sidebar($sidebar_id)
{
  if ( is_active_sidebar( $sidebar_id ) ) {
    return dynamic_sidebar( $sidebar_id );
  } else {
    return '';
  }
}
