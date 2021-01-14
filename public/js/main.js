$(".readMoreMsg").click(function() {
    console.log("Hello");
    if ($(".message_box").height() == 200) $(this).animate({ maxHeight: 800 }, 1000);
    else $(".message_box").animate({ maxHeight: 200 }, 1000);
});
