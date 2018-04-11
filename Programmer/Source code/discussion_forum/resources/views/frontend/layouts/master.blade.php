<!DOCTYPE html>
<html>

	<head>
		<!-- Contain all css and header information -->
		@include('frontend.layouts.header')
	</head>
	<body>
		<div class="container-fluid">
			<!-- Contain page navber -->
			@include ('frontend.layouts.navbar')

			<section class="content" style="min-height: 500px;">
				
				<!-- layouts for Notificaiton -->
	            @include ('frontend.layouts.partial.message')

				<!-- layouts for main content -->
	        	@yield ('main_content')


			</section>


			<!-- Contain page footer -->
			@include('frontend.layouts.footer')

		</div>
		
	</body>
</html>