
$(window).scroll(function() {
if ($(window).scrollTop() >= 100) {
    $('.navbar').css('background', 'black');
} else {
    $('.navbar').css('background', 'transparent');
}
});