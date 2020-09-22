<?php get_header(); ?>
<main class="content-main">
    <section class="bg-dark">
        <div class="wrapper">
            <div class="cat-header-img"><?php if (function_exists('z_taxonomy_image')) z_taxonomy_image(); ?></div>
    <h1><?php _e('| ', 'html5blank');
single_cat_title(); ?></h1>
            </div>
    </section>
    <section class="bg-light-2">
        <div class="wrapper">

            
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-8">
                    
                    <?php get_template_part('loop'); ?>

<?php get_template_part('pagination'); ?>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-4">
<?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
