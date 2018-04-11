<!-- Jquery Core Js -->
    <script src="{{ asset('js/backend/plugins/jquery/jquery.min.js') }}"></script>
    
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    
    <!-- Bootstrap Core Js -->
    <script src="{{ asset('js/plugins/bootstrap/bootstrap.js') }} "></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('js/backend/plugins/bootstrap-select/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('js/backend/plugins/jquery-slimscroll/jquery.slimscroll.js') }}" ></script>

     <!-- Bootstrap Notify Plugin Js -->
    <script src="{{ asset('js/backend/plugins/bootstrap-notify/bootstrap-notify.js') }}" ></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('js/backend/plugins/node-waves/waves.js') }}"></script>

    <!-- Moment Plugin Js -->
    <script src="{{ asset('js/backend/plugins/momentjs/moment.js') }}"></script>
    
    @yield ('extra_js')
    
    
    <!-- Custom Js -->
    <script src="{{ asset('js/backend/admin.js') }}"></script>
    <script src="{{ asset('js/backend/plugins/ui/notifications.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('js/backend/demo.js') }}"></script>
    
    <!--<script>
        $(document).ready(function() {
            var url = window.location;
            // Will only work if string in href matches with location
            $('.ml-menu li a[href="' + url + '"]').parent().addClass('active');
            
            
            // Will also work for relative and absolute hrefs
            $('.ml-menu li a').filter(function() {
                return this.href == url;
            }).parent().parent().parent().addClass('active');


        });
        
    </script> -->
    <script>
        $.validate({
            modules : 'location, date, security, file, sanitize, toggleDisabled',
            disabledFormFilter : 'form.btn-disabled',
    
        });

    </script>