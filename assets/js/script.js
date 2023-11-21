$(function () {
    // include path
    const include_path = $('input[name="include_path"]').val();

    // showing posts when clicking on post cards
    $('.posts-content .post').on('click', function () {
        $(this).find('a')[0].click();
    })
})

function restart() {
    document.addEventListener('click', () => {
        location.reload()
    })
}

// document.addEventListener('DOMContentLoaded', function () {
//     const postsSection = document.getElementById('postsSection');

//     const postsExist = document.querySelector('.posts-content .post');
//     if (!postsExist) {
//         // Se não houver posts, define a altura da seção para 100vh
//         postsSection.style.height = '100vh';
//     }
// });
