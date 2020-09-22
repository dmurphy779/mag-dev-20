<?php get_header(); ?>

<?php
//single page variables
$issueID = getIssueCategoryID(1780);
$issueObject = get_category($issueID);
$issueTitle = $issueObject->name;
$issueURL = get_category_link($issueID);
$authorAFC = get_field('author_name');
$authorSiteAFC = get_field('author_website_or_page');
$authorAffiliation = get_field('author_affiliation');
$sectionName = getSinglePostSectionName(90);
$sectionID = getSinglePostSectionID(90);
$sectionURL = getSinglePostSectionURL(90);
?>
<main class="content-main">
    <section class="bg-light-2">
        <div class="wrapper">
            <h1><?php the_title(); ?></h1>
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-8">
                    <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                            <!-- article -->
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <?php
                                if (has_post_thumbnail()) :
                                    echo '<figure class="feature-image">';
                                    the_post_thumbnail('large', array('class' => 'img-responsive'));
                                    if (has_post_thumbnail_caption) {
                                        echo '<figcaption>';
                                        the_post_thumbnail_caption();
                                        echo '</figcaption>';
                                    }
                                    echo '</figure>';
                                endif;
                                ?>
                                <div class="the-content">
                                    <div class="clearfix byline-wrap">
                                        <div class="byline">
                                            <?php
                                            if ($authorAFC && $authorSiteAFC) {
                                                echo '<span class="author">By <a href="' . $authorSiteAFC . '">' . $authorAFC . '</a></span>';
                                            } elseif ($authorAFC) {
                                                echo '<span class="author">' . $authorAFC . '</span>';
                                            }
                                            if ($authorAFC && $authorAffiliation) {
                                                echo ' with <span class="author-affiliation">' . $authorAffiliation . '</span>';
                                            }
                                            ?>
                                        </div>
                                        <span class="article-issue"><a href="<?php echo $issueURL; ?>"><?php echo $issueTitle . ' Issue'; ?></a></span>
                                        <span class="article-section"> | Section: <a href="<?php echo $sectionURL; ?>"><?php echo $sectionName ?></a></span>
                                        <div class="comments-count-container">
                                            <a class="comments_header" href="#comments" rel="nofollow">
                                                <i class="fa fa-comments" aria-hidden="true"></i> <span>Leave your thoughts</span>
                                            </a>
                                        </div>
                                    </div>
                                    <?php
                                    the_content();
                                    the_tags(__('Tags: ', 'html5blank'), ', ', '<br>'); // Separated by commas with a line break at the end  
                                    edit_post_link();
                                    ?>

                                    <div class="comments" id="comments">
                                        <?php //echo do_shortcode('[fbcomments url="http://mag.newmanu.edu/wordpress-plugins/facebook-comments/" width="375" count="off" num="3" countmsg="wonderful comments!"]'); ?>
                                    </div>

                                </div>


                            </article>
                            <!-- /article -->

                        <?php endwhile; ?>

                    <?php else: ?>

                        <!-- article -->
                        <article>

                            <h1><?php _e('Sorry, nothing to display.', 'html5blank'); ?></h1>

                        </article>
                        <!-- /article -->

                    <?php endif; ?>




                    <?php
                    // if post has tags - show articles that have related tags in Related Stories section
                    if (has_tag()) {
                        
                        $tags = wp_get_post_tags($post->ID);
                        foreach ($tags as $tag) {
                            $tag_arr .= $tag->slug . ',';
                        }
                        $args = array(
                            'tag' => $tag_arr,
                            'numberposts' => 4, /* You can change this to show more */
                            'post__not_in' => array($post->ID)
                        );
                    }


                    if (!has_tag() && $sectionID !== 9) {
                        
                        $args = array(
                            'category' => $sectionID,
                            'numberposts' => 4, /* You can change this to show more */
                            'post__not_in' => array($post->ID)
                        );
                    }

                    $related_posts = get_posts($args);
                    if ($related_posts) {
                        ?>
                        <section class="bg-grey">
                            <div class="wrapper">
                                <h2 class="header-stripes">Related Stories <span></span></h2>
                                <div class="row">
                                    <?php
                                    foreach ($related_posts as $post) : setup_postdata($post); 
                                        ?>

                                        <div class="col-xs-6">
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
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </section>
                        <?php
                    }

                    wp_reset_postdata();
                    ?>


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
