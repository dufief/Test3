// Make scroll with click toward top
$('.lien_synopsis').on('click', function() {
    $('html, body').animate({
        scrollTop: $(this).offset().top
    }, 800);
});

// ------- Make Appear and hide the button for go back up in top page -------

// active the class .scrollup can scroll > 800 px
$(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.scrollup').fadeIn();
    } else {
        $('.scrollup').fadeOut();
    }
});

// Go back top when click
$('.scrollup').click(function () {
    $("html, body").animate({
        scrollTop: 0
    }, 1000);
    return false;
});

// ------- Hide Header on on scroll down -------

var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('header').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();

    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;

    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('header').removeClass('nav-down').addClass('nav-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('header').removeClass('nav-up').addClass('nav-down');
        }
    }

    lastScrollTop = st;
}


$('.slider').bxSlider({
    auto:true,
    controls:false,
    pager:false
});