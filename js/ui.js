$(function () {
    var path = window.location.pathname.split('/');
    var filename = path[path.length - 1];

    $('navbar-nav li').removeClass('active');

    if (filename !== '') {
        if (filename === 'browse.php')
            $('#navbar-browse').addClass('active');
        else if (filename === 'post.php' && window.location.search === '?type=buying')
            $('#navbar-buy').addClass('active');
        else if (filename === 'post.php' && window.location.search === '?type=selling')
            $('#navbar-sell').addClass('active');
    }
});