$(function() {

    function showContact() {

        $.ajax({
            method: "GET",
            url: "refs",
            dataType: "json",
            success: (function (data) {
                data.forEach(function(item) {
                    $('#' + item.attr_id).attr('href', item.attr_ref);
                });
            }),
            error: (function (err) {
                console.log(err);
            })
        });

    }

    showContact();

    $('[data-toggle="tooltip"]').tooltip();

});
