<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
		@include("include.Navbar")
    </head>
    <body>
	
		<!-- Preloader -->
       @include('include.Preload')
        <!-- End Preloader -->		
	
		<!-- Header Area -->
		@include("include.header")
        @yield('content')
<!-- Footer Area -->
    @include('include.Footer')
    <!--/ End Footer Area -->
    
    <!-- jquery Min JS -->
    @include('include.footerjs')
    
</body>
</html>