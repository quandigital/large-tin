
function breakpoints() {
    var breakpoint = window.getComputedStyle(
       document.querySelector('body'), ':before'
    ).getPropertyValue('content');
    
    return breakpoint;
}