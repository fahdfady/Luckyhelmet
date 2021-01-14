function smoothScroll(target, duration) {

    var target = document.querySelector(target);

    var targetPosition = target.getBoundingClientRect().top;
    var startPosition = window.pageYOffset;
    // var distance = targetPosition - startPosition;
    var startTime = null;
    function ease(t, b, c, d) {
        t /= d;
        t--;
        return c * (t * t * t + 1) + b;
    }

    function animation(currentTime) {
        if (startTime === null) {
            startTime = currentTime;
        }
        var timeElapsed = currentTime - startTime;
        var runAnime = ease(timeElapsed, startPosition, targetPosition, duration);
        window.scrollTo(0, runAnime);
        if (timeElapsed < duration) {
            requestAnimationFrame(animation);
        }
    }
    requestAnimationFrame(animation);
}
var scrollButton = document.querySelector('.mouseScroll .botn');

if (scrollButton === null) {

}
else {
    scrollButton.addEventListener('click', function () {
        smoothScroll('.page-body', 800);
    });
}

// .page-header nav {
// background: #673da6 !important;
// direction: rtl;
// }

// $(function () {
//     $(document).scroll(function () {
//         var $nav = $(".page-header nav");
//         $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
//     });
// });

$(function () {
    $(document).scroll(function () {
        var $nav = $(".page-header nav");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
});
