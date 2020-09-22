<?php get_header(); ?>
<main class="content-main">
    <?php $current_issue_category_id = get_option('default_category'); //set using the default category in the writing options setting ?>
    <?php $categoryObject = get_category($current_issue_category_id); ?>

    <section class="bg-dark">
        <div class="wrapper">
            <div class="row">

                <div class="col-xs-4 col-sm-2">
                    <img src="<?php echo z_taxonomy_image_url($current_issue_category_id); ?>" alt="Current Issue" class="img-responsive"/>
                </div>
                <div class="col-xs-8 col-sm-10">
                    <h2 class="header-stripes"><?php echo $categoryObject->name ?> Issue <span></span></h2>
                    <p>You are viewing the <?php echo $categoryObject->name ?> issue of the Newman University Magazine.</p> 
                    <p>Looking for previous issues? <a href="/issues">View the archive</a>
                    </p></div>
            </div>
        </div>
    </section>
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <!-- article -->
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php the_content(); ?>

                <?php comments_template('', true); // Remove if you don't want comments ?>

                <br class="clear">

                <?php edit_post_link(); ?>

            </article>
            <!-- /article -->

        <?php endwhile; ?>

    <?php else: ?>

        <!-- article -->
        <article>

            <h2><?php _e('Sorry, nothing to display.', 'html5blank'); ?></h2>

        </article>
        <!-- /article -->

    <?php endif; ?>


    <section class="bg-grey-2" style="margin-top:-2em;">
        <div class="wrapper">
            <h2 class="header-stripes">Feature Articles <span></span></h2>
            <div class="row">

                <?php
                $queryFeatPosts = new WP_Query(array('category__and' => array($current_issue_category_id, 9)));
                while ($queryFeatPosts->have_posts()) {
                    $queryFeatPosts->the_post();
                    ?>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="grid-style-1">
                            <div class="frame">
                                <div class="img-frame">
                                    <a href="<?php echo get_post_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
                                        } else {
                                            echo '<img src="' . content_url() . '/uploads/2017/04/Gorges-Attrium.jpg" alt="No Image"';
                                        }
                                        ?>
                                    </a>
                                </div>
                                <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>

        </div>
    </section>

    <section class="bg-light-2">
        <div class="wrapper">
            <div class="row">
                <div class="col-sm-4">
                    <h2 class="header-stripes">University News <span></span></h2>

                    <?php
                    $queryNewsTopPost = new WP_Query(array('posts_per_page' => '1', 'category__and' => array($current_issue_category_id, 3)));

                    while ($queryNewsTopPost->have_posts()) {
                        $queryNewsTopPost->the_post();
                        ?>


                        <div class="grid-style-1">
                            <div class="frame">
                                <div class="img-frame">
                                    <a href="<?php echo get_post_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
                                        } else {
                                            echo '<img src="' . content_url() . '/uploads/2017/04/Gorges-Attrium.jpg" alt="No Image"';
                                        }
                                        ?>
                                    </a>
                                </div>
                                <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                    <div class="row">
                        <?php
                        $queryNewsPosts = new WP_Query(array('offset' => '1', 'category__and' => array($current_issue_category_id, 3)));


                        while ($queryNewsPosts->have_posts()) {
                            $queryNewsPosts->the_post();
                            ?>


                            <div class="col-xs-6 col-sm-12">
                                <div class="grid-style-2">
                                    <div class="frame">
                                        <div class="img-frame">
                                            <a href="<?php echo get_post_permalink(); ?>">
                                                <?php
                                                if (has_post_thumbnail()) {
                                                    echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
                                                } else {
                                                    echo '<img src="' . content_url() . '/uploads/2017/04/Gorges-Attrium.jpg" alt="No Image"';
                                                }
                                                ?>
                                            </a>
                                        </div>
                                        <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="bg-grey padding-default">
                        <h2 class="header-stripes">Giving <span></span></h2>

                        <?php
                        $queryGivingTopPost = new WP_Query(
                                array('posts_per_page' => '1', 'category__and' => array($current_issue_category_id, 7))
                        );

                        while ($queryGivingTopPost->have_posts()) {
                            $queryGivingTopPost->the_post();
                            ?>

                            <div class="grid-style-1">
                                <div class="frame">
                                    <div class="img-frame">
                                        <a href="<?php echo get_post_permalink(); ?>">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
                                            } else {
                                                echo '<img src="' . content_url() . '/uploads/2017/04/Gorges-Attrium.jpg" alt="No Image"';
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="row">
                            <?php
                            $queryGivingPosts = new WP_Query(array('offset' => '1', 'category__and' => array($current_issue_category_id, 7)));

                            while ($queryGivingPosts->have_posts()) {
                                $queryGivingPosts->the_post();
                                ?>

                                <div class="col-xs-6 col-sm-12">
                                    <div class="grid-style-2">
                                        <div class="frame">
                                            <div class="img-frame">
                                                <a href="<?php echo get_post_permalink(); ?>">
                                                    <?php
                                                    if (has_post_thumbnail()) {
                                                        echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
                                                    } else {
                                                        echo '<img src="' . content_url() . '/uploads/2017/04/Gorges-Attrium.jpg" alt="No Image"';
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                            <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <h2 class="header-stripes">Athletics <span></span></h2>

                    <?php
                    $queryAthleticsTopPost = new WP_Query(
                            array('posts_per_page' => '1', 'category__and' => array($current_issue_category_id, 4))
                    );

                    while ($queryAthleticsTopPost->have_posts()) {
                        $queryAthleticsTopPost->the_post();
                        ?>

                        <div class="grid-style-1">
                            <div class="frame">
                                <div class="img-frame">
                                    <a href="<?php echo get_post_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
                                        } else {
                                            echo '<img src="' . content_url() . '/uploads/2017/04/Gorges-Attrium.jpg" alt="No Image"';
                                        }
                                        ?>
                                    </a>
                                </div>
                                <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="row">
                        <?php
                        $queryAthleticsPosts = new WP_Query(
                                array('offset' => '1', 'category__and' => array($current_issue_category_id, 4))
                        );

                        while ($queryAthleticsPosts->have_posts()) {
                            $queryAthleticsPosts->the_post();
                            ?>

                            <div class="col-xs-6 col-sm-12">
                                <div class="grid-style-3">
                                    <div class="frame">
                                        <div class="img-frame">
                                            <a href="<?php echo get_post_permalink(); ?>">
                                                <?php
                                                if (has_post_thumbnail()) {
                                                    echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
                                                } else {
                                                    echo '<img src="' . content_url() . '/uploads/2017/04/Gorges-Attrium.jpg" alt="No Image"';
                                                }
                                                ?>
                                            </a>
                                        </div>
                                        <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                        ?>



                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-grey">
        <div class="wrapper">
            <h2 class="header-stripes">Staff & Faculty Notes <span></span></h2>
            <div class="row">
                <div class="col-xs-12 col-sm-9">
                    <p>Each year, Newman faculty and staff members publish and 
                        present a variety of literary, scholarly and professional 
                        works. Here is a sample of recent activity and other achievements.
                    </p>
                    <?php
                    $queryStaffFacPost = new WP_Query(array('offset' => '1', 'category__and' => array($current_issue_category_id, 1777)));

                    while ($queryStaffFacPost->have_posts()) {
                        $queryStaffFacPost->the_post();
                        ?>
                        <div class="grid-style-5">
                            <div class="frame">
                                <a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                </div>
                <div class="col-xs-12 col-sm-3">


                    <?php
                    $queryStaffFacPost = new WP_Query(array('posts_per_page' => '1', 'category__and' => array($current_issue_category_id, 1777)));

                    while ($queryStaffFacPost->have_posts()) {
                        $queryStaffFacPost->the_post();
                        ?>


                        <div class="grid-style-1">
                            <div class="frame">
                                <div class="img-frame">
                                    <a href="<?php echo get_post_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
                                        } else {
                                            echo '<img src="' . content_url() . '/uploads/2017/04/Gorges-Attrium.jpg" alt="No Image"';
                                        }
                                        ?>
                                    </a>
                                </div>
                                <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
                            </div>
                        </div>

                        <?php
                    }
                    ?>



                </div>
            </div>
        </div>
    </section>
    <section class="bg-light">
        <div class="wrapper"> 
            <div class="row">
                <h2 class="header-stripes">Alumni News <span></span></h2>
                <div class="col-xs-12 col-sm-4">

                    <?php
                    $queryAlumniTopPost = new WP_Query(array('posts_per_page' => '1', 'category__and' => array($current_issue_category_id, 8)));

                    while ($queryAlumniTopPost->have_posts()) {
                        $queryAlumniTopPost->the_post();
                        ?>


                        <div class="grid-style-1">
                            <div class="frame">
                                <div class="img-frame">
                                    <a href="<?php echo get_post_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
                                        } else {
                                            echo '<img src="' . content_url() . '/uploads/2017/04/Gorges-Attrium.jpg" alt="No Image"';
                                        }
                                        ?>
                                    </a>
                                </div>
                                <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
                            </div>
                        </div>

                        <?php
                    }
                    ?>



                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">

                        <?php
                        $queryAlumniPosts = new WP_Query(array('offset' => '1', 'category__and' => array($current_issue_category_id, 8)));

                        while ($queryAlumniPosts->have_posts()) {
                            $queryAlumniPosts->the_post();
                            ?>

                            <div class="col-xs-6">
                                <div class="grid-style-2">
                                    <div class="frame">
                                        <div class="img-frame">
                                            <a href="<?php echo get_post_permalink(); ?>">
                                                <?php
                                                if (has_post_thumbnail()) {
                                                    echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
                                                } else {
                                                    echo '<img src="' . content_url() . '/uploads/2017/04/Gorges-Attrium.jpg" alt="No Image"';
                                                }
                                                ?>
                                            </a>
                                        </div>
                                        <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="bg-grey-2">
        <div class="wrapper"> 
            <h2 class="header-stripes">Issue Notes <span></span></h2>
            <div class="row">

                <?php
                $queryIssuePosts = new WP_Query(array('category__and' => array($current_issue_category_id, 1778)));

                while ($queryIssuePosts->have_posts()) {
                    $queryIssuePosts->the_post();
                    ?>

                    <div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="grid-style-5">
                            <div class="frame">
                                <a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>
                
                <?php
                $queryAnnualReportPosts = new WP_Query(array('category__and' => array($current_issue_category_id, 1721)));

                while ($queryAnnualReportPosts->have_posts()) {
                    $queryAnnualReportPosts->the_post();
                    ?>

                    <div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="grid-style-5">
                            <div class="frame">
                                <a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>

            </div>
        </div>
    </section>
</main><!--content-main-->



<?php get_footer(); ?>
