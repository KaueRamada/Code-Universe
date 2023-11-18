$(function() {
    // include path
    const include_path = $('input[name="include_path"]').val();

    // showing posts when clicking on post cards
    $('.posts-content .post').on('click', function() {
        $(this).find('a')[0].click();
    })
})
