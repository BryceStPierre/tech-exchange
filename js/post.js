$(function () {
    var parameters = {};
    
    // If the type parameter is found in the URL, update the type select element.
    var url = decodeURIComponent(window.location.search.substring(1));
    
    url.split('&').forEach(function (v) {
        var parts = v.split('=');
        parameters[parts[0]] = parts[1];
    });
    
    if (parameters.type)
        $('#type').val(parameters.type);

    // Hide dollar price input if the ad item is Free or requires Contact.
    $('input[type=radio][name="price-option"]').change(function () {
        $('#price-group').show();
        if ($(this).val() != 1)
            $('#price-group').hide();
    });

    // Update preview image of the selected ad image to be uploaded.
    $('#image').change(function () {
        var file = document.querySelector('#image').files[0];
        var reader = new FileReader();
    
        reader.onloadend = function () {
            $('#image-preview').attr('src', reader.result);
        };
    
        if (file)
            reader.readAsDataURL(file);
        else
            $('#image-preview').attr('src', 'img/dummy.png');
    });
});