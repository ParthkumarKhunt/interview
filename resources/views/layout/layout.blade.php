<!DOCTYPE html>
<html lang="en">
    @include('include.header')
<body class="light fancy-sidebar theme-fancy">
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      
      @include('include.body_header')

      @include('include.sidebar')
        <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            @include('include.breadcrumbs')

            @yield('content')
          
        </section>
		
	  </div>
        @include('include.body_footer')
        @include('include.model')
    </div>
  </div>

  @include('include.footer')

  
</body>
</html>