<!-- sidebar -->
<aside class="sidebar" role="complementary">


    <?php

    if (is_single()) {
        $issueID = getIssueCategoryID(1780);
        $issueObject = get_category($issueID);
        $issueTitle = $issueObject->name;
        $issueURL = get_category_link($issueID);

        ?>
        <!--<div class="sidebar-issue-info">
            <img src="<?php echo home_url() . z_taxonomy_image_url($issueID); ?>" alt="Current Issue"
                 class="img-fluid"/>
            <div class="sidebar-issue-info-header">
                <h2 class="header-stripes"><?php echo $issueTitle; ?> Issue <span></span></h2>
            </div>
        </div>-->
        <?php
        $args = array(
            'posts_per_page' => 10,
            'category' => $issueID,
            'category__and' => 9,
            'orderby' => 'date',
            'post_type' => 'post',
            'post_status' => 'publish',
            'suppress_filters' => true
        );
        $sidebarposts = get_posts($args);
        ?>

        <div class="bg-light-2 bg-black-linen py-5">
            <div class="container">
                <h2 class="section-header">Feature Articles</h2>
                <div class="row">
                    <?php foreach ($sidebarposts as $post) : setup_postdata($post); ?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="grid-1-item">
                                <div class="img-frame">
                                    <a href="<?php echo get_post_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'd-block img-fluid'));
                                        } else {
                                            echo '<img class="d-block img-fluid" src="' . content_url() . '/uploads/2017/04/Gorges-Attrium.jpg" alt="No Image"';
                                        }
                                        ?>
                                    </a>
                                    <h3><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title() ?></a>
                                    </h3>
                                </div>
                            </div>

                        </div>
                    <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                </div>
                <p class="text-center mt-3"><a href="<?php echo $issueURL; ?>"
                                          class="btn btn-primary">More <?php echo $issueTitle; ?> Stories</a></p>
            </div>
        </div>


        <?php
    }

    if (is_category()) {
        $cat = get_category(get_query_var('cat'));
        $catID = $cat->cat_ID;
        $catObject = get_category($catID);
        $catTitle = $catObject->name;
        $catURL = get_category_link($catID);

        ?>
        <div class="sidebar-issue-info">
            <img src="<?php echo z_taxonomy_image_url($catID); ?>" alt="Current Issue" class="img-responsive"/>
            <div class="sidebar-issue-info-header">
                <h2 class="header-stripes"><?php echo $catTitle; ?> Issue <span></span></h2>
                <h4>Feature Stories</h4>
            </div>
        </div>
        <?php
        $args = array(
            'posts_per_page' => 10,
            'category' => $catID,
            'category__and' => 9,
            'orderby' => 'date',
            'post_type' => 'post',
            'post_status' => 'publish',
            'suppress_filters' => true
        );
        $sidebarposts = get_posts($args);
        ?>

        <div class="row">
            <?php foreach ($sidebarposts as $post) : setup_postdata($post); ?>
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
            endforeach;
            wp_reset_postdata();
            ?>
        </div>
        <p class="text-center"><a href="<?php echo $catURL; ?>"
                                  class="btn btn-primary">More <?php echo $catTitle; ?> Stories</a></p>
        <?php
    }


    if (!is_category() && !is_single()) {
        $current_issue_category_id = get_option('default_category');
        $categoryObject = get_category($current_issue_category_id);
        $issueTitle = $categoryObject->name;
        $issueURL = get_category_link($current_issue_category_id);

        ?>

        <div class="sidebar-issue-info">
            <img src="<?php echo z_taxonomy_image_url($current_issue_category_id); ?>" alt="Current Issue"
                 class="img-responsive"/>
            <div class="sidebar-issue-info-header">
                <h2 class="header-stripes"><?php echo $issueTitle; ?> Issue <span></span></h2>
                <h4>Feature Stories</h4>
            </div>
        </div>


        <?php
        $args = array(
            'category' => 9,
            'numberposts' => 4, /* You can change this to show more */
            'post__not_in' => array($post->ID)
        );
        $feature_posts = get_posts($args);
        foreach ($feature_posts as $post) : setup_postdata($post);
            ?>


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
        <?php endforeach; ?>

        <p class="text-center"><a href="<?php echo $issueURL; ?>"
                                  class="btn btn-primary">More <?php echo $issueTitle; ?> Stories</a></p>
        <?php
    }
    ?>

    <!--<?php //get_template_part('searchform');       ?>
    <div class="sidebar-widget">
    <?php //if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1'))    ?>
    </div>

    <div class="sidebar-widget">
    <?php //if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2'))    ?>
    </div>-->

</aside>
<!-- /sidebar -->
