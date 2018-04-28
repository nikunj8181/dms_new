var Login = function() {

    var baseUrl=$('#hiddenUrl').val();

    var handleLogin = function() {
        $('#login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            messages: {
                email: {
                    required: "Username is required."
                },
                password: {
                    required: "Password is required."
                },
                CaptchaCode{
                    required: "Captcha is required."
                }
            },
            rules: {
                email: {
                    required: true
                },
                password: {
                    required: true
                },
                CaptchaCode: {
                    required: true
                },
                remember: {
                    required: false
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   
                $('.alert-danger', $('#login-form')).show();
            },

            errorPlacement: function(error, element) {
                if (element.is(':checkbox')) {
                    error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                } else if (element.is(':radio')) {
                    error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                form.submit(); // form validation success, call ajax form submit
            }
        });

    }


    var AdminchangePassword = function() {
        var form1 = $('#AdminchangePassword');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: ".ignore", // validate all fields including form hidden input
            messages: {
                oldpwd: {
                    required: "Please enter old password.",
                    remote: "Old password is incorrect."
                },
                password: {
                    required: "Please enter new password.",
                    minlength: "Your password must contain more than 6 characters."
                },
                cfpassword: {
                    required: "You must confirm your password.",
                    minlength: "Your password must contain more than 6 characters.",
                    equalTo: "Password not match." // custom message for mismatched passwords
                }
            },
            rules: {
                oldpwd: {
                    required: true,
                    remote: {
                        url: baseUrl+"login/checkAdminOldpwd",
                        type: "post"
                    }
                },
                password: {
                    required: true,
                    minlength: 6
                },
                cfpassword: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit              
                //success1.hide();
                error1.show();
                //App.scrollTo(error1, -200);
            },

            errorPlacement: function(error, element) {
                if (element.is(':checkbox')) {
                    error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                } else if (element.is(':radio')) {
                    error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function(form) {
                /*success1.show();
                error1.hide();*/
                form.submit();
            }
        });
    }

    var setPForm = function() {
        var form2 = $('#setPForm');
        var error1 = $('.alert-danger', form2);
        var success1 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {
                password: {
                    required: "What is your password?",
                    minlength: "Your password must contain more than 6 characters"
                },
                cfPassword: {
                    required: "You must confirm your password",
                    minlength: "Your password must contain more than 6 characters",
                    equalTo: "Your Passwords Must Match" // custom message for mismatched passwords
                }
            },
            rules: {
                password: {
                    required: true,
                    minlength: 6
                },
                cfPassword: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit              
                success1.hide();
                //error1.show();
                App.scrollTo(error1, -200);
            },

            errorPlacement: function(error, element) {
                if (element.is(':checkbox')) {
                    error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                } else if (element.is(':radio')) {
                    error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function(form) {
                success1.show();
                error1.hide();
                form.submit();
            }
        });
    }

    return {
        //main function to initiate the module
        init: function() {

            handleLogin();
            AdminchangePassword();
            setPForm();
            // init background slide images
            $('.login-bg').backstretch([
                "../assets/pages/img/login/bg1.jpg",
                "../assets/pages/img/login/bg2.jpg",
                "../assets/pages/img/login/bg3.jpg"
                ], {
                  fade: 1000,
                  duration: 8000
                }
            );

        }

    };

}();

jQuery(document).ready(function() {
    Login.init();
});