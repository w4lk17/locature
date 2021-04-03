/*
 *  Document   : op_auth_lock.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Lock Page
 */

class pageAuthLock {
    /*
     * Init Lock Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
     *
     */
    static initValidation() {
        // Load default options for jQuery Validation plugin
        One.helpers('validation');

        // Init Form Validation
        jQuery('.js-validation-lock').validate({
            rules: {
                'password': {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                'password': {
                    required: 'Entrer un mot de passe valide.',
                    minlength: 'Entrer minimum 6 caracteres'
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
jQuery(() => { pageAuthLock.init(); });
