<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
    
    PT JASAMEDIKA SARANATAMA
    </title>

    <!-- Scripts -->
    
    <script src="{{ asset('assets/js/app.js') }}"></script>
    
    <link type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link type="text/css" href="{{asset('assets/css/datepicker.css')}}" rel="stylesheet"/>
    <link type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet"/>
   <!-- <link type="text/css" href="{{asset('assets/css/jquery.ui.css')}}" rel="stylesheet"/>
    <link type="text/css" href="{{asset('assets/css/jquery-ui.theme.min.css')}}" rel="stylesheet"/> -->
    <script type="text/javascript" src="{{asset('assets/js/jquery-3.4.1.js')}}"></script>
   <!-- <script type="text/javascript" src="{{asset('assets/js/jquery-ui.js')}}"></script>-->
     <script type="text/javascript" src="{{asset('assets/js/bootstrap-datepicker.js')}}"></script>
      <!-- <script src="{{ asset('assets/js/app.js') }}" defer></script> -->

    <script type="text/javascript">
        $(document).ready(function(){
            //$("#tgllahir_pasien").datepicker({dateFormat:"yy-mm-dd"});
             $("#tgllahir_pasien").datepicker({format:"yyyy-mm-dd"});
	     /*
	     $("#tgllahir_pasien").datepicker({
	   			    dateFormat:"yyyy-mm-dd",i
				    showOn: "button",
				    buttonText: "<i class="fa fa-calendar"></i>"		
	       });
	     */
	      let $btn = $('.fa'),
	      	  $input = $('#tgllahir_pasien');
		  dp =$input.datepicker({
		  		'format' : 'yyyy-mm-dd',
		  }).data('datepicker');	
	       $btn.on('click',function(){
			dp.show();
			$input.focus();

	       });	       

        });
    </script>
    
  
    <!-- Fonts -->
   <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   -->
    <!-- Styles -->
    
    
    
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
   
  
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
		    <!--{{ config('app.name', 'Laravel') }}-->
			Home
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} || {{ Auth::user()->jabatan }} <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->jabatan == "admin")
				                            <a class="dropdown-item" href="{{ url('kelurahan') }}">
 				  	                             Akses Data Kelurahan
				                             </a>
  				                @endif
				   <a class="dropdown-item" href="{{ url('registrasipasien') }}">
						Registrasi Pasien
				   </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
 
</body>
</html>
