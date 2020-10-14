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
            <hr>
            <div class="row">
                <div class="col-md-6 pt-4">
                    <h2>More Issues from the Archives</h2>
                    <p>The Newman University <a href="https://newmanu.edu/campus-life/campus-services/dugan-library/university-archives">Department of Archives</a> has scanned, cataloged and curated several past magazines and newspapers freely available to you.</p>
                    <ul>
                        <li><a href="https://newmanu.libguides.com/archive_master/Alumni_Magazines">Newman University Magazine: 2013 - Present</a></li>
                        <li><a href="https://newmanu.libguides.com/archive_master/Alumni_Magazines">Challenge Magazine: 1960s - 2013</a></li>
                        <li><a href="https://newmanu.libguides.com/archive_master/Newspaper_The_Vantage">The Vantage: 1960s - present</a></li>
                        <li><a href="https://newmanu.libguides.com/archive_master/Newspaper_Pacemaker">Pacemaker: 1960s</a></li>
                        <li><a href="https://newmanu.libguides.com/archive_master/Newspaper_College_News">The College News: 1950s - 1960s</a></li>
                        <li><a href="https://newmanu.libguides.com/archive_master/Newspaper_Sacred_Heart_Echoes">Sacred Heart Echoes: 1946 - 1953</a></li>
                        <li><a href="https://newmanu.libguides.com/archive_master/Newspaper_The_College_Crier">The College Crier: 1941</a></li>
                        <li><a href="https://newmanu.libguides.com/archive_master/Newspaper_Rorschach_Blot">Rorschach Blot: 1968</a></li>
                        <li><a href="https://newmanu.libguides.com/archive_master/Newspaper_The_Afterburner">The Afterburner: 1967-1969</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="bg-primary text-white p-4">
                        <h2>Pay it Forward</h2>
                        <p>Consider making a small donation to Newman University to show your support of these archival efforts.</p>
                        <p><a class="btn btn-light" href="https://give.newmanu.edu">Give to Newman</a></p>
                    </div>
                </div>
            </div>

        </div>
    </main>
</article>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
