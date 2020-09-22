<?php get_header(); ?>
<main class="content-main">
    <section class="bg-light-2">
        <div class="wrapper">
            <h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-8">

			

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

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
