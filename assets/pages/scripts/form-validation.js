var FormValidation = function () {

    var baseUrl=$('#hiddenUrl').val();
    var id = $('#id').val();

    // basic validation
    var form_addUser = function() {
        if(id > 0){
            var checkMail = baseUrl+"user/checkMail/"+id;
        }else{
           var checkMail = baseUrl+"user/checkMail"; 
        }
            var form1 = $('#form_addUser');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    FirstName: {
                        remote: "First name already exist!"
                    },
                    email: {
                        remote: "Email already exist!"
                    },
                    password: {
                        required: "What is your password?",
                        minlength: "Your password must contain more than 6 characters"
                    },
                    cfPassword: {
                        required: "You must confirm your password",
                        minlength: "Your password must contain more than 6 characters",
                        equalTo: "Password not match !" // custom message for mismatched passwords
                    }
                },
                rules: {
                    FirstName: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: checkMail,
                            type: "post"
                        }
                    },
                    phone: {
                        required: true
                    },
                    companyId: {
                        required: true
                    },
                    userType: {
                        required: true
                    },
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

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
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

                highlight: function (element) { // hightlight error inputs

                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
                    form.submit();
                }
            });
    }

    var form_addCompany = function() {
        if(id > 0){
            var checkName = baseUrl+"company/checkName/"+id;
        }else{
           var checkName = baseUrl+"company/checkName";
        }
        var form1 = $('#form_addCompany');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            messages: {
                Title: {
                    remote: "Company already exist!"
                }
            },
            rules: {
                Title: {
                    required: true,
                    remote: {
                        url: checkName,
                        type: "post"
                    }
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
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

            highlight: function (element) { // hightlight error inputs

                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                success1.show();
                error1.hide();
                form.submit();
            }
        });
    }

    var form_addGroups = function() {
        if(id > 0){
            var checkName = baseUrl+"group/checkName/"+id;
            //var checkComp = baseUrl+"group/checkComp/"+id;
        }else{
           var checkName = baseUrl+"group/checkName";
           //var checkComp = baseUrl+"group/checkComp";
        }
        var form1 = $('#form_addGroups');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            messages: {
                Title: {
                    remote: "Group already exist!"
                }
            },
            rules: {
                Title: {
                    required: true,
                    remote: {
                        url: checkName,
                        type: "post"
                    }
                },
                companyId: {
                    required: true
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
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

            highlight: function (element) { // hightlight error inputs

                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                success1.show();
                error1.hide();
                form.submit();
            }
        });
    }

    var form_addCategory = function() {
        if(id > 0){
            var checkName = baseUrl+"category/checkName/"+id;
            //var checkGrp = baseUrl+"category/checkGrp/"+id;
        }else{
           var checkName = baseUrl+"category/checkName";
           //var checkGrp = baseUrl+"category/checkGrp";
        }
        var form1 = $('#form_addCategory');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            messages: {
                Title: {
                    remote: "Category already exist!"
                },
                groupId: {
                    remote: "Group already in use!"
                }
            },
            rules: {
                Title: {
                    required: true,
                    remote: {
                        url: checkName,
                        type: "post"
                    }
                },
                groupId: {
                    required: true
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
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

            highlight: function (element) { // hightlight error inputs

                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                success1.show();
                error1.hide();
                form.submit();
            }
        });
    }

    var form_addFile = function() {
        if(id > 0){
            var checkName = baseUrl+"filemanager/checkName/"+id;
        }else{
           var checkName = baseUrl+"filemanager/checkName";
        }
        var form1 = $('#form_addFile');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: ".ignore",  // validate all fields including form hidden input
            messages: {
                docTitle: {
                    remote: "Title already exist!"
                },
                userDoc: {
                    required: "Please select file.",
                    extension: "Please select only .doc, .docx, .xls, .xlsx and .pdf format only",
                }
            },
            rules: {
                docTitle: {
                    required: true,
                    remote: {
                        url: checkName,
                        type: "post"
                    }
                },
                userDoc: {
                    required: true,
                    extension: "doc|docx|xls|xlsx|pdf"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
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

            highlight: function (element) { // hightlight error inputs

                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                success1.show();
                error1.hide();
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

    var changePassword = function() {
        var form2 = $('#changePassword');
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
                email: {
                    required: true,
                    email: true
                },
                oldpwd: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 6,
                },
                cfpassword: {
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

    var userRole = function() {
        if(id > 0){
            var callUrl = baseUrl+"userrole/checkDuplicateTitle/"+id;
        }else{
           var callUrl = baseUrl+"userrole/checkDuplicateTitle"; 
        }
        var form_userrole = $('#form_userrole');
        var error1 = $('.alert-danger', form_userrole);
        var success1 = $('.alert-success', form_userrole);

        form_userrole.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {
                Title: {
                    remote: "User role already exist!"
                }
            },
            rules: {
                Title: {
                        required: true,
                        remote: {
                            url: callUrl,
                            type: "post"
                        }
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
    
    
    
    var sendMessageCustomer = function() {
        
        var sendMessageCustomer = $('#sendMessageCustomer');
        var error1 = $('.alert-danger', sendMessageCustomer);
        var success1 = $('.alert-success', sendMessageCustomer);

        sendMessageCustomer.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {
            },
            rules: {
                senderId: {
                        required: true
                    },
                messageType: {
                        required: true
                    },
                message: {
                        required: true,
                        maxlength: 160
                    }

            },  
            invalidHandler: function(event, validator) { //display error alert on form submit              
                success1.hide();
                App.scrollTo(error1, -200);
            },
            errorPlacement: function(error, element){
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
        init: function () {
            form_addUser();
            form_addCompany();
            form_addFile();
            form_addGroups();
            form_addCategory();
            userRole();
            //lofinForm();
            setPForm();
            changePassword();
            sendMessageCustomer();
        }

    };

}();

jQuery(document).ready(function() {
    FormValidation.init();
});