//menu burger
jQuery(document).ready(function($){
    $('.header-burger').click(function(event) {
       $('.header-burger,.header-menu').toggleClass('active');
       $('body').toggleClass('lock');
    });
});


//
jQuery(document).ready(function($){
    $(document).ready(function() {
        $('select').niceSelect();
    });
});


var page = 2;
jQuery(function($) {
    $('body').on('click', '.loadmore', function() {
        var data = {
            'action': 'load_posts_by_ajax',
            'page': page,
            'security': blog.security
        };

        $.post(blog.ajaxurl, data, function(response) {
            if($.trim(response) != '') {
                $('.blog-posts').append(response);
                page++;
            } else {
                $('.loadmore').hide();
            }
        });
    });
});


jQuery(function($){
    $('#true_loadmore').click(function(){
        $(this).text('Loading ...');
        var data = {
            'action': 'loadmore',
            'query': true_posts,
            'page' : current_page
        };
        $.ajax({
            url:ajaxurl,
            data:data,
            type:'POST',
            success:function(data){
                if( data ) {
                    $('#true_loadmore').text('OLDER POSTS').before(data);
                    current_page++;
                    if (current_page == max_pages) $("#true_loadmore").remove();
                } else {
                    $('#true_loadmore').remove();
                }
            }
        });
    });
});

jQuery(function($){
    $(document).ready(function(){
        $("#chck1").click();
    })
});


jQuery(document).ready(function($){
    $('.slides').slick({
        // lazyLoad: 'ondemand',
        slidesToShow:1,
        slidesToScroll: 1,
        arrows: true,
        adaptiveHeight: true,
        touchThreshold: 10,
        // fade: true,
        dots:true,

    });
});

// jQuery(function($){
//     $(document).ready(function(){
//         $('.content_toggle').click(function(){
//             $('.content_block').toggleClass('hide');
//             if ($('.content_block').hasClass('hide')) {
//                 $('.content_toggle').html('Read More ...');
//             } else {
//                 $('.content_toggle').html('Hide ...');
//             }
//             return false;
//         });
//     });
// });

//
// jQuery(function($){
//     $(window).scroll(function() {
//         var height = $(window).scrollTop();
//         /*Если сделали скролл на 100px задаём новый класс для header*/
//         if(height > 120){
//             $('.follow').addClass('follow_padding');
//         } else{
//             /*Если меньше 100px удаляем класс для header*/
//             $('.follow').removeClass('follow_padding');
//         }
//     });
// });


// Dynamic Adapt v.1
// HTML data-da="where(uniq class name),position(digi),when(breakpoint)"
// e.x. data-da="item,2,992"

"use strict";

(function () {
    let originalPositions = [];
    let daElements = document.querySelectorAll('[data-da]');
    let daElementsArray = [];
    let daMatchMedia = [];
    //Заполняем массивы
    if (daElements.length > 0) {
        let number = 0;
        for (let index = 0; index < daElements.length; index++) {
            const daElement = daElements[index];
            const daMove = daElement.getAttribute('data-da');
            if (daMove != '') {
                const daArray = daMove.split(',');
                const daPlace = daArray[1] ? daArray[1].trim() : 'last';
                const daBreakpoint = daArray[2] ? daArray[2].trim() : '767';
                const daType = daArray[3] === 'min' ? daArray[3].trim() : 'max';
                const daDestination = document.querySelector('.' + daArray[0].trim())
                if (daArray.length > 0 && daDestination) {
                    daElement.setAttribute('data-da-index', number);
                    //Заполняем массив первоначальных позиций
                    originalPositions[number] = {
                        "parent": daElement.parentNode,
                        "index": indexInParent(daElement)
                    };
                    //Заполняем массив элементов
                    daElementsArray[number] = {
                        "element": daElement,
                        "destination": document.querySelector('.' + daArray[0].trim()),
                        "place": daPlace,
                        "breakpoint": daBreakpoint,
                        "type": daType
                    }
                    number++;
                }
            }
        }
        dynamicAdaptSort(daElementsArray);

        //Создаем события в точке брейкпоинта
        for (let index = 0; index < daElementsArray.length; index++) {
            const el = daElementsArray[index];
            const daBreakpoint = el.breakpoint;
            const daType = el.type;

            daMatchMedia.push(window.matchMedia("(" + daType + "-width: " + daBreakpoint + "px)"));
            daMatchMedia[index].addListener(dynamicAdapt);
        }
    }
    //Основная функция
    function dynamicAdapt(e) {
        for (let index = 0; index < daElementsArray.length; index++) {
            const el = daElementsArray[index];
            const daElement = el.element;
            const daDestination = el.destination;
            const daPlace = el.place;
            const daBreakpoint = el.breakpoint;
            const daClassname = "_dynamic_adapt_" + daBreakpoint;

            if (daMatchMedia[index].matches) {
                //Перебрасываем элементы
                if (!daElement.classList.contains(daClassname)) {
                    let actualIndex = indexOfElements(daDestination)[daPlace];
                    if (daPlace === 'first') {
                        actualIndex = indexOfElements(daDestination)[0];
                    } else if (daPlace === 'last') {
                        actualIndex = indexOfElements(daDestination)[indexOfElements(daDestination).length];
                    }
                    daDestination.insertBefore(daElement, daDestination.children[actualIndex]);
                    daElement.classList.add(daClassname);
                }
            } else {
                //Возвращаем на место
                if (daElement.classList.contains(daClassname)) {
                    dynamicAdaptBack(daElement);
                    daElement.classList.remove(daClassname);
                }
            }
        }
        customAdapt();
    }

    //Вызов основной функции
    dynamicAdapt();

    //Функция возврата на место
    function dynamicAdaptBack(el) {
        const daIndex = el.getAttribute('data-da-index');
        const originalPlace = originalPositions[daIndex];
        const parentPlace = originalPlace['parent'];
        const indexPlace = originalPlace['index'];
        const actualIndex = indexOfElements(parentPlace, true)[indexPlace];
        parentPlace.insertBefore(el, parentPlace.children[actualIndex]);
    }
    //Функция получения индекса внутри родителя
    function indexInParent(el) {
        var children = Array.prototype.slice.call(el.parentNode.children);
        return children.indexOf(el);
    }
    //Функция получения массива индексов элементов внутри родителя
    function indexOfElements(parent, back) {
        const children = parent.children;
        const childrenArray = [];
        for (let i = 0; i < children.length; i++) {
            const childrenElement = children[i];
            if (back) {
                childrenArray.push(i);
            } else {
                //Исключая перенесенный элемент
                if (childrenElement.getAttribute('data-da') == null) {
                    childrenArray.push(i);
                }
            }
        }
        return childrenArray;
    }
    //Сортировка объекта
    function dynamicAdaptSort(arr) {
        arr.sort(function (a, b) {
            if (a.breakpoint > b.breakpoint) { return -1 } else { return 1 }
        });
        arr.sort(function (a, b) {
            if (a.place > b.place) { return 1 } else { return -1 }
        });
    }
    //Дополнительные сценарии адаптации
    function customAdapt() {
        //const viewport_width = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    }
}());


//

// jQuery(function($){
//     $(document).ready(function(){
//         $("#chck1").click();
//     })
// });
// (function($) { // Begin jQuery
//     $(function() { // DOM ready
//         // If a link has a dropdown, add sub menu toggle.
//         $('nav ul li a:not(:only-child)').click(function(e) {
//             $(this).siblings('.nav-dropdown').toggle();
//             // Close one dropdown when selecting another
//             $('.nav-dropdown').not($(this).siblings()).hide();
//             e.stopPropagation();
//         });
//         // Clicking away from dropdown will remove the dropdown class
//         $('html').click(function() {
//             $('.nav-dropdown').hide();
//         });
//         // Toggle open and close nav styles on click
//         $('#nav-toggle').click(function() {
//             $('nav ul').slideToggle();
//         });
//         // Hamburger to X toggle
//         $('#nav-toggle').on('click', function() {
//             this.classList.toggle('active');
//         });
//     }); // end DOM ready
// })(jQuery); // end jQuery
// //
//
// var div = document.querySelector('.menu-item-has-children');
// div.innerHTML += "<span class='menu__arrow'></span>";

"use strict"

const isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (
            isMobile.Android() ||
            isMobile.BlackBerry() ||
            isMobile.iOS() ||
            isMobile.Opera() ||
            isMobile.Windows()
        );
    }

};

if (isMobile.any()) {
    document.body.classList.add('_touch');

    let menuArrows = document.querySelectorAll('.menu__arrow');
    if (menuArrows.length > 0) {
        for (let index = 0; index < menuArrows.length; index++) {
            const menuArrow = menuArrows[index];
            menuArrow.addEventListener("click", function (a) {
                menuArrow.parentElement.classList.toggle('_active');
            });
        }
    }
} else {
    document.body.classList.add('_pc');
    let menuArrows = document.querySelectorAll('.menu__arrow');
    if (menuArrows.length > 0) {
        for (let index = 0; index < menuArrows.length; index++) {
            const menuArrow = menuArrows[index];
            menuArrow.addEventListener("click", function (a) {
                menuArrow.parentElement.classList.toggle('_active');
            });
        }
    }
}
// mobile menu

const iconMenu = document.querySelector('.menu__icon');
const iconBody = document.querySelector('.menu__body');
if (iconMenu) {
    iconMenu.addEventListener("click", function(e) {
        document.body.classList.toggle('_lock');
        iconMenu.classList.toggle('_active');
        iconBody.classList.toggle('_active');
    })
}




//


jQuery(function($){
    $(document).ready(function() {
        // Configure/customize these variables.
        var showChar = 87;  // How many characters are shown by default
        var ellipsestext = "";
        var moretext = "Read More";
        var lesstext = "Read Less";


        $('.more').each(function() {
            var content = $(this).html();

            if(content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function(){
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });
});





jQuery(document).ready(function($){
    $('.pads_gallery_images').slick({
        // lazyLoad: 'ondemand',
        slidesToShow:2,
        slidesToScroll: 1,
        arrows: true,
        // rows: 2,
        adaptiveHeight: true,
        touchThreshold: 10,
        // fade: true,
        dots:false,
        // autoplay: true,
        // autoplaySpeed: 4000,

        // asNavFor: ".slider-carmini"
        responsive: [

            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                }
            },
        ]
    });
});


jQuery(document).ready(function($){
    $('.certificates_items').slick({
        // lazyLoad: 'ondemand',
        slidesToShow:3,
        slidesToScroll: 1,
        arrows: true,
        // rows: 2,
        adaptiveHeight: true,
        touchThreshold: 10,
        // fade: true,
        dots:false,
        // autoplay: true,
        // autoplaySpeed: 4000,

        // asNavFor: ".slider-carmini"
        responsive: [

            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: true,
                }
            },
            {
                breakpoint: 601,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                }
            },
        ]
    });
});



jQuery(document).ready(function($){
    $('.blog_posts').slick({
        // lazyLoad: 'ondemand',
        slidesToShow:3,
        slidesToScroll: 1,
        arrows: true,
        // rows: 2,
        adaptiveHeight: true,
        touchThreshold: 10,
        // fade: true,
        dots:false,
        // autoplay: true,
        // autoplaySpeed: 4000,

        // asNavFor: ".slider-carmini"
        responsive: [

            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: true,
                }
            },
            {
                breakpoint: 601,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                }
            },
        ]
    });
});


document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});