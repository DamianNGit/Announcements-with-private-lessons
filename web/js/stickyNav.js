$(document).ready(function () {
                var stickyNavTop = $('nav').offset().top + 200;

                var stickyNav = function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > stickyNavTop) {
                        $('nav').addClass('sticky');
                    } else {
                        $('nav').removeClass('sticky');
                    }
                };
                stickyNav();
                $(window).scroll(function () {
                    stickyNav();
                });
            });