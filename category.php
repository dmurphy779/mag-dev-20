<?php get_header(); ?>


<main class="mb-5">
    <div class="container">
        <div class="row">

            <?php get_template_part('loop'); ?>

        </div>
        <?php get_template_part('pagination'); ?>
    </div>
</main>

<?php get_footer(); ?>
