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
    <section class="section section-header">
      <div class="section-inner">
        <div class="header-container">
          <div class="header">
            <div class="header-left">
              <?php if ( ! is_singular() ) { echo '<h1 class="brand-heading">'; } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'tatooine' ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php if ( ! is_singular() ) { echo '</h1>'; } ?>
              <p class="lead"><?php bloginfo( 'description' ); ?></p>
            </div>
            <div class="header-right">
              Foo
            </div>
          </div>
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
