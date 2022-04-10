$(document).ready(function () {
    $("#bt_about_pub").click(function () {
        $.ajax({
            url: "/about_pub",
            success: function (result) {
                $("#about").html(result);
            },
        });
    });

    $("#bt_edu_pub").click(function () {
        $.ajax({
            url: "/edu_pub",
            success: function (result) {
                $("#about").html(result);
            },
        });
    });

    $("#bt_work_pub").click(function () {
        $.ajax({
            url: "/work_pub",
            success: function (result) {
                $("#about").html(result);
            },
        });
    });

    $("#bt_skills_pub").click(function () {
        $.ajax({
            url: "/skills_pub",
            success: function (result) {
                $("#about").html(result);
            },
        });
    });
    $("#bt_contact_pub").click(function () {
        $.ajax({
            url: "/contact_pub",
            success: function (result) {
                $("#about").html(result);
            },
        });
    });
});
