var main = function() {
    $j('.testimonials_block_form').hide();
    $j('.submit-testimonials').on('click', function() {
        $j('.testimonials_block_form').fadeIn();
    });
    $j('.form-close').on('click', function() {
        $j('.testimonials_block_form').fadeOut();
    });
};
$j(document).ready(main);