<?php
if (have_posts()): while (have_posts()) : the_post();

    $sectionName = getSinglePostSectionName(90);
    $sectionID = getSinglePostSectionID(90);
    $sectionURL = getSinglePostSectionURL(90);

        ?>

        <!-- article -->
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="bg-light-2 loop-item mb-3 p-2">
                <div class="loop-item-header">
                    <div class="row">
                        <div class="col-3">
                            <!-- post thumbnail -->
                            <?php if (has_post_thumbnail()) : // Check if thumbnail exists  ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid')); // Declare pixel size you need inside the array  ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <img class="img-fluid" src="<?php echo home_url(); ?>/wp-content/uploads/2017/04/Gorges-Attrium.jpg" alt="default image" />
                                </a>
                            <?php endif; ?>
                            <!-- /post thumbnail -->
                        </div>
                        <div class="col-9">

                            <!-- post title -->
                            <h2>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <!-- /post title -->

                            <!-- post details -->
                            <span class="article-issue"><?php echo get_post_issue_link(get_the_ID()); ?></span><span class="article-section"> | Section: <a href="<?php echo $sectionURL; ?>"><?php echo $sectionName ?></a></span>

                            <!-- /post details -->
                            <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php  ?>
                        </div>
                    </div><!--row-->
                </div>




            </div>


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
