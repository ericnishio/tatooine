<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <title><?php wp_title( ' | ', true, 'right' ); ?></title>
  <link href="http://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Cardo:400,400i,700&amp;subset=latin-ext" rel="stylesheet">
  <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/split-part-1.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/split-part-2.css">
  <![endif]-->
  <![if !IE]>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
  <![endif]>
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="wrapper" class="page hfeed">
    <section class="section section-narrow section-header">
      <div class="section-inner">
        <div class="header">
          <?php if ( ! is_singular() ): ?>
            <h1>
          <?php endif; ?>
          <a class="brand-heading" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'tatooine' ); ?>" rel="home">
            <?php echo beautify_string( esc_html( get_bloginfo( 'name' ) ) ); ?>
          </a>
          <?php if ( ! is_singular() ): ?>
            </h1>
          <?php endif; ?>
          <p class="lead"><?php bloginfo( 'description' ); ?></p>
          <div class="hidden-xs">
            <?php wp_nav_menu( array(
              'theme_location' => 'main-menu',
            ) ); ?>
          </div>
          <div class="visible-xs-block">
            <div id="collapse-main-menu" class="collapse">
              <?php wp_nav_menu( array(
                'theme_location' => 'main-menu',
              ) ); ?>
            </div>
            <button class="menu-toggle-button" type="button" data-toggle="collapse" data-target="#collapse-main-menu" aria-expanded="false" aria-controls="collapse-main-menu">
              <i class="fa fa-navicon"></i>
            </button>
          </div>
        </div>
      </div>
    </section>
