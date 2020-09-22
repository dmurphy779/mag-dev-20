<?php get_header(); ?>
<main class="content-main">
    <section class="bg-dark">
        <div class="wrapper">
    <h1><?php _e('Tag Archive | ', 'html5blank');
echo single_tag_title('', false); ?></h1>
            </div>
    </section>
    <section class="bg-light-2">
        <div class="wrapper">
            <main role="main">
                <!-- section -->
                <section>

                    
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
