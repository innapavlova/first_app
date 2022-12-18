import $ from "jquery";

$(document).ready(function() {
    $('.view-details').click(function() {
        var id = $(this).data('user-id');

        alert(id)
    });
});
