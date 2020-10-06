jQuery(document).ready(function ($) {
    $('.btn').click(function () {
        $button_cat = $(this).attr('data-category');
        $('.home-category-grid-top, .home-category-grid-bottom').fadeOut('fast');
        $('.home-category-grid-bottom-'+$button_cat).fadeIn('slow');
        $('.category-grid-menu').fadeIn('slow');
        $("body,html").animate(
            {
                scrollTop: $(".home-category-grid").offset().top
            },
            800 //speed
        );
    });
})

// GDPR - Cookie Consent
// https://cookieconsent
window.addEventListener("load", function () {
    window.cookieconsent.initialise({
        "palette": {
            "popup": {
                "background": "#333333"
            },
            "button": {
                "background": "transparent",
                "border": "#ffffff",
                "text": "#ffffff"
            }
        },
        "content": {
            "message": "Newman University uses cookies to ensure you get the best experience on our site. By using our site, you agree to Newman's privacy policy. ",
            "href": "https://newmanu.edu/administration/university-relations/website-privacy-policy"
        }
    })
});
