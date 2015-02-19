<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <title><?php wp_title( ' | ', true, 'right' ); ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="wrapper" class="page hfeed">
    <section class="section section-narrow section-header">
      <div class="section-inner">
        <div class="header">
          <?php if ( ! is_singular() ): ?>
            <h1 class="brand-heading">
          <?php endif; ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'tatooine' ); ?>" rel="home">
            <?php echo beautify_string( esc_html( get_bloginfo( 'name' ) ) ); ?>
          </a>
          <?php if ( ! is_singular() ): ?>
            </h1>
          <?php endif; ?>
          <p class="lead"><?php bloginfo( 'description' ); ?></p>
          <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
        </div>
      </div>
    </section>
    <!--
    <nav id="menu" role="navigation">
      <div id="search">
        <?php get_search_form(); ?>
      </div>
      <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
    </nav>
    <div id="container">
    -->
