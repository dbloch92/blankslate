<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" <?php language_attributes('xhtml') ?>><head profile="http://gmpg.org/xfn/11"><meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" /><title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title><link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" /><?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?><?php wp_head(); ?></head><body <?php body_class(); ?>><div id="wrapper" class="hfeed"><div id="header"><div id="masthead"><div id="branding"><div id="blog-title"><a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a></div><div id="blog-description"><?php bloginfo( 'description' ) ?></div></div><div id="search"><?php get_search_form(); ?></div><div id="nav"><?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?></div></div></div><div id="main">