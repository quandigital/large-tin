jQuery(document).ready(function(a){a("#message").on("focus",function(){a(this).hasClass("placeholder")&&a(this).removeClass("placeholder").html("&nbsp;")}).on("blur",function(){0==a.trim(a(this).length)&&a(this).text("Tell us a little about what you are looking for").addClass("placeholder")}),a("#contact").on("submit",function(b){if(b.preventDefault(),a.trim(a("#message").length)<5)return alert("Please tell us something nice"),!1;a("#send").attr("disabled","disabled").parent().append(a("<div>").addClass("spinner"));var c={action:"fr_send_email",name:a('[name="name"]').val(),phone:a('[name="phone"]').val(),email:a('[name="email"]').val(),message:a("#message").val()};a.post(ajaxurl,c,function(b){b&&(a(".spinner").remove(),a("#send").removeClass("sending").addClass("sent").text("Message sent"))})})});