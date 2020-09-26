<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php
        if (wp_title('', false)) {
            echo ' :';
        }
        ?><?php bloginfo('name'); ?></title>

    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <!-- Google Tag Manager -->
    <!--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NRFVNR4');</script>
     End Google Tag Manager -->

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NRFVNR4"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<header>
    <section class="main-nav">
        <!-- nav -->
        <nav class="navbar navbar-expand-md navbar-dark" role="navigation">
            <div class="container position-relative">
                <a class="navbar-brand" href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/Newman-Mag-Favicon.svg" width="30"
                         height="30" class="d-inline-block align-top" alt="Newman University Magazine"
                         loading="lazy">

                </a>

                <div class="collapse navbar-collapse" id="navbar-collapse-1">

                    <?php

                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'depth' => 2, // 1 = no dropdowns, 2 = with dropdowns.
                        'container' => 'div',
                        'container_class' => 'collapse navbar-collapse',
                        'container_id' => 'navbar-collapse-1',
                        'menu_class' => 'navbar-nav mr-auto',
                        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                        'walker' => new WP_Bootstrap_Navwalker(),
                    ));

                    ?>

                    <form role="search" method="get" class="search-form" id="searchform" action="<?php echo home_url( '/' ); ?>">

                        <div class="input-group">
                            <input type="search" id="s" class="form-control search-field"
                                   placeholder="<?php echo esc_attr_x( 'Search…', 'placeholder' ) ?>"
                                   value="<?php echo get_search_query() ?>" name="s"
                                   title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />

                            <button class="btn my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                        </div>

                    </form>

                </div>


                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbar-collapse-1" aria-controls="navbar-collapse-1"
                        aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'numag-20'); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <?php  if (! is_front_page()){ ?>
            <div class="my-5">
                <div class="container">
                    <div class="brand">
                        <a href="<?php echo home_url(); ?>">
                            <!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
                            <img class="mast-logo"
                                 src="<?php echo get_template_directory_uri(); ?>/img/Newman-Mag-Logo-Blue.svg"
                                 alt="Newman University">
                        </a>
                    </div>
                    <!-- /logo -->
                </div>
            </div>
        <?php } ?>

    </section>
</header>
<!-- /header -->
