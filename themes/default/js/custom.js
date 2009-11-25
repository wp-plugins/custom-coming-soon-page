/**
 * @Copyright CSSJockey - Unique & Practical Web Presence
 * @Website: http://www.cssjockey.com
 * @Terms of Use: http://www.cssjockey.com/terms-of-use
 * If you change the contents below sky might fall on your head!
 */
$(document).ready(function(){
    $("form#cjsp-sendsubscriber").submit(function(){
        var emailFormat = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
        var email = $("#cjsp-semail");
        if (email.val() == "Your Email" || email.val() == "" || email.val() == "Thank you") {
            alert("Please enter your email address!");
            email.focus();
            return false;
        }
        else
            if (email.val().search(emailFormat) == -1) {
                alert("Please enter valid email address!");
                email.focus();
                return false;
            }
            else {
                var url = $(this).attr('action');
                var dataString = $('.aform').serialize();
                var update = url.split("#")[1];
                $.ajax({
                    type: "POST",
                    url: "" + url + "",
                    data: dataString,
                    success: function(response){
                        $('#' + update + "").html(response);
                        $("#cjsp-smessage").removeClass("cjsp-sploading");
                        $(email).val('Enter your email address');
                        $("#cjsp-semail").val('Thank you');
                    }
                });
            }
        return false;
    })


    $("#cjsp-smessage").ajaxStart(function(){
        $("#cjsp-semail").val('Please wait..');
        $(this).html("&nbsp;");
        $(this).addClass("cjsp-sploading");
        return false;
    });

})
