$(function () {
    var parameters = {};
    
    var url = decodeURIComponent(window.location.search.substring(1));
    
    url.split('&').forEach(function (v) {
        var parts = v.split('=');
        parameters[parts[0]] = parts[1];
    });
    
    if (parameters.type)
        $('#type').val(parameters.type);
    if (parameters.category)
        $('#category').val(parameters.category);
    if (parameters.price)
        $('#price').val(parameters.price);
    if (parameters.search) {
        var search = parameters.search.split("+").join(" ");
        $('#search-label').html("Results for: '<b>" + search + "</b>'");
    }
});
