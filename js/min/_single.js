function titleScroll(){$(window).on("scroll",function(){var a=$(window).scrollTop();$(".single-title").css("top",30+.025*a+"vh"),a/$(window).height()>=.01?$("#sidebar .author").css("opacity",1-2*(a/$(window).height()).toFixed(2)):$("#sidebar .author").css("opacity",1),a/$(window).height()>=.45?$("#sidebar, .navigation-corner").addClass("fade"):$("#sidebar, .navigation-corner").removeClass("fade")})}jQuery(document).ready(function(a){hljs.initHighlightingOnLoad(),"large"==breakpoints()&&titleScroll(),a(window).smartresize(function(){"large"!==breakpoints()&&(a(".single-title, #sidebar .author").removeAttr("style"),a("#sidebar, .navigation-corner").removeClass("fade"),a(".single-title").removeAttr("style"))})});