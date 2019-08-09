$(function() {
    $(window).on("scroll touchmove", function () {
        $('.local-nav').toggleClass('scrolled', $(document).scrollTop() > 0);
    });

    $(".countdown-item-likes, .countdown-likes").click(function(e) {
        var ele = $(this);
        e.preventDefault();
        
        if (ele.data('requestRunning')) {
            return;
        }
        
        ele.data('requestRunning', true);

        $.ajax({
            type: "POST",
            url: "./ajax.php?to=like-dislike-countdown",
            dataType: 'json',
            data: {id: ele.data("id")},
            beforeSend: function() {
                ele.html('<i class="fas fa-cog fa-spin"></i>');
            },
            success: function(data) {
                if (data.status == "Increased") {
                    ele.html('<i class="fas fa-heart"></i> ' + data.likes);
                } else if (data.status == "Decreased") {
                    ele.html('<i class="far fa-heart"></i> ' + data.likes);
                }
            },
            complete: function() {
                ele.data('requestRunning', false);
            }
        });
    });

    $("#main-search").focus(function() {
        $("#main-search-list").slideToggle(300);
    }).blur(function() {
        $("#main-search-list").slideToggle(300);
    }).keyup(function() {
        var val = $(this).val();
        var list = $("#main-search-list");

        if (val.trim()) {
            $.ajax({
                type: "POST",
                url: "ajax.php?to=search-countdowns",
                data: {
                    val: val
                },
                success: function(data) {
                    if (data == "No result found") {
                        list.html("<li><a class='searching'>Sonuç bulunamadı.</a></li>")
                    } else {
                        list.html("");

                        var array = data.split("|");

                        array.forEach(function(link) {
                            list.append(link);
                        });
                    }
                }
            });
        }
    });
})