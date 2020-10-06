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
                <div class="col-md-10 offset-1">
                    <div class="the-content">

                        <?php
                        the_content();
                        the_tags(__('Tags: ', 'numag-20'), ', ', '<br>'); // Separated by commas with a line break at the end
                        edit_post_link();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</article>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
