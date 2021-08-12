// loader


$(document).ready(function() {
	
	setTimeout(function(){
		$('body').addClass('loaded');
		// $('h1').css('color','#222222');
	}, 3000);
	
});

6

function smoothScroll() {


    // var startPosition = window.pageYOffset;
    // // var distance = targetPosition - startPosition;
    // var startTime = null;
    // function ease(t, b, c, d) {
    //     t /= d;
    //     t--;
    //     return c * (t * t * t + 1) + b;
    // }

    // function animation(currentTime) {
    //     if (startTime === null) {
    //         startTime = currentTime;
    //     }
    //     var timeElapsed = currentTime - startTime;
    //     var runAnime = ease(timeElapsed, startPosition, targetPosition, duration);
    //     window.scrollTo(0, runAnime);
    //     if (timeElapsed < duration) {
    //         requestAnimationFrame(animation);a
    //     }
    // }
    // requestAnimationFrame(animation);

    window.scrollTo(0, 600);
}

var scrollButton = document.querySelector('.mouseScroll .botn');
if (scrollButton === null);
else {
    scrollButton.addEventListener('click', function () {
        smoothScroll();
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

let $nav = $(".page-header nav.mainnav");

$(function () {
    $(document).scroll(function () {
        $nav.toggleClass('scrolled fixed-top', $(this).scrollTop() > $nav.height());
    });
});

$("button.navbar-toggler").click(
    function () {
        $nav.addClass("scrolled");
        $nav.addClass("fixed-top");
    }
);

$(".outofstock").html("نفذت الكمية");
$(".card .addtocart input").val("إضافة إلى العربة");

// $(".card .btn input").click(
//     function () {
//         $("a.cart.iconRound").addClass("animate__headShake");
//     }
// );

let cart = $("a.cart.iconRound i");



$($(".card .btn.addtocart")).click(function () {

    if ($(cart).hasClass("animate__animated") === true) {
        $(cart).removeClass("animate__animated animate__bounce");
    }
    else {
        $(cart).addClass("animate__animated animate__bounce");
    }
});

// $(".card .btn").click(function () {

//     $(cart).removeClass("animate__animated animate__bounce");

// });



var __slice = [].slice;

(function ($, window) {
    var Starrr;

    Starrr = (function () {
        Starrr.prototype.defaults = {
            rating: void 0,
            numStars: 5,
            change: function (e, value) { }
        };

        function Starrr($el, options) {
            var i, _, _ref,
                _this = this;

            this.options = $.extend({}, this.defaults, options);
            this.$el = $el;
            _ref = this.defaults;
            for (i in _ref) {
                _ = _ref[i];
                if (this.$el.data(i) != null) {
                    this.options[i] = this.$el.data(i);
                }
            }
            this.createStars();
            this.syncRating();
            this.$el.on('mouseover.starrr', 'span', function (e) {
                return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
            });
            this.$el.on('mouseout.starrr', function () {
                return _this.syncRating();
            });
            this.$el.on('click.starrr', 'span', function (e) {
                return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
            });
            this.$el.on('starrr:change', this.options.change);
        }

        Starrr.prototype.createStars = function () {
            var _i, _ref, _results;

            _results = [];
            for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
            }
            return _results;
        };

        Starrr.prototype.setRating = function (rating) {
            if (this.options.rating === rating) {
                rating = void 0;
            }
            this.options.rating = rating;
            this.syncRating();
            return this.$el.trigger('starrr:change', rating);
        };

        Starrr.prototype.syncRating = function (rating) {
            var i, _i, _j, _ref;

            rating || (rating = this.options.rating);
            if (rating) {
                for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                    this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
                }
            }
            if (rating && rating < 5) {
                for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                    this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                }
            }
            if (!rating) {
                return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
            }
        };

        return Starrr;

    })();
    return $.fn.extend({
        starrr: function () {
            var args, option;

            option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
            return this.each(function () {
                var data;

                data = $(this).data('star-rating');
                if (!data) {
                    $(this).data('star-rating', (data = new Starrr($(this), option)));
                }
                if (typeof option === 'string') {
                    return data[option].apply(data, args);
                }
            });
        }
    });
})(window.jQuery, window);

$(function () {
    return $(".starrr").starrr();
});

$(document).ready(function () {

    $('#stars').on('starrr:change', function (e, value) {
        $('#count').html(value);
    });

    $('#stars-existing').on('starrr:change', function (e, value) {
        $('#count-existing').html(value);
    });
});

$(".wishlist .card .wish i").addClass("clicked");

$(".wish.layer i").click(function () {
    $(this).toggleClass("clicked");
    // $(".card .wish i.clicked").prop("title", "إزالة من قائمة الأماني");
});


$(".card .wish i").prop("title", "إضافة إلى قائمة المفضلة");


$(".modal").addClass("animate__animated animate__zoomIn animate__faster");


// ; (function (document, window, index) {
//     var inputs = document.querySelectorAll('.inputfile');
//     Array.prototype.forEach.call(inputs, function (input) {
//         var label = input.nextElementSibling,
//             labelVal = label.innerHTML;

//         input.addEventListener('change', function (e) {
//             var fileName = '';
//             if (this.files && this.files.length > 1)
//                 fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
//             else
//                 fileName = e.target.value.split('\\').pop();

//             if (fileName)
//                 label.querySelector('span').innerHTML = fileName;
//             else
//                 label.innerHTML = labelVal;
//         });

//         // Firefox bug fix
//         input.addEventListener('focus', function () { input.classList.add('has-focus'); });
//         input.addEventListener('blur', function () { input.classList.remove('has-focus'); });
//     });
// }(document, window, 0));

let $editBtn = $('.input-group .edit-btn');
let $editInput = $('.input-group .edit-input');

$editBtn.click(function () {
    $editInput.removeAttr("disabled");
    $editInput.prop("placeholder", "أضف اسمك الجديد");
});


let $editBtnEmail = $('.input-group .edit-btn-email');
let $editInputEmail = $('.input-group .edit-input-email');

$editBtnEmail.click(function () {
    $editInputEmail.removeAttr("disabled");
    $editInputEmail.prop("placeholder", "أَضف البريد الإلكتروني الجديد");
    console.log("clicked");
});


$("input.form-control").attr("oninvalid", "this.setCustomValidity('إملأ هذا الحقل رجاءًا');");

$("input.form-control").attr("onchange", "this.setCustomValidity('');");


let $productCounter = $('input.product-count');

$productCounter.attr("value", "1");
$productCounter.attr("min", "1");

// $(document).ready(function () {
//     jQuery($productCounter).each(function () {
//         var spinner = jQuery(this),
//             btnUp = spinner.find('.btn-group.add-minus-btn .product-add'),
//             btnDown = spinner.find('.btn-group.add-minus-btn .product-minus'),
//             min = input.attr('min')

//         btnUp.click(function () {
//             var newVal = oldValue + 1;
//             spinner.find("input").val(newVal);
//             spinner.find("input").trigger("change");
//         });

//         btnDown.click(function () {
//             var oldValue = parseFloat($productCounter.val());
//             if (oldValue <= min) {
//                 var newVal = oldValue;
//             } else {
//                 var newVal = oldValue - 1;
//             }
//             spinner.find("input").val(newVal);
//             spinner.find("input").trigger("change");
//         });

//     });
// });

$("input#butlogin").click(function () {
    $('div#error.alert-danger').delay(5000).fadeOut('slow');
});

// $(".disabled-payment input[type=radio]").prop("disabled");


// password confirmation

function checkPasswordMatch() {
    let password = $("#password");
    let confirmPassword = $("#confirmPassword");

    if ($(password).val().length < 8) {
        $(password).css({ "border-color": "#f00", "box-shadow": "rgb(210 10 10 / 25%) 0px 0px 0px 0.25rem" });
    }
    if ($(password).val().length >= 8) {
        $(password).css({ "border-color": "#0f0", "box-shadow": "rgb(10 210 10 / 25%) 0px 0px 0px 0.25rem" });
    }

    else if ($(password).val() != $(confirmPassword).val()) {
        $(confirmPassword).css({ "border-color": "#f00", "box-shadow": "rgb(210 10 10 / 25%) 0px 0px 0px 0.25rem" });
    }

    else if ($(password).val() === $(confirmPassword).val() && $(password).val().length >= 8) {
        $(confirmPassword).css({ "border-color": "#0f0", "box-shadow": "rgb(10 210 10 / 25%) 0px 0px 0px 0.25rem" });
        $(password).css({ "border-color": "#0f0", "box-shadow": "rgb(10 210 10 / 25%) 0px 0px 0px 0.25rem" });
    }

    else {
        $(confirmPassword).css({ "border-color": "#0f0", "box-shadow": "rgb(10 210 10 / 25%) 0px 0px 0px 0.25rem" });
        $(password).css({ "border-color": "#0f0", "box-shadow": "rgb(10 210 10 / 25%) 0px 0px 0px 0.25rem" });
    }

    if ($(password).val().length === null || $(confirmPassword).val().length === null) { }
}


$(document).ready(function () {
    $("login").keyup(checkPasswordMatch);
});