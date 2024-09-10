<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title> PROTECT-AVIS
 </title>
    
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo-avis-securisé.jpg') }}">
    <link rel="stylesheet" href="{{ asset('src/css/style.css')}}">
    <link rel="icon" href="{{ asset('src/img/favicon.png')}}">
    {{-- @cookieconsentscripts --}}
</head>
<body class="pt-20 font-sans text-base font-normal text-gray-700 dark:bg-gray-800 dark:text-gray-300">
    {{-- @cookieconsentview --}}
    <!-- ========== { HEADER }==========  -->
   <header>
        <!-- Navbar -->
        
      <nav x-data="{ open: false }" class="nav-top flex flex-nowrap lg:flex-start items-center z-20 fixed top-0 left-0 right-0 bg-white dark:bg-gray-800 overflow-y-auto max-h-screen lg:overflow-visible lg:max-h-full">
          <div class="container mx-auto px-4 xl:max-w-6xl ">
            <!-- mobile navigation -->
            <div class="flex flex-row justify-between py-3 lg:hidden">
              <!-- logo -->
              <a class="flex items-center py-2 ltr:mr-4 rtl:ml-4 text-xl" href="index.html">
                 <img class="max-w-full h-auto" src="logo-avis-securisé.jpg" alt="Logo dark" style="width: 45px; height: 45px"> 
                <span class="text-4xl font-semibold dark:text-gray-100"><span class="text-blue-700"> PROTECT AVIS</span></span>
              </a>
  
              <!-- navbar toggler -->
              <div class="ltr:right-0 rtl:left-0 flex items-center">
                <!-- Mobile menu button-->
                <button id="navbartoggle" type="button" class="inline-flex items-center justify-center text-gray-800 hover:text-gray-700 dark:text-gray-200 dark:hover:text-gray-300 focus:outline-none focus:ring-0" aria-controls="mobile-menu" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
                  <span class="sr-only">Mobile menu</span>
                  <svg x-description="Icon closed" x-state:on="Menu open" x-state:off="Menu closed" class="block h-8 w-8" :class="{ 'hidden': open, 'block': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                  </svg>
  
                  <svg x-description="Icon open" x-state:on="Menu open" x-state:off="Menu closed" class="hidden h-8 w-8" :class="{ 'block': open, 'hidden': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
                </button>
              </div>
            </div>
  
            <!-- Mobile menu -->
            <div class="lg:hidden fixed w-full h-full inset-0 z-40" id="mobile-menu" x-description="Mobile menu" x-show="open" style="display: none;">
              <!-- bg open -->
              <span class="fixed bg-gray-900 bg-opacity-70 w-full h-full inset-x-0 top-0"></span>
              
              <!-- Mobile navbar -->
              <nav id="mobile-nav" class="flex flex-col ltr:right-0 rtl:left-0 w-64 fixed top-0 py-4 bg-white dark:bg-gray-800 h-full overflow-auto z-40" x-show="open" @click.away="open=false" x-description="Mobile menu" role="menu" aria-orientation="vertical" aria-labelledby="navbartoggle" 
                    x-transition:enter="transform transition-transform duration-300" 
                    x-transition:enter-start="ltr:translate-x-full rtl:-translate-x-full" 
                    x-transition:enter-end="translate-x-0" 
                    x-transition:leave="transform transition-transform duration-300" 
                    x-transition:leave-start="translate-x-0" 
                    x-transition:leave-end="ltr:translate-x-full rtl:-translate-x-full">
                <div class="mb-auto">
                  <!--logo-->
                  <div class="mh-18 text-center px-12 mb-8">
                    <a href="#" class="flex relative">
                      <span class="text-4xl font-semibold px-4 dark:text-gray-200"><span class="text-blue-700">PROTECT AVIS</span>/span>
                      <!-- <img src="src/img/logo.png" class="max-w-full h-auto" alt="logo"> -->
                      <span class="absolute -bottom-4 transform ltr:translate-x-1/2 rtl:-translate-x-1/2 w-20 h-0 border-t-2 border-opacity-50 border-blue-700 mx-auto"></span>
                    </a>
                  </div>
  
                  <!--navigation-->
                  <div class="mb-4">
                    <nav class="relative flex flex-wrap items-center justify-between">
                      <ul id="side-menu" class="w-full float-none flex flex-col">
                        <li class="relative">
                          <a href="{{ url('/') . '#acceuil'}}" class="block py-3 px-4 hover:text-blue-700 focus:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100">
                            <span class="flex items-center">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                              </svg>
                              Accueil
                            </span>
                          </a>
                        </li>
                        <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @mouseleave="open = false">
                          <a href="{{ route('pricing') }}" class="block py-3 px-4 hover:text-blue-700 focus:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100">
                            <span class="flex items-center">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 7.756a4.5 4.5 0 100 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                              
                           Nos Tarifs
                        
                          </span>
                             
                          </a>
                        </li>
  
                        <!-- dropdown with submenu-->
                        <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false">
                          <a id="mobiledrop-04" class="block py-3 px-4 hover:text-blue-700 focus:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100" href="{{ url('/') . '#contact'}}" id="#contact" @click="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" :class="{ 'text-blue-700 dark:text-gray-100': open }">
                            <span class="flex items-center">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                              </svg>
                               Contact
                          </span>
                          
                          </a>
               
                        </li>
  
                        <!-- dropdown -->
                        <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false">
                          <a id="mobiledrop-03" class="block py-3 px-4 hover:text-blue-700 focus:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100" href="{{ route('login') }}" @click="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" :class="{ 'text-blue-700 dark:text-gray-100': open }">
                            <span class="flex items-center">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                              </svg>
                              Espace Client
                            </span>
                            
                          </a>     
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
               
              </nav>
            </div><!-- End Mobile menu -->
  
            <!-- desktop menu -->
            <div class="hidden lg:flex lg:flex-row lg:flex-nowrap lg:items-center lg:justify-between lg:mt-0" id="desktp-menu">
              <!-- logo -->
              <a class="hidden lg:flex items-center py-2 ltr:mr-4 rtl:ml-4 text-xl" href="#">
                <img class="max-w-full h-auto mr-5" src="logo-avis-securisé.jpg" alt="Logo dark" style="width: 60px; height: 65px; margin-right: 10px"> 
  
                <span class="text-4xl font-semibold dark:text-gray-100">PROTECT AVIS<span class="text-blue-700"></span></span>
              </a>
  
              <!-- menu -->
              <ul class="flex flex-col lg:mx-auto mt-2  lg:flex-row lg:mt-0" >
                <!-- dropdown -->
                <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @mouseleave="open = false">
                 
                  <a id="dropdown-mega" class="group block py-3 lg:py-7 px-6 hover:text-blue-700 focus:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100"  href="{{ url('/') . '#acceuil'}}" @mouseenter="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" :class="{ 'text-blue-700 dark:text-gray-100': open }">
                    <span class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                      </svg>
                      {{__('message.menu1')}}
                    </span>
                  
                  </a>
  
                </li>
                <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @mouseleave="open = false">
                  <a id="dropdown-01" class="group block py-3 lg:py-7 px-6 hover:text-blue-700 focus:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100" href="{{ route('pricing') }}" @mouseenter="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" :class="{ 'text-blue-700 dark:text-gray-100': open }">
                    <span class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 7.756a4.5 4.5 0 100 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      
                    {{__('message.menu2')}}
  
                  </span>
                  </a>
                 
                </li>
  
                <!-- dropdown with submenu-->
                <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @mouseleave="open = false">
                  <a id="dropdown-02" class="group block py-3 lg:py-7 px-6 hover:text-blue-700 focus:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100" href="{{ url('/') . '#contact'}}" @mouseenter="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" :class="{ 'text-blue-700 dark:text-gray-100': open }">
                    <span class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                      {{__('message.menu3')}}
  
                  </span>
  
                  </a>
                  
                </li>
  
                <!-- dropdown -->
                <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @mouseleave="open = false">
                  <a id="dropdown-01" class="group block py-3 lg:py-7 px-6 hover:text-blue-700 focus:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100" href="{{ route('login') }}" @mouseenter="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" :class="{ 'text-blue-700 dark:text-gray-100': open }">
                    <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>&nbsp;&nbsp;
                    {{__('message.menu4')}}
   
                    {{-- <h3>{{__('message.welcome')}}</h3> --}}
                  </span>
                  </a>
                </li>
                
                  
              
              </ul>
  
              {{-- <div class="fixed left-0 top-1/2 transform -translate-y-1/3"> --}}
                <div class="left-0 mt-2 top-1/2 transform -translate-y-1/3 ">
                  <form method="POST" action="{{ route('lang.switch') }}" class="flex p-1 bg-white border border-gray-100 rounded-l-lg shadow-lg">
                      @csrf
                      <div>
                          <select name="lang" id="lang" class="w-18 py-0 px-1 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">
                              <option value="fr">Français</option>
                              <option value="en">English</option>
                          </select>
                      </div>
                      <button type="submit" class="text-sm bg-blue-500 hover:bg-blue-600 text-white font-semibold py-0 px-1 rounded focus:outline-none focus:ring focus:border-blue-300">Change</button>
                  </form>
              </div>
            
            </div>
            <!-- end desktop menu -->
          </div>
        </nav><!-- End Navbar -->
   </header>
    
    <!-- end header -->

    <!-- =========={ MAIN }==========  -->
    <main id="content">
     
    
        <div id="hero" class="relative pt-14 pb-20 md:pt-16 md:pb-24 jarallax">
          <!-- background parallax -->
          
    
          <!-- background overlay -->
          <div class="absolute top-0 left-0 w-full h-full opacity-90 bg-blue-700" style="z-index:-1;"></div>
    
          <div class="container xl:max-w-6xl mx-auto px-4">
            <div class="flex flex-wrap flex-row -mx-4 items-center justify-center mb-6">
              <!-- content -->
              <div class="max-w-full w-11/12 lg:w-7/12 px-4">
                <div class="mt-6 py-4 lg:py-8 text-center">
                  <h1 class="text-4xl lg:text-5xl leading-normal font-semibold text-white capitalize mb-4"><span class="text-yellow-300">{{ __('message.header1') }}-{{ __('message.header2') }}-{{ __('message.header3') }}-{{ __('message.header4') }}  </span> {{ __('message.header6') }}.</h1>
                  <p class="text-gray-100 leading-relaxed font-light text-xl mx-auto pb-2 mb-12">{{ __('message.header5') }}</p>
                  <a class="py-3 px-5 inline-block text-center rounded-md leading-normal text-gray-100 bg-transparent border border-gray-100 hover:text-gray-900 hover:bg-gray-200 hover:ring-0 hover:border-gray-200 focus:text-gray-900 focus:bg-gray-200 focus:border-gray-200 focus:outline-none focus:ring-0 mb-4 sm:mb-0 ltr:mr-6 rtl:ml-6" href="{{ route('login') }}">
                    {{ __('message.header7') }}
                  </a>
                  <a class="py-3 px-5 inline-block text-center rounded-md leading-normal text-gray-100 bg-transparent border border-gray-100 hover:text-gray-900 hover:bg-gray-200 hover:ring-0 hover:border-gray-200 focus:text-gray-900 focus:bg-gray-200 focus:border-gray-200 focus:outline-none focus:ring-0" href="#contact">
                    {{ __('message.header8') }}
                  </a>
                </div>
              </div><!-- end content -->
            </div>
            <!-- masthead -->
            <div class="text-center absolute bottom-8 w-full left-0 animate-bounce hidden md:block">
              <a href="#portfolio">
                <div class="mx-auto py-5 px-3 w-6 h-8 rounded-xl opacity-80 border-2 border-white">
                  <div class="h-2 w-0.5 bg-white"><span class="invisible">Scroll button</span></div>
                </div>
              </a>
            </div>
          </div>
        <div style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100; clip-path: polygon(0px 0px, 100% 0px, 100% 100%, 0px 100%);" id="jarallax-container-0"><img class="jarallax-img" src="src/img-min/bg/bg3.jpg" alt="title" style="object-fit: cover; object-position: 50% 50%; max-width: none; position: fixed; top: 0px; left: 0px; width: 1094.4px; height: 708.62px; overflow: hidden; pointer-events: none; transform-style: preserve-3d; backface-visibility: hidden; margin-top: 15.19px; transform: translate3d(0px, 0.809998px, 0px);"></div></div>
        
        <!-- end hero -->  

        <div id="services" class="relative pt-20 pb-8 md:pt-24 md:pb-12 bg-white dark:bg-gray-800">
          <div class="container xl:max-w-6xl mx-auto px-4">
            <!-- section header -->
            <header class="text-center mx-auto mb-12 lg:px-20">
              <h2 class="text-2xl md:text-3xl leading-normal mb-2 font-bold text-gray-800 dark:text-gray-100"> {{ __('message.domaine1') }}</h2>
              <hr class="block w-12 h-0.5 mx-auto my-5 bg-blue-700 border-blue-700">
              <p class="text-gray-600 leading-relaxed font-light text-xl mx-auto pb-2">{{ __('message.domaine2') }}</p>
            </header><!-- end section header -->
    
            <!-- row -->
            <div class="flex flex-wrap flex-row -mx-4">
              <div class="max-w-full px-4 w-full sm:w-1/2 lg:w-1/4">
                <!-- service block -->
                <div class="py-5 px-6 border rounded bg-gray-50 dark:bg-gray-900 dark:bg-opacity-20 dark:border-gray-800 mb-12 wow fadeInUp" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                  <h3 class="text-lg leading-normal mb-2 font-semibold text-gray-700 dark:text-gray-200 capitalize">{{ __('message.domaine3') }}</h3>
                  <ul>
                    <li class="py-2 list-disc list-inside">{{ __('message.domaine4') }}</li>
                    
                  </ul>
                </div><!-- end service block -->
              </div>
    
              <div class="max-w-full px-4 w-full sm:w-1/2 lg:w-1/4">
                <!-- service block -->
                <div class="py-5 px-6 border rounded bg-gray-50 dark:bg-gray-900 dark:bg-opacity-20 dark:border-gray-800 mb-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                  <h3 class="text-lg leading-normal mb-2 font-semibold text-gray-700 dark:text-gray-200 capitalize">{{ __('message.domaine5') }}</h3>
                  <ul>
                    <li class="py-2 list-disc list-inside">{{ __('message.domaine6') }}</li>
                   
                  </ul>
                </div><!-- end service block -->
              </div>
    
              <div class="max-w-full px-4 w-full sm:w-1/2 lg:w-1/4">
                <!-- service block -->
                <div class="py-5 px-6 border rounded bg-gray-50 dark:bg-gray-900 dark:bg-opacity-20 dark:border-gray-800 mb-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                  <h3 class="text-lg leading-normal mb-2 font-semibold text-gray-700 dark:text-gray-200 capitalize">{{ __('message.domaine7') }}</h3>
                  <ul>
                    <li class="py-2 list-disc list-inside">{{ __('message.domaine8') }}</li>
                    
                  </ul>
                </div><!-- end service block -->
              </div>
    
              <div class="max-w-full px-4 w-full sm:w-1/2 lg:w-1/4">
                <!-- service block -->
                <div class="py-5 px-6 border rounded bg-gray-50 dark:bg-gray-900 dark:bg-opacity-20 dark:border-gray-800 mb-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInUp;">
                  <h3 class="text-lg leading-normal mb-2 font-semibold text-gray-700 dark:text-gray-200 capitalize">{{ __('message.domaine9') }}</h3>
                  <ul>
                    <li class="py-2 list-disc list-inside">{{ __('message.domaine10') }}</li>
                   
                  </ul>
                </div><!-- end service block -->
              </div>
            </div><!-- end row -->
          </div>
        </div>
       

        <div id="about" class="relative z-0 py-20 lg:py-24 bg-white dark:bg-gray-800">
          <!-- bg wrapper -->
          <div class="absolute inset-y-0 ltr:left-auto ltr:right-0 rtl:right-auto rtl:left-0 hidden lg:block w-1/3 bg-gray-50 dark:bg-gray-900 dark:bg-opacity-20" style="z-index:-1"></div>
          <div class="container xl:max-w-6xl mx-auto px-4">
            <div class="flex flex-wrap flex-row">
              <!-- img block -->
              <div class="flex-shrink max-w-full px-4 w-full lg:w-1/2 lg:order-2">
                <img src="src/img-min/svg/creative-content.svg" class="w-full max-w-full h-auto" alt="creative agency">
              </div>
    
              <!-- content block -->
              <div class="flex-shrink max-w-full px-4 w-full lg:w-1/2 lg:order-1 my-auto">
                <div class="p-6 md:p-12 lg:p-16 lg:ltr:pl-0 text-center lg:ltr:text-left lg:rtl:pr-0 lg:rtl:text-right">
                  <h2 class="text-4xl leading-normal mb-4 font-semibold text-gray-800 dark:text-gray-100">{{ __('message.solution1') }} </h2>
                  <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">{{ __('message.solution2') }}.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <!-- =========={ SCREENSHOT }==========  -->
        <div id="project" class="relative py-20 md:py-24 bg-white dark:bg-gray-800">
          <div class="container xl:max-w-6xl mx-auto px-4">
            <!-- section header -->
            <header class="text-center mx-auto mb-12 lg:px-20">
              <h2 class="text-2xl md:text-3xl leading-normal mb-2 font-bold text-gray-800 dark:text-gray-100">{{ __('message.ex1') }}</h2>
              <hr class="block w-12 h-0.5 mx-auto my-5 bg-indigo-700 border-indigo-700">
              <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">{{ __('message.ex2') }}</p>
            </header><!-- end section header -->
    
            <div class="flex flex-wrap flex-row -mx-4 items-center">
              <div class="w-full lg:w-10/12 px-4 mx-auto">
                <!-- screenshot slider -->
                <div class="carousel nav-dark-button" data-flickity='{ "cellAlign": "left", "wrapAround": true, "adaptiveHeight": true, "prevNextButtons": true , "pageDots": false, "imagesLoaded": true }'>
                  <div class="max-w-full w-full md:w-1/2 lg:w-1/3 px-24 md:px-12 text-center">
                    <div class="slider-item">
                      <figure class="relative">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480.000000 906.000000">
                          <!-- Clip path image -->
                          <defs>
                            <clipPath id="svgf3">
                              <rect x="52" y="10" width="380" height="818"/>
                            </clipPath>
                          </defs>
    
                          <!-- Phone screen -->
                          <image clip-path="url(#svgf3)" xlink:href="phone3.jpg" height="92%" width="100%" style="transform:translateY(30px);"></image>
    
                          <!-- Phone cover -->
                          <image xlink:href="src/img-min/app/device/iphone-dark.png" height="100%" width="100%"></image>
                        </svg>
                      </figure>
                    </div>
                  </div>
                  <div class="max-w-full w-full md:w-1/2 lg:w-1/3 px-24 md:px-12 text-center">
                    <div class="slider-item">
                      <figure class="relative">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480.000000 906.000000">
                          <!-- Clip path image -->
                          <defs>
                            <clipPath id="svgf4">
                              <rect x="52" y="10" width="380" height="818"/>
                            </clipPath>
                          </defs>
    
                          <!-- Phone screen -->
                          <image clip-path="url(#svgf4)" xlink:href="phone.jpg" height="92%" width="100%" style="transform:translateY(30px);"></image>
    
                          <!-- Phone cover -->
                          <image xlink:href="src/img-min/app/device/iphone-dark.png" height="100%" width="100%"></image>
                        </svg>
                      </figure>
                    </div>
                  </div>
                  <div class="max-w-full w-full md:w-1/2 lg:w-1/3 px-24 md:px-12 text-center">
                    <div class="slider-item">
                      <figure class="relative">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480.000000 906.000000">
                          <!-- Clip path image -->
                          <defs>
                            <clipPath id="svgf5">
                              <rect x="52" y="10" width="380" height="818"/>
                            </clipPath>
                          </defs>
    
                          <!-- Phone screen -->
                          <image clip-path="url(#svgf5)" xlink:href="phone2.jpg" height="92%" width="100%" style="transform:translateY(30px);"></image>
    
                          <!-- Phone cover -->
                          <image xlink:href="src/img-min/app/device/iphone-dark.png" height="100%" width="100%"></image>
                        </svg>
                      </figure>
                    </div>
                  </div>
                  <div class="max-w-full w-full md:w-1/2 lg:w-1/3 px-24 md:px-12 text-center">
                    <div class="slider-item">
                      <figure class="relative">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480.000000 906.000000">
                          <!-- Clip path image -->
                          <defs>
                            <clipPath id="svgf6">
                              <rect x="52" y="10" width="380" height="818"/>
                            </clipPath>
                          </defs>
    
                          <!-- Phone screen -->
                          <image clip-path="url(#svgf6)" xlink:href="phone4.jpg" height="92%" width="100%" style="transform:translateY(30px);"></image>
    
                          <!-- Phone cover -->
                          <image xlink:href="src/img-min/app/device/iphone-dark.png" height="100%" width="100%"></image>
                        </svg>
                      </figure>
                    </div>
                  </div>
                  <div class="max-w-full w-full md:w-1/2 lg:w-1/3 px-24 md:px-12 text-center">
                    <div class="slider-item">
                      <figure class="relative">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480.000000 906.000000">
                          <!-- Clip path image -->
                          <defs>
                            <clipPath id="svgf7">
                              <rect x="52" y="10" width="380" height="818"/>
                            </clipPath>
                          </defs>
    
                          <!-- Phone screen -->
                          <image clip-path="url(#svgf7)" xlink:href="phone.jpg" height="92%" width="100%" style="transform:translateY(30px);"></image>
    
                          <!-- Phone cover -->
                          <image xlink:href="src/img-min/app/device/iphone-dark.png" height="100%" width="100%"></image>
                        </svg>
                      </figure>
                    </div>
                  </div>
                </div><!-- end screenshot slider -->
              </div>
            </div>
          </div>
        </div><!-- End screenshot-->
    
        <!-- =========={ CTA }==========  -->
        <div id="cta" class="relative py-20 md:py-24 jarallax">
          <!-- background parallax -->
          <img class="jarallax-img" src="src/img-min/bg/bg3.jpg" alt="title">
    
          <!-- background overlay -->
          <div class="absolute top-0 left-0 w-full h-full opacity-90 bg-indigo-700" style="z-index:-1;"></div>
    
          <div class="container xl:max-w-6xl mx-auto px-4 text-center">
            <h1 class="text-2xl md:text-3xl leading-normal mb-2 font-semibold text-white">{{ __('message.newsletter1') }}</h1>    
            <hr class="block w-12 h-0.5 mx-auto my-5 bg-gray-100 border-gray-100">  
            <p class="text-gray-100 leading-relaxed font-light text-xl mx-auto pb-2 mb-12">{{ __('message.newsletter2') }}</p>
            <!-- buttom -->
            <form action="{{ route('newsletter.save') }}" method="POST">
              @csrf
              @method('post')
            
              <input type="email" class="w-full leading-5 mb-6 relative py-3 px-5 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" id="email" placeholder="Email address" name="email"  aria-label="newsletter form">
               
              <button type="submit" class="py-3 px-5 -ml-1 rounded-md leading-5 text-gray-800 bg-gray-100 border border-gray-100 hover:text-gray-900 hover:bg-gray-200 hover:ring-0 hover:border-gray-200 focus:bg-gray-200 focus:border-gray-200 focus:outline-none focus:ring-0" >
                Laissez-nous parler !
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block mr-1 transform rotate-45" width="1.5rem" height="1.5rem" fill="currentColor" viewBox="0 0 512 512"><path d="M53.12,199.94l400-151.39a8,8,0,0,1,10.33,10.33l-151.39,400a8,8,0,0,1-15-.34L229.66,292.45a16,16,0,0,0-10.11-10.11L53.46,215A8,8,0,0,1,53.12,199.94Z" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path><line x1="460" y1="52" x2="227" y2="285" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line></svg>
              </button>
            </form>
          </div>
        </div><!-- End CTA -->
    
        <!-- =========={ REVIEWS }==========  -->
        {{-- <div id="reviews" class="relative py-16 md:py-24 bg-gray-50 dark:bg-gray-900 dark:bg-opacity-20">
          <div class="container xl:max-w-6xl mx-auto px-4">
            <!-- section header -->
            <header class="text-center mx-auto mb-12">
              <h2 class="text-2xl md:text-3xl leading-normal mb-2 font-bold text-gray-800 dark:text-gray-100">{{ __('message.t1') }}</h2>
              <hr class="block w-12 h-0.5 mx-auto my-5 bg-indigo-700 border-indigo-700">
              <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">{{ __('message.t2') }}</p>
            </header><!-- end section header -->
    
            <!-- row -->
            <div class="flex flex-wrap flex-row -mx-4 justify-center">
              <div class="max-w-full px-4 w-11/12 md:w-full">
                <!-- review slider -->
                <div class="nav-dark-button" data-flickity='{ "cellAlign": "left", "wrapAround": true, "adaptiveHeight": true, "pageDots": false }'>
                  <!-- item -->
                  <div class="flex-shrink max-w-full px-4 w-full md:w-1/2 lg:px-12">
                    <!-- Reviews -->
                    <div class="mb-12 md:mb-2">
                      <div class="w-full text-center">
                        <div class="relative -mb-6 z-10">
                          <img class="w-14 h-14 bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-full mx-auto" src="src/img-min/avatar/img1-small.jpg" alt="Image description">
                        </div>
                      </div>
                      <div class="relative p-10 bg-white dark:bg-gray-800 shadow text-center rounded pt-12">
                        <p class="mb-0">
                          <span class="text-base font-semibold">Rafael Ezo</span>
                        </p>
                        <p class="mb-0"><span class="text-sm text-gray-500 ml-2">CEO VIBECRO</span></p>
                        <blockquote>
                          <ul class="flex my-2 mx-auto justify-center">
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                          </ul>
                          <p class="text-gray-500">Cette Entreprise a développé un service fantastique. Ils soutiennent notre marque, réduisent le temps de production du travail écrit et ont une belle présentation.</p>
                        </blockquote>
                      </div>
                    </div><!-- End Reviews -->
                  </div>
    
                  <!-- item -->
                  <div class="flex-shrink max-w-full px-4 w-full md:w-1/2 lg:px-12">
                    <!-- Reviews -->
                    <div class="mb-12 md:mb-2">
                      <div class="w-full text-center">
                        <div class="relative -mb-6 z-10">
                          <img class="w-14 h-14 bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-full mx-auto" src="src/img-min/avatar/img2-small.jpg" alt="Image description">
                        </div>
                      </div>
                      <div class="relative p-10 bg-white dark:bg-gray-800 shadow text-center rounded pt-12">
                        <p class="mb-0">
                          <span class="text-base font-semibold">Jessica Ramos</span>
                        </p>
                        <p class="mb-0"><span class="text-sm text-gray-500 ml-2">CEO One Company</span></p>
                        <blockquote>
                          <ul class="flex my-2 mx-auto justify-center">
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                          </ul>
                          <p class="text-gray-500">Une excellente équipe avec laquelle travailler, très accessible et capable de répondre à toutes les questions que nous pourrions avoir concernant le travail sur le projet.</p>
                        </blockquote>
                      </div>
                    </div><!-- End Reviews -->
                  </div>
    
                   <!-- item -->
                  <div class="flex-shrink max-w-full px-4 w-full md:w-1/2 lg:px-12">
                    <!-- Reviews -->
                    <div class="mb-12 md:mb-2">
                      <div class="w-full text-center">
                        <div class="relative -mb-6 z-10">
                          <img class="w-14 h-14 bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-full mx-auto" src="src/img-min/avatar/img3-small.jpg" alt="Image description">
                        </div>
                      </div>
                      <div class="relative p-10 bg-white dark:bg-gray-800 shadow text-center rounded pt-12">
                        <p class="mb-0">
                          <span class="text-base font-semibold">Demian Berbaza</span>
                        </p>
                        <p class="mb-0"><span class="text-sm text-gray-500 ml-2">CEO One Company</span></p>
                        <blockquote>
                          <ul class="flex my-2 mx-auto justify-center">
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                          </ul>
                          <p class="text-gray-500">Merci beaucoup pour votre travail sur la conception du logo et le développement du site web. Ils nous ont vraiment aidés à atteindre nos objectifs.</p>
                        </blockquote>
                      </div>
                    </div><!-- End Reviews -->
                  </div>
                </div><!-- end review slider -->
              </div>
            </div><!-- end row -->
          </div>
        </div> --}}
        <!-- End Reviews -->

        <!-- contact start -->
        <div id="contact" class="relative py-20 md:py-24 bg-white dark:bg-gray-800">
          <div class="container xl:max-w-6xl mx-auto px-4">
            <div class="flex flex-wrap flex-row -mx-4 justify-center">
              <div class="max-w-ful px-4 w-full lg:w-8/12">
                <div class="bg-gray-50 border border-gray-200 dark:bg-gray-900 dark:bg-opacity-20 dark:border-gray-800 rounded-md w-full p-12">
                  <!-- section header -->
                  <header class="text-center mx-auto mb-12 lg:px-20">
                    <h2 class="text-2xl md:text-3xl leading-normal mb-2 font-bold text-gray-800 dark:text-gray-100">{{ __('message.c1') }}</h2>
                    <hr class="block w-12 h-0.5 mx-auto my-5 bg-blue-700 border-blue-700">
                    <p class="text-gray-600 leading-relaxed font-light text-xl mx-auto pb-2">{{ __('message.c2') }}</p>
                  </header><!-- end section header -->

                  <!-- contact form -->
                  <form action="{{ route('save.contact') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="flex flex-wrap flex-row -mx-4">
                      <div class="flex-shrink w-full max-w-full md:w-1/2 px-4 mb-6">
                        <label class="inline-block mb-2" for="name">Nom</label>
                        <input type="text" name="name" class="w-full leading-5 relative py-3 px-5 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" id="name">
                        <div class="validate"></div>
                      </div>
                      <div class="flex-shrink w-full max-w-full md:w-1/2 px-4 mb-6">
                        <label class="inline-block mb-2" for="email">Email</label>
                        <input type="email" class="w-full leading-5 relative py-3 px-5 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" name="email" id="email">
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="mb-6">
                      <label class="inline-block mb-2" for="subject">Sujet</label>
                      <input type="text" class="w-full leading-5 relative py-3 px-5 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" name="subject" id="subject">
                      <div class="validate"></div>
                    </div>
                    <div class="mb-6">
                      <label class="inline-block mb-2" for="messages">Message</label>
                      <textarea class="w-full leading-5 relative py-3 px-5 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" name="contenu" rows="10" id="messages"></textarea>
                      <div class="validate"></div>
                    </div>
                    <div class="text-center mb-6">
                      <button class="py-3 px-5 inline-block text-center rounded-md leading-normal text-gray-100 bg-blue-700 border border-blue-700 hover:text-white hover:bg-blue-800 hover:ring-0 hover:border-blue-800 focus:bg-blue-800 focus:border-blue-800 focus:outline-none focus:ring-0" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="ltr:mr-2 rtl:ml-2 tranform ltr:rotate-0 rtl:-rotate-90 inline-block" viewBox="0 0 512 512"><path d="M53.12,199.94l400-151.39a8,8,0,0,1,10.33,10.33l-151.39,400a8,8,0,0,1-15-.34L229.66,292.45a16,16,0,0,0-10.11-10.11L53.46,215A8,8,0,0,1,53.12,199.94Z" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path><line x1="460" y1="52" x2="227" y2="285" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line></svg>
                        Envoyez
                      </button>
                    </div>
                  </form><!-- end contact form -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End contact -->

       
      <!-- Footer start -->
     <footer class="bg-gray-900 text-gray-300">
        <!-- footer content -->
        <div id="footer-content" class="relative">
          <div class="container xl:max-w-6xl mx-auto px-4 py-8 border-t border-gray-200 border-opacity-10">
            <!-- row -->
            <div class="flex flex-wrap flex-row -mx-4">
              <!-- copyright text -->
              <div class="flex-shrink max-w-full px-4 w-full md:w-2/3 text-center md:ltr:text-left md:rtl:text-right mb-6 md:mb-0">
                <p><a href="{{ route('login2') }}">© PROTECT AVIS</a>  | Tout droit réservé</p>
              </div>

              <!-- social icon -->
              <div class="flex-shrink max-w-full px-4 w-full md:w-1/3 self-center">
                <ul class="flex space-x-3 text-center md:ltr:text-right md:rtl:text-left">
                
                  <a href="{{ url('/clauses') }}">
                    RGPD
                  </a>
                  <li style="border-right: 1px solid #f6f0f0; padding-right: 8px;"></li>
                  
                  <a href="{{ url('/conditions') }}">
                    CGU
                  </a>
                  <li style="border-right: 1px solid #f6f0f0; padding-right: 8px;"></li>
                  
                  <a href="{{ url('/mentions') }}">
                    MENTIONS LÉGALES
                  </a>
                
                </ul>
              </div>
            </div><!-- end row -->
          </div>
        </div>
     </footer>
      <!-- end footer -->
       
      </main>
      <!-- end main -->
        
      @include('sweetalert::alert')
    <!-- Start development js -->
  <!-- alpine js -->
  <script src="{{ asset('src/plugins/alpinejs/dist/cdn.min.js')}}"></script>
  <!-- plugins js -->
  <script src="{{ asset('src/plugins/jarallax/dist/jarallax.min.js')}}"></script>
  <script src="{{ asset('src/plugins/lightgallery.js/dist/js/lightgallery.min.js')}}"></script>
  <script src="src/plugins/lightgallery.js/demo/js/lg-thumbnail.min.js"></script>
  <script src="{{ asset('src/plugins/lightgallery.js/demo/js/lg-video.js')}}"></script>
  <script src="{{ asset('src/plugins/flickity/dist/flickity.pkgd.min.js')}}"></script>
  <script src="src/plugins/typed.js/lib/typed.min.js"></script>
  <script src="{{ asset('src/plugins/vanilla-lazyload/dist/lazyload.min.js')}}"></script>
  <script src="{{ asset('src/plugins/hc-sticky/dist/hc-sticky.js')}}"></script>
  <script src="{{ asset('src/plugins/wow.js/dist/wow.min.js')}}"></script>
  <!-- theme js -->
  <script src="{{ asset('src/js/theme.js')}}"></script>
  <!-- End development js -->
</body>
</html>