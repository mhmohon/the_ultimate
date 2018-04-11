<footer>
    <div class="container">
        <div class="row">
            
            <div class="col-lg-8 col-xs-9 col-sm-5 ">© 2008-2018 by UOG Discussion Forum. All rights reserved.</div>
            <div class="col-lg-3 col-xs-12 col-sm-5 sociconcent">
                <ul class="socialicons">
                    <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                   
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- get jQuery from the google apis -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
    
    <script src="{{ asset('js/backend/plugins/jquery/jquery.min.js') }}"></script>

    <!-- layouts for extra js -->
    @yield ('extra_js')
    
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="{{ asset('js/jquery.themepunch.plugins.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.themepunch.revolution.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    

    <script>
        $.validate({
            modules : 'location, date, security, file, sanitize, toggleDisabled',
            disabledFormFilter : 'form.btn-disabled',
    
        });

    </script>