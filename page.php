<?php get_header(); ?>
<main class="content-main">
    <section class="bg-light-2">
        <div class="wrapper">
            <h1><?php the_title(); ?></h1>
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-8">
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

                    <section class="bg-light">
                        <div class="wrapper">
                            <h2 class="header-stripes">Latest Feature Stories <span></span></h2>
                            <div class="row">
                                <?php
                                $args = array(
                                    'category' => 9,
                                    'numberposts' => 4, /* You can change this to show more */
                                    'post__not_in' => array($post->ID)
                                );
                                $feature_posts = get_posts($args);
                                foreach ($feature_posts as $post) : setup_postdata($post);
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
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>          

                </div>
                <div class="col-xs-12 col-sm-5 col-md-4">
                    <aside>
                        <?php get_sidebar(); ?>
                    </aside>
                </div>
            </div><!--row-->
        </div><!--wrapper-->
    </section>
</main><!--content-main-->

<?php get_footer(); ?>
