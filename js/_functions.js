
function breakpoints() {
    var breakpoint = window.getComputedStyle(
       document.querySelector('body'), ':before'
    ).getPropertyValue('content');
    
    return breakpoint;
}

$.fn.extend({
    cssUnit: function(cssDeclaration) {
        var cssDec = $(this).css(cssDeclaration);
        return cssUnit(cssDec);
    }
});

function cssUnit(cssValue) {
    var cssArr = cssValue.match("([0-9]*)([a-z]*)");
    return [cssArr[1], cssArr[2]];
}
