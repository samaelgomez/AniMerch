$(document).ready(function () {
    $("#category2").hide();
    $("#category3").hide();
    $("#show_even_more").hide();
    $("body").on("click", "#show_more", function() {
        $("#category2").show();
        $("#show_more").hide();
        $("#show_even_more").show();
    });
    $("body").on("click", "#show_even_more", function() {
        $("#category3").show();
        $("#show_even_more").hide();
    });
});