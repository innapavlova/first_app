import $ from "jquery";

$(document).ready(function() {
    $('.remove-bonus').on('click', function () {
        if (confirm('Are you sure to remove?')) {
            const row = $(this).parents("tr:first"),
                dataID = row.find(".dataID").html();
            removeBonus(dataID, row);
        }
    });
});

function removeBonus(id, row) {
    $.ajax(
        {
            type: 'GET',
            dataType: "json",
            async: false,
            url: '/softDeleteUserBonuses/' + id,
            success: function (response) {
                if (response.success) {
                    row[0].remove();
                }
            },
            error: function () {}
        });
}
