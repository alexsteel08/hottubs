//
// jQuery(function($){
//     $(document).ready(function () {
//         var $element = $('.parallax');
//         var $follow = $element.find('.follow');
//         var followHeight = $element.find('.follow').outerHeight();
//         var height = $element.outerHeight();
//         var window_height = $(window).height();
//
//         $(window).scroll(function () {
//             var pos = $(window).scrollTop();
//             var top = $element.offset().top - 60;
//
//
//
//             // Check if element totally above or totally below viewport
//             if (top + height - followHeight < pos || top > pos + window_height) {
//                 return;
//             }
//
//
//             var offset = parseInt($(window).scrollTop() - top);
//
//             if (offset > 0) {
//                 $follow.css('transform', 'translateY('+ offset +'px)');
//             }
//
//         });
//     });
// });