<?php
if (have_posts()): while (have_posts()) : the_post();

    $sectionName = getSinglePostSectionName(90);
    $sectionID = getSinglePostSectionID(90);
    $sectionURL = getSinglePostSectionURL(90);
        ?>

        <!-- article -->
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="loop-item">
                <div class="loop-item-header">
                    <div class="row">
                        <div class="col-xs-3">
                            <!-- post thumbnail -->
                            <?php if (has_post_thumbnail()) : // Check if thumbnail exists  ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_post_thumbnail(array(120, 120)); // Declare pixel size you need inside the array  ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <img src="/wp-content/uploads/2017/04/Gorges-Attrium.jpg" alt="default image" />
                                </a>
                            <?php endif; ?>
                            <!-- /post thumbnail -->
                        </div>
                        <div class="col-xs-9">

                            <!-- post title -->
                            <h2>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <!-- /post title -->

                            <!-- post details -->
                            <span class="article-issue"><a href="<?php echo $issueURL; ?>"><?php echo $issueTitle . ' Issue'; ?></a></span><span class="article-section"> | Section: <a href="<?php echo $sectionURL; ?>"><?php echo $sectionName ?></a></span>

                            <!-- /post details -->
                        </div>
                    </div><!--row-->
                </div>


                <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php  ?>

                <?php edit_post_link(); ?>
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
