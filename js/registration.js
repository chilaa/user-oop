$(document).ready(function () {
    let validUsername = 0, validPassword = 0;


    $("#userName").blur(function () {

        //check if username is available
        let val = this.value;
        let request = $.ajax({
            url: "/checkUser",
            type: "POST",
            data: {userName: val},
            dataType: "text"
        });

        request.done(function (response) {
            if (response && val !== '') {
                console.log(response);
                $("#usernameStatus").text('Great UserName').css("background-color", 'lightgreen');

                validUsername = 1;
            } else {

                $("#usernameStatus").text("UserName already exists").css("background-color", "red")
                validUsername = 0;
            }
        });
    });

    let upperCase = new RegExp('[A-Z]');
    let lowerCase = new RegExp('[a-z]');
    let numbers = new RegExp('[0-9]');

    $("#password").on('input', function () {
        let str = this.value;
        if (str.match(upperCase) && str.match(lowerCase) && str.match(numbers)) {
            $("#passwordStatus").text('Great Password').css('background-color', 'lightgreen' , 'important');
            validPassword = 1;
        } else {
            $("#passwordStatus").text('Password must contain Uppercase, Lowercase and number').css("background-color", 'red', 'important');
            validPassword = 0;
        }

    })
    $(".input").on('input', function () {
        if (validPassword && validUsername) {
            $("#submit").removeAttr("disabled").css("background-color", "green")
        } else $("#submit").attr('disabled').css("background-color", "gray")
    });


});