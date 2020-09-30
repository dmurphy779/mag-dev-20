<?php get_header(); ?>

<?php $current_issue_category_id = get_option('default_category'); //set using the default category in the writing options setting ?>
<?php $categoryObject = get_category($current_issue_category_id); ?>

<!--<section class="bg-dark">
        <div class="wrapper">
            <div class="row">

                <div class="col-xs-4 col-sm-2">
                    <img src="<?php //echo get_site_url() . z_taxonomy_image_url($current_issue_category_id); ?>" alt="Current Issue" class="img-responsive"/>
                </div>
                <div class="col-xs-8 col-sm-10">
                    <h2 class="header-stripes"><?php //echo $categoryObject->name ?> Issue <span></span></h2>
                    <p>You are viewing the <?php //echo $categoryObject->name ?> issue of the Newman University Magazine.</p>
                    <p>Looking for previous issues? <a href="/issues">View the archive</a>
                    </p></div>
            </div>
        </div>
    </section>-->
<section class="home-cover-story">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <!-- article -->
        <article id="post-<?php the_ID(); ?>" <?php post_class('full-screen-banner'); ?>>

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
</section>

<section class="bg-primary pt-5" style="padding-bottom:4rem;">
    <div class="container">
        <h2 class="section-header text-white">Feature Stories</h2>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                $queryFeatPosts = new WP_Query(array('category__and' => array($current_issue_category_id, 9)));
                $featurecount = 0;
                while ($queryFeatPosts->have_posts()) {
                    $queryFeatPosts->the_post();
                    $featurecount++;
                    ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $featurecount; ?>"
                        class="<?php echo $featurecount == 1 ? 'active' : ''; ?>"></li>
                    <?php
                }
                ?>
            </ol>
            <div class="carousel-inner">
                <?php
                $queryFeatPosts = new WP_Query(array('category__and' => array($current_issue_category_id, 9)));
                $featurecount = 0;
                while ($queryFeatPosts->have_posts()) {
                    $queryFeatPosts->the_post();
                    $featurecount++;
                    ?>
                    <div class="carousel-item <?php echo $featurecount == 1 ? 'active' : ''; ?>">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <?php
                                if (has_post_thumbnail()) {
                                    echo get_the_post_thumbnail(get_the_ID(), 'medium', array('class' => 'home-feature-image'));
                                } else {
                                    echo '<img class="home-feature-image" src="' . content_url() . '/uploads/2017/04/Gorges-Attrium.jpg" alt="No Image" />';
                                }
                                ?>
                            </div>
                            <div class="col-md-8 bg-light p-3">
                                <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a>
                                </h3>
                                <p><?php the_excerpt(); ?></p>
                                <p><a class="btn btn-primary" href="<?php echo get_post_permalink(); ?>">Visit
                                        Article</a></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="d-none d-md-block">
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>

</section>
<section class="bg-light-2 py-5 home-category-grid">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="grid-1-item">
                    <h2 class="section-header">University News</h2>
                    <?php
                    $queryNewsTopPost = new WP_Query(array('posts_per_page' => '1', 'category__and' => array($current_issue_category_id, 3)));
                    while ($queryNewsTopPost->have_posts()) {
                        $queryNewsTopPost->the_post();
                        ?>
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
                            <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
                        </div>
                        <p class="grid-1-item-more"><a href="">more in university news</a></p>

                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="grid-1-item">
                    <h2 class="section-header">Giving</h2>
                    <?php
                    $queryGivingTopPost = new WP_Query(
                        array('posts_per_page' => '1', 'category__and' => array($current_issue_category_id, 7))
                    );

                    while ($queryGivingTopPost->have_posts()) {
                        $queryGivingTopPost->the_post();
                        ?>
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
                            <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
                        </div>
                        <p class="grid-1-item-more"><a href="">more in giving</a></p>

                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="grid-1-item">
                    <h2 class="section-header">Athletics</h2>

                    <?php
                    $queryAthleticsTopPost = new WP_Query(
                        array('posts_per_page' => '1', 'category__and' => array($current_issue_category_id, 4))
                    );

                    while ($queryAthleticsTopPost->have_posts()) {
                        $queryAthleticsTopPost->the_post();
                        ?>
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
                            <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
                        </div>
                        <p class="grid-1-item-more"><a href="">more in athletics</a></p>

                        <?php
                    }
                    ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="grid-1-item">
                    <h2 class="section-header">Faculty / Staff Acheivements</h2>
                    <?php
                    $queryStaffFacPost = new WP_Query(array('posts_per_page' => '1', 'category__and' => array($current_issue_category_id, 1777)));
                    while ($queryStaffFacPost->have_posts()) {
                        $queryStaffFacPost->the_post();
                        ?>
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
                            <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
                        </div>
                        <p class="grid-1-item-more"><a href="">more in faculty / staff achievements</a></p>

                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="grid-1-item">
                    <h2 class="section-header">Alumni News</h2>
                    <?php
                    $queryAlumniTopPost = new WP_Query(array('posts_per_page' => '1', 'category__and' => array($current_issue_category_id, 8)));

                    while ($queryAlumniTopPost->have_posts()) {
                        $queryAlumniTopPost->the_post();
                        ?>
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
                            <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
                        </div>
                        <p class="grid-1-item-more"><a href="">more in alumni news</a></p>

                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
</section>
<section class="bg-primary py-5 home-more-issue-stories">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php
                $issueURL = get_category_link($categoryObject->term_id);
                $issueTitle = $categoryObject->cat_name;
                ?>
                <p class="text-center"><img
                            src="<?php echo home_url() . z_taxonomy_image_url($current_issue_category_id); ?>"
                            alt="Current Issue" class="d-block img-fluid"/></p>
                <p class="text-center mt-3"><a href="<?php echo $issueURL; ?>"
                                               class="btn btn-light">All <?php echo $issueTitle; ?> Articles</a></p>
            </div>
            <div class="col-md-6">
                <img src="<?php echo home_url(); ?>/wp-content/uploads/2020/09/magazine-collage.jpg" alt="All Issues"/>
                <p class="text-center mt-3"><a href="<?php echo home_url(); ?>/issues/"
                                               class="btn btn-light">View Previous Issues</a></p>
            </div>
        </div>

    </div>
</section>


<?php get_footer(); ?>
