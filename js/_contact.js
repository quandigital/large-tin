$(document).ready(function() {
    window.element = initialization();

    $(document).on('keypress', '.edit', function(e) {
        if (e.which == 13) {
            if (window.step == 2) {
                return;
            }
            e.preventDefault();

            if (window.step == 3) {
                if (!validateContact()) {
                    return false;
                }
            }

            if ($(e.target).hasClass('empty')) {
                errorHandler('empty');
            } else {
                nextStep();
            }
        }
    });

    $(document).on('click', '.edit', function(e) {
        if ($(e.target).outerWidth() + $(e.target).offset().left < e.clientX) {
            if (window.step == 3) {
                if (!validateContact()) {
                    return false;
                }
            }
            if ($(e.target).hasClass('empty')) {
                errorHandler('empty');
            } else {
                nextStep();
            }
        }
    });

    $(document).on('keydown', '.edit', function(e) {
        setTimeout(function(){
            if (window.step < 3) {
                if ($.trim($(e.target).text()).length > 3) {
                    $(e.target).removeClass('empty');
                } else {
                    $(e.target).addClass('empty');
                } 
            }

            if (e.which == 8 || e.which == 46) {
                if ($.trim($(e.target).text()).length == 0) {
                    $(e.target).html('&nbsp;');
                }
            }
        }, 1);
    });

    $(document).on('focus', '.edit', function(e) {
        var char = $(e.target).text().length;
        var sel;

        if (document.selection) {
            sel = document.selection.createRange();
            sel.moveStart('character', char);
            sel.select();
        } else {
            sel = window.getSelection();
            
            var next = e.target;
            while (next.lastChild !== null) {
                next = next.lastChild;
            }
            
            char = $.trim(next.textContent).length;
            sel.collapse(next, char);
        }
    });

    $(document).on('click', '.bcb.done', function(e) {
        window.location.href = '?step=' + $(e.target).children('.step').data('step');
    });
});

    $(window).on('popstate', function(e) {
        $('.bcb').removeClass('done').removeClass('active').removeClass('inactive');
        window.element = initialization();
    });

function setElement() {
    var curParent; 
    breadcrumbs();
    switch (window.step) {
        case 1:
            curParent = $('#name');
            window.history.replaceState(history.state, 'Step 1', window.location.pathname + '?step=1');
            step1();
            break;
        case 2:
            curParent = $('#project');
            step2();
            break;
        case 3:
            curParent = $('#details');
            step3();
            break;
        case 4:
            curParent = $('#review');
            step4();
            break;
    }

    curParent.show();

    // single edit element
    var curElement = curParent.children('.edit');
    setTimeout(function() {
        curElement.focus();
    }, 100);
    
    // multiple edit elements
    if (curElement.length == 0) {
        curElement = curParent.find('.edit');
    }

    return window.element = {'parent': curParent, 'child': curElement};
}

function initialization() {
    if ($.urlParam('step') == null) {
        window.step = 1;
    } else {
        window.step = parseInt($.urlParam('step'));
    }

    $('section').hide();
    return setElement();
}

function step1() {
    if (sessionStorage.getItem('name') !== null) {
        $('#name .edit').text(sessionStorage.getItem('name'));
    } else {
        $('#name .edit').html('&nbsp;').addClass('empty');
    }
}

function step2() {
    $('#return-name').text(sessionStorage.getItem('name'));

    if (sessionStorage.getItem('project') !== null) {
        $('#project .edit').html(sessionStorage.getItem('project'));
    } else {
        $('#project .edit').html('&nbsp;').addClass('empty');
    }

    $(document).on('keyup', '#project .edit', function() {
        $('#project .edit').find('*').removeAttr('style');
    });
}

function step3() {
    var contacts = ['phone', 'email'], 
        conLen = [];
    $.each(contacts, function(index, val) {
        if (sessionStorage.getItem(val) !== null) {
            $('#'+val).text(sessionStorage.getItem(val));
            if ($.trim(sessionStorage.getItem(val)).length > 0) {
                $('#'+val).siblings('.label').hide()
            }
        }
        conLen[val] = $.trim($('#'+val).text()).length;
    });
        
    if (conLen.phone == 0 && conLen.email == 0) {
        $('#email, #phone').addClass('empty');
    } else {
        setTimeout(function() {
            var e = jQuery.Event('keydown');
            e.which = e.keyCode = 40;
            $('#email, #phone').trigger(e);
        }, 1);
    }

    $(document)
        .on('keypress', '#email, #phone', function(e) {
            setTimeout(function() {
                if ($.trim($(e.target).text()).length > 0) {
                    $(e.target).siblings('.label').hide();
                } else {
                    $(e.target).siblings('.label').show();
                }
            }, 1);
        })
        .on('keydown', '#email, #phone', function(e) {
            setTimeout(function() {
                console.log(e.target);
                if ($.trim($(e.target).text()).length > 0) {
                    $(e.target).siblings('.label').hide();
                        
                    dummyWidth($(e.target));
                } else {
                    $(e.target).siblings('.label').show();
                }

                if ($.trim($('#email, #phone').text()).length < 4) {
                    $('#email, #phone').addClass('empty');
                }

                if ($.trim($('#email, #phone').text()).length > 3) {
                    $('#email, #phone').removeClass('empty');
                }

            }, 1);
        })
        .on('focus', '#email, #phone', function(e) {
            if ($.trim($(e.target).text()).length == 0) {
                $(e.target).html('&nbsp;');
            }
        });
}

function step4() {
    var returns = ['name', 'project', 'email', 'phone'];
    var emailData = {};
    $.each(returns, function(index,val) {
        if (sessionStorage.getItem(val) !== null) {
            $('#review-' + val).children('.result').html(sessionStorage.getItem(val));
        }
        if ($.trim($('#review-' + val).text()).length == 0) {
           $('#review-' + val).remove();
        }

        emailData[val] = sessionStorage.getItem(val);
    });

    $('#send').on('click', function() {
        emailData['action'] = 'send_email';
        $('#send').removeClass('default').addClass('sending').text('Sending');
        $.post(ajaxurl, emailData, function(response) {
            $('#send').removeClass('sending').addClass('sent').text('Message sent');
        });
    })
}

function validateContact() {
    var err = false;

    if ($.trim($('#email').text()).length > 0 && $.trim($('#email').text()).match(/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}/i) == null) {
        errorHandler('email');
        err = true;
    }

    if ($.trim($('#phone').text()).length > 0 && $.trim($('#phone').text()).match(/^\+*?[\d\/\\\-\s\(\)]*?$/) == null) {
        errorHandler('phone');
        err = true;
    }

    return !err;
}

function nextStep() {
    if (window.element.child.length == 1) {
        if (window.element.child.text().length == 0) {
            console.log(window.element.child.html()); 
            return false;
        }
    }

    if (step == 2) {
        console.log($(window.element.child).html());
        sessionStorage.setItem($(window.element.child).data('key'), $(window.element.child).html());
    } else {
        $.each(window.element.child, function(index, el) {
            sessionStorage.setItem($(el).data('key'), $.trim($(el).text()));
        });
    }

    window.element.parent.hide();

    window.step++;
    window.history.pushState(history.state, 'Step ' + window.step, window.location.pathname + '?step=' + window.step);

    window.element = setElement();
}

function errorHandler(err) {
    
    if ($(window.element.parent).find('.error').length > 0) {
        $(window.element.parent).find('.error').remove();
    }

    var errEl = $('<span>').addClass('error');
    $(window.element.child[0]).after(errEl);

    console.log([err, window.element.parent[0].id]);
    switch (err) {
        case 'empty' :
            switch (window.element.parent[0].id) {
                case 'name' :
                    errEl.text('Please add a name');
                    break;
                case 'project' :
                    errEl.text('Please tell us a little bit about your project.');
                    break;
                case 'details' :
                    errEl.text('Please provide us with a way to contact you.');
                    break;
            }
            break;
        case 'email' :
            case 'details' :
            errEl.text('Please add a valid email address.');
            break;
    }

}

function breadcrumbs() {
    switch (window.step) {
        case 1 :
            $('.bcb-first').addClass('active');
            $('.bcb-second').addClass('inactive');
            $('.bcb-third').addClass('inactive');
            $('.bcb-fourth').addClass('inactive');
            break;
        case 2 :
            $('.bcb-first').addClass('done').removeClass('active');
            $('.bcb-second').addClass('active').removeClass('inactive');
            $('.bcb-third').addClass('inactive');
            $('.bcb-fourth').addClass('inactive');
            break;
        case 3 :
            $('.bcb-first').addClass('done');
            $('.bcb-second').addClass('done').removeClass('active');
            $('.bcb-third').addClass('active').removeClass('inactive');
            $('.bcb-fourth').addClass('inactive');
            break;
        case 4 :
            $('.bcb-first').addClass('done');
            $('.bcb-second').addClass('done');
            $('.bcb-third').addClass('done').removeClass('active');
            $('.bcb-fourth').addClass('active').removeClass('inactive');
            break;
    }
}

function dummyWidth(el)
{
    var dummy = el.siblings('.width-dummy');
    dummy.text($.trim(el.text()));

    if (dummy.width() >= el.width()) {
        var fz = parseInt(el.css('font-size'));
        while (dummy.width() >= el.width()) {
            fz = fz - 1;
            el.css('font-size', fz + 'px'); 
            dummy.css('font-size', fz + 'px'); 
        }
    }
}