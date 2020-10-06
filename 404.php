<?php get_header(); ?>
<main class="mb-5">
    <div class="container">
        <p>Hmmmm... We couldn't find that. Should we try to find something else?</p>
        <div class="row">
            <div class="col-md-6">
                <div class="bg-primary p-5">
                    <form role="search" method="get" class="search-form" id="searchform"
                          action="<?php echo home_url('/'); ?>">

                        <div class="input-group">
                            <input type="search" id="s" class="form-control search-field"
                                   placeholder="<?php echo esc_attr_x('Search…', 'placeholder') ?>"
                                   value="<?php echo get_search_query() ?>" name="s"
                                   title="<?php echo esc_attr_x('Search for:', 'label') ?>"/>

                            <button class="btn my-2 my-sm-0" type="submit"><i class="fas fa-search"
                                                                              aria-label="Submit Search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div style="width:100%;height:0;padding-bottom:56%;position:relative;">
                    <iframe src="https://giphy.com/embed/3EiNpweH34XGoQcq9Q" width="100%" height="100%"
                            style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
                </div>
                <p><a href="https://giphy.com/gifs/3EiNpweH34XGoQcq9Q">via GIPHY</a></p>

            </div>
        </div>



    </div>
</main>

<?php get_footer(); ?>
