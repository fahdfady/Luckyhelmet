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
// swiperjs
var swiper = new Swiper('.swiper-container', {
    slidesPerView: 'auto',
    spaceBetween: 30,
    loop: true,
    spaceBetween: 30,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});
// swiperjs

$(".outofstock").html("نفذت الكمية");

// password confirmation

function checkPasswordMatch() {
    var password = $("#newPassword").val();
    var confirmPassword = $("#confirmPassword").val();
    if (password != confirmPassword) {
        $("#confirmPassword").css({ "border-color": "#f00", "box-shadow": "rgb(210 10 10 / 25%) 0px 0px 0px 0.25rem" });
        console.log("no");
    }
    else {
        $("#confirmPassword").css({ "border-color": "#0f0", "box-shadow": "rgb(10 210 10 / 25%) 0px 0px 0px 0.25rem" });
        console.log("done");
    }
}
$(document).ready(function () {
    $("body").keyup(checkPasswordMatch);
});