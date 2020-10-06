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
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
    <div class="container">

        <div class="article-header">

            <?php
            if (has_post_thumbnail()) :
                echo '<figure class="">';
                the_post_thumbnail('large', array('class' => 'img-fluid'));
                echo '<h1>' . get_the_title() . '</h1>';
                echo '</figure>';
                echo '<figcaption>';
                the_post_thumbnail_caption();
                echo '</figcaption>';
            else :
                echo '<h1>' . get_the_title() . '</h1>';
            endif;
            ?>
        </div>

    </div>
    <main class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="byline-wrap mb-3">
                        <span class="article-issue"><?php echo get_post_issue_link(get_the_ID()); ?></span>
                        <span class="article-section"> | Section: <a
                                    href="<?php echo $sectionURL; ?>"><?php echo $sectionName ?></a></span>
                        <div class="byline">
                            <?php
                            if ($authorAFC && $authorSiteAFC) {
                                echo '<span class="author">By <a href="' . $authorSiteAFC . '">' . $authorAFC . '</a></span>';
                            } elseif ($authorAFC) {
                                echo '<span class="author">By ' . $authorAFC . '</span>';
                            }
                            if ($authorAFC && $authorAffiliation) {
                                echo ' with <span class="author-affiliation">' . $authorAffiliation . '</span>';
                            }
                            ?>
                            <hr />
                        </div>

                    </div>
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

<?php get_sidebar(); ?>

<?php get_footer(); ?>
