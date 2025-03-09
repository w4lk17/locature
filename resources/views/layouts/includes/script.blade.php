<!--
            OneUI JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/js.cookie.min.js
        -->
<script src="{{ asset('assets/js/oneui.core.min.js') }}"></script>
<!--
            OneUI JS
            
            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
<script src="{{ asset('assets/js/oneui.app.min.js') }}"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('assets/js/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/es6-promise/es6-promise.auto.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/slick-carousel/slick.min.js') }}"></script>


<!-- Page JS Code -->
<script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/op_auth_signin.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/op_auth_signup.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/op_auth_reminder.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/be_comp_dialogs.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/be_comp_charts.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/be_forms_validation.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/op_auth_lock.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>