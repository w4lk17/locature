/*
 *  Document   : op_auth_signup.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Sign Up Page
 */

class pageAuthSignUp {
    /*
     * Init Sign Up Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
     *
     */
    static initValidation() {
        // Load default options for jQuery Validation plugin
        One.helpers('validation');

        // Init Form Validation
        jQuery('.js-validation-signup').validate({
            rules: {
                'last_name': {
                    required: true,
                    minlength: 3
                },
                'first_name': {
                    required: true,
                    minlength: 3
                },
                'email': {
                    required: true,
                    email: true
                },
                'cni': {
                    required: true,
                    minlength: 15
                },
                'telephone': {
                    required: true,
                    minlength: 12
                },
                'address': {
                    required: true,
                    minlength: 3
                },
                'password': {
                    required: true,
                    minlength: 5
                },
                'password_confirm': {
                    required: true,
                    equalTo: '#signup-password'
                },
                'signup-terms': {
                    required: true
                }
            },
            messages: {
                'last_name': {
                    required: 'Please enter a lastname',
                    minlength: 'Your username must consist of at least 3 characters'
                },
                'first_name': {
                    required: 'Please enter a firstname',
                    minlength: 'Your username must consist of at least 3 characters'
                },
                'email': 'Please enter a valid email address',
                'cni': {
                    required: 'Please provide a cni',
                    minlength: 'cni must be at least 5 characters long'
                },
                'telephone': {
                    required: 'Please provide a telephone',
                    minlength: 'cni must be at least 5 characters long'
                },
                'address': {
                    required: 'Please provide a adresse',
                    minlength: 'cni must be at least 5 characters long'
                },
                'signup-password': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long'
                },
                'password_confirm': {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long',
                    equalTo: 'Please enter the same password as above'
                },
                'signup-terms': 'You must agree to the service terms!'
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
jQuery(() => { pageAuthSignUp.init(); });
