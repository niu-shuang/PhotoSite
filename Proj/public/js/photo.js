$(document).ready( function() {
    $("#gallery a img")
        .fadeTo(1,1)
        .hover(
            function(){
                $(this).fadeTo(200, 0.5);
            },
            function(){
                $(this).fadeTo(300, 1);
            }
        )
        .click( function() {
            var changeSrc = this.src;
            var changeUrl = this.alt;
            $("#target").fadeOut(
                "fast",
                function() {
                    $(this).attr("src", changeSrc);
                    $("#imgMain a").attr("href", changeUrl);
                    $(this).fadeIn();
                }
            );
            return false;
        });
});
