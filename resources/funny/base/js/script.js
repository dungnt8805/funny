$(document).ready(function() {
// show-pagination
    $('.toggle-pagination').click(function(f) {
        $(this).next('.pagination-responsive').slideToggle();
        $(this).toggleClass('active');
        f.preventDefault()
    });
});