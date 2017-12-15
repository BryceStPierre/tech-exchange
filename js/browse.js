$(function () {
    var parameters = {};
    
    // Parse any URL parameters into the 'parameters' object.
    var url = decodeURIComponent(window.location.search.substring(1));
    url.split('&').forEach(function (v) {
        var parts = v.split('=');
        parameters[parts[0]] = parts[1];
    });
    
    // Update filter select elements if parameters are in the URL.
    if (parameters.type)
        $('#type').val(parameters.type);
    if (parameters.category)
        $('#category').val(parameters.category);
    if (parameters.price)
        $('#price').val(parameters.price);
    if (parameters.search) {
        var search = parameters.search.split("+").join(" ");
        $('#search-label').html("Results for: '<b>" + search + "</b>'"); // Display 
    }
});
