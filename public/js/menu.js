$(document).ready(function () {
    $("#bt_about").click(function () {
        $.ajax({
            url: "/about",
            success: function (result) {
                $("#about").html(result);
            },
        });
    });

    $("#bt_edu").click(function () {
        $.ajax({
            url: "/edu",
            success: function (result) {
                $("#about").html(result);
            },
        });
    });

    $("#bt_work").click(function () {
        $.ajax({
            url: "/work",
            success: function (result) {
                $("#about").html(result);
            },
        });
    });

    $("#bt_skills").click(function () {
        $.ajax({
            url: "/skills",
            success: function (result) {
                $("#about").html(result);
            },
        });
    });
    $("#bt_contact").click(function () {
        $.ajax({
            url: "/contact",
            success: function (result) {
                $("#about").html(result);
            },
        });
    });
});
