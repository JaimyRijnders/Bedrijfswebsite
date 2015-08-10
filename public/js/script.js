
var scroll = function () {
    $("#nav a").click(function () {
        var target = this.href;
        var pos = target.lastIndexOf("#");
        var target = target.substring(pos + 1);
        $("html, body").animate({scrollTop: $("#" + target).position().top}, "slow");
        return false;
    });
};
$(document).ready(scroll);