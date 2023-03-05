$(".mobile_menu_trigger").click(function() {
    $('.sidebar_container').addClass('show_sidebar');
    $('body').addClass('overlay');

})

$(".side_bar_close").click(function() {
    $('.sidebar_container').removeClass('show_sidebar');
    $('body').removeClass('overlay');

})