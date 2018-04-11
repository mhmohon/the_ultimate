<!DOCTYPE html>
<html>

	<head>
		<!-- Contain all css and header information -->
		@include('backend.layouts.header')
	</head>
	<body class="theme-teal">
		<!-- Contain page loader -->
		@include('backend.layouts.partial._loader')
		<!-- Contain page navber -->
		@include ('backend.layouts.navbar')

		<section>
			<!-- Left Sidebar -->
			@include ('backend.layouts.left_sidebar')
		</section>

		<section class="content">
			<div class="container-fluid">
				<!-- layouts for Notificaiton -->
                @include ('backend.layouts.partial.message')
                
				<!-- layouts for main content -->
        		@yield ('main_content')
			</div>
		</section>

		<!-- Contain page footer -->
		@include('backend.layouts.footer')
		
	</body>
</html>