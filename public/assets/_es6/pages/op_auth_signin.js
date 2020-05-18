/*
 *  Document   : op_auth_signin.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Sign In Page
 */

class pageAuthSignIn {
    /*
     * Init Sign In Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
     *
     */
    static initValidation() {
        // Load default options for jQuery Validation plugin
        One.helpers('validation');

        // Init Form Validation
        jQuery('.js-validation-signin').validate({
            rules: {
                'email': {
                    required: true,
                    email: true
                },
                'password': {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                'email': {
                    required: 'Please enter a email'
                },
                'password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long'
                }
            }
        });
    }

    /*
     * Init functionality
     *
     */
    static init() {
        this.initValidation();
    }
}

// Initialize when page loads
jQuery(() => { pageAuthSignIn.init(); });
