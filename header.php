<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php wp_title(''); ?><?php
            if (wp_title('', false)) {
                echo ' :';
            }
            ?> <?php bloginfo('name'); ?></title>

        <link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

        <script src="https://use.typekit.net/avc0vhq.js"></script>
        <script src="https://use.fontawesome.com/b6011138ee.js"></script>
        <script>try {
                Typekit.load({async: true});
            } catch (e) {
            }
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/parallax.min.js" type="text/javascript"></script>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-NRFVNR4');</script>
        <!-- End Google Tag Manager -->

        <?php wp_head(); ?>
        <script>
// conditionizr.com
// configure environment tests
            conditionizr.config({
                assets: '<?php echo get_template_directory_uri(); ?>',
                tests: {}
            });
        </script>

    </head>
    <body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NRFVNR4"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
        <header>
            <section class="main-nav bg-1">

                <div class="wrapper">


                    <div class="brand">
                        <a href="<?php echo home_url(); ?>">
                            <!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
                            <img src="<?php echo get_template_directory_uri(); ?>/img/Magazine-Logo.png" alt="Newman University">
                        </a>
                    </div>
                    <!-- /logo -->

                    <!-- nav -->
                    <nav class="nav" role="navigation">
                        <?php wp_nav_menu($args = array('menu'   => 'Top Navigation')); ?>
                    </nav>
                    <!-- /nav -->
                    <div class="search-form"><?php get_search_form(); ?></div>
                    </header>
                    <!-- /header -->
