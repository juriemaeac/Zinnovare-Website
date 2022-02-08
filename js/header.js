
$(window).scroll(function() {
if ($(window).scrollTop() >= 500) {
    $('.navbar').css('background', 'black');
} else {
    $('.navbar').css('background', 'transparent');
}
});