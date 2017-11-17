$(function () {
    var path = window.location.pathname.split('/');
    var filename = path[path.length - 1];

    $('navbar-nav li').removeClass('active');

    if (filename !== '') {
        if (filename === 'browse.php')
            $('#navbar-browse').addClass('active');
        else if (filename === 'post.php' && window.location.search === '?type=0')
            $('#navbar-sell').addClass('active');
        else if (filename === 'post.php' && window.location.search === '?type=1')
            $('#navbar-buy').addClass('active');
    }
});