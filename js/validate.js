    /* <![CDATA[ */
            $(function(){
              $("#user_first_name").validate({
                    expression: "if (VAL.match(/[a-zA-Z]+/)) return true; else return false;",
                    message: "Enter a valid Name"
                })
                  $("#user_last_name").validate({
                    expression: "if (VAL.match(/[a-zA-Z]+/)) return true; else return false;",
                    message: "Enter a vald Last name"
                })
                  $("#user_email").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Please enter a valid Email ID (above)",
                    error_field_class: "ErrorField"
                });
                  $("#user_password_new").validate({
                    expression: "if (VAL.length > 7 && VAL) return true; else return false;",
                    message: "Passowrd must be grater than 8 (above)"
                });
                  $("#user_password_repeat").validate({
                    expression: "if ((VAL == jQuery('#user_password_new').val()) && VAL) return true; else return false;",
                    message: "Confirm password field doesn't match the password field (above)"
                });
                $("#user_level").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please make a selection"
                });
            });
            /* ]]> */