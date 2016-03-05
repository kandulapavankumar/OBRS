function validation() {
    if(has_identity == 0){
        var email = $('[name="email"]').val();
        var password = $('[name="password"]').val();
        var confirm_password = $('[name="confirm_password"]').val();
        if(email == "" || password == "" || confirm_password == ""){
            showMessage("Please enter Required(*) Fields." , "error");

            return false;
        }

        if(confirm_password != password){
            showMessage("Invalid Confirm Password." , "error");

            return false;
        }

        if($('[name="terms"]:checked').length == 0){
            showMessage("Please Accept Terms & Conditions." , "error");

            return false;
        }

        var request = $.ajax({
            'url': baseUrl + '/application/index/is-mail-exist',
            'type': 'post',
            'data': {
                'email_id': email
            },
            'success': function(response, textStatus, jqXHR) {
                if (response.success) {
                    if(response.email_exists){
                        showMessage("Email has already registered." , "error");

                        return false;
                    } else {

                        submitForm();
                    }
                } else {
                    showMessage("Problem with server try later." , "error");

                    return false;
                }
            }
        });

        request.fail(function(jqXHR, textStatus) {
            showMessage("Problem with Internet try later." , "error");

            return false;
        });
    } else {
        var password = $('[name="password"]').val();
        var confirm_password = $('[name="confirm_password"]').val();
        if(password == "" || confirm_password == ""){
            showMessage("Please enter Password." , "error");

            return false;
        }

        if(confirm_password != password){
            showMessage("Invalid Confirm Password." , "error");

            return false;
        }

        if($('[name="terms"]:checked').length == 0){
            showMessage("Please Accept Terms & Conditions." , "error");

            return false;
        }

        submitForm();
    }

    return false;
}

function showMessage(msg, type){
    scrollTo(0,0);
    if (type == "error"){
        color = "red";
    } else {
        color = "green";
    }
    $('.profile_msg_div').html('<span style="color: ' + color +'">' + msg +'</span>');
}

function submitForm(){
    addElements();
    $('#profile-form').submit();
}
function addElements(){
    var security_question = $('[name="security_question"]').val();
    if(security_question == 0){
        security_question = null;
    }
    var news = $('[name="news"]:checked').length;

    $('[name="security_question_id"]').val(security_question);
    $('[name="news_required"]').val(news);

}