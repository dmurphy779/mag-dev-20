<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
    <div class="container">

        <div class="article-header">
            <?php
            if (has_post_thumbnail()) :
                echo '<figure class="">';
                the_post_thumbnail('large', array('class' => 'img-fluid'));
                echo '<figcaption>';
                the_post_thumbnail_caption();
                echo '</figcaption>';
                echo '</figure>';
            endif;
            ?>
        </div>

    </div>
    <main class="mb-5">
        <div class="container">
            <div class="row">
                <?php

                $issue_parent_cat_id = 1780;
                $issue_child_cats = get_categories(
                    array('child_of' => $issue_parent_cat_id, 'orderby' => 'id',
                        'order'   => 'DESC')
                );
                foreach ($issue_child_cats as $c) {
                    $issue_id = $c->cat_ID;
                    $issue_name = $c->name;
                    $issue_img_url = z_taxonomy_image_url($issue_id);
                    $issue_url = get_category_link($issue_id);
                    ?>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">

                        <div class="mag-archive-issue">
                            <p class="mag-archive-issue-title"><a href="<?php echo $issue_url; ?>"><?php echo $issue_name; ?></a></p>
                            <a href="<?php echo $issue_url ?>"><img class="img-fluid" src="<?php echo $issue_img_url; ?>" alt="<?php echo $issue_name; ?>" /></a>
                        </div>

                    </div>

                    <?php
                }
                ?>
            </div>
        </div>
    </main>
</article>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
