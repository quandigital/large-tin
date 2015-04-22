function breakpoints() {
    var breakpoint = window.getComputedStyle(
       document.querySelector('html'), ':before'
    ).getPropertyValue('content');
    
    return breakpoint.replace(/'/g, '');
}

$.fn.extend({
    cssUnit: function(cssDeclaration) {
        var cssDec = $(this).css(cssDeclaration);
        return cssUnit(cssDec);
    }
});

function cssUnit(cssValue) {
    var cssArr = cssValue.match('([0-9]*)([a-z]*)');
    return [cssArr[1], cssArr[2]];
}

$.urlParam = function(name) {
    var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
}
