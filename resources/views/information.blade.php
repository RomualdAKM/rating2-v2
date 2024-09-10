<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>PROTECT-AVIS
</title>
    
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo-avis-securisé.jpg') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('src/img/favicon.png')}}">
</head>
<body>
    
    <div style="background-color: rgb(59, 59, 221);">
        <!-- ========== { HEADER }==========  -->
   <header>
    <!-- Navbar -->
    
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
        
        
       <div >


           <div class="flex items-center justify-center p-12 mt-16" style="background-color: rgb(13, 22, 85);">
               <!-- Author: FormBold Team -->
               @if(session('info') === true)
               <div class="mx-auto w-full max-w-[550px] bg-white">
                <!-- Card header -->
                <div class="text-center mb-3">                       
                    <h1 class="text-xl leading-snug text-gray-800 font-semibold mt-3">Renseignez vos informations avant le paiement.</h1>                        
                </div>
                   <form class="p-12" action="{{ route('saveinfo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                       
                       <div class="mb-5">
                           <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                               Nom  De la Structure
                           </label>
                           <input type="text" name="name_structure" id="name" 
                               class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                       </div>
                       <div class="mb-5">
                           <label for="phone" class="mb-3 block text-base font-medium text-[#07074D]">
                               Email Structure
                           </label>
                           <input type="email" name="email_structure" id="phone" 
                               class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                       </div>
                       <div class="mb-5">
                           <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                               Nom Responsable 
                           </label>
                           <input type="text" name="name_admin"  
                               class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                       </div>
                       <div class="mb-5">
                           <label for="email_admin" class="mb-3 block text-base font-medium text-[#07074D]">
                               Email Responsable
                           </label>
                           <input type="email" name="email_admin"  
                               class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                       </div>
                       <div class="-mx-3 flex flex-wrap">
                           <div class="w-full px-3 sm:w-1/2">
                               <div class="mb-5">
                                   <label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
                                       Adresse
                                   </label>
                                   <input type="text" name="adress" 
                                       class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                               </div>
                           </div>
                           <div class="w-full px-3 sm:w-1/2">
                               <div class="mb-5">
                                   <label  class="mb-3 block text-base font-medium text-[#07074D]">
                                       Contact
                                   </label>
                                   <input type="text" name="phone"  
                                       class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                               </div>
                           </div>
                       </div>
                       <div class="-mx-3 flex flex-wrap">
                           <div class="w-full px-3 sm:w-1/2">
                               <div class="mb-5">
                                   <label  class="mb-3 block text-base font-medium text-[#07074D]">
                                       Ville
                                   </label>
                                   <input type="text" name="city" 
                                       class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                               </div>
                           </div>
                          
                           <div class="w-full px-3 sm:w-1/2">
                               <div class="mb-5">
                                   <label  class="mb-3 block text-base font-medium text-[#07074D]">
                                       Code Postal
                                   </label>
                                   <input type="text" name="postal" 
                                       class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                               </div>
                           </div>
                           
                          
                       </div>

                       <input type='hidden' name="prix" value="{{$prix}}">
                       
                       <div class="mb-5">
                        <label for="phone" class="mb-3 block text-base font-medium text-[#07074D]">
                          Code D'activation
                        </label>
                        <input type="text" name="promo" id="phone" 
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                    </div>
                       <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Logo
                        </label>
                        <input type="file" name="logo" id="name" 
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                    </div>
           
                 
                       <div>
                           <button type="submit"
                               class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                               Envoyez
                           </button>
                       </div>
                   </form>
               </div>
               @else
               <section class="antialiased bg-white text-gray-600 min-h-screen p-10">
                <div class="h-full">
                    <!-- Pay component -->
                    <div>
                        <div class="relative mt-16 px-4 sm:px-6 lg:px-8 pb-8 max-w-lg mx-auto" id="paymentForm">
                            <div class="bg-white px-8 pb-6 rounded-b shadow-lg">
    
                                <!-- Card header -->
                                <div class="text-center mb-6">                       
                                    <h1 class="text-xl leading-snug text-gray-800 font-semibold mb-2">Paiement en toute securité</h1>                        
                                </div>
    
                                <!-- Toggle -->
                                <div class="flex justify-center mb-6">
                                    <div class="relative flex w-full p-1 bg-gray-50 rounded" id="paymentToggle">
                                        <span class="absolute inset-0 m-1 pointer-events-none" aria-hidden="true">
                                            <span class="absolute inset-0 w-1/2 bg-white rounded border border-gray-200 shadow-sm transform transition duration-150 ease-in-out" id="toggleIndicator"></span>
                                        </span>
                                        
                                        <button class="relative  flex-1 text-sm font-medium p-4 transition duration-150 ease-in-out focus:outline-none focus-visible:ring-2" onclick="togglePaymentOption(true)">
                                            Paiement par Carte
                                            <span class="flex items-center" >

                                                <img src="https://img.icons8.com/color/48/000000/visa.png" alt="">
                                                <img src="https://img.icons8.com/color/48/000000/mastercard-credit-card.png" alt="" style="margin-left: 110px;">                                            
                                                                                    
                                            </span>
                                        </button>
                                        {{-- <button class="relative flex-1 text-sm font-medium p-1 transition duration-150 ease-in-out focus:outline-none focus-visible:ring-2" onclick="togglePaymentOption(false)">
                                            Paiement par PayPal
                                            <img src="https://img.icons8.com/color/48/000000/paypal.png" alt="" style="margin-left: 30px;">
                                        </button> --}}
                                    </div>
                                </div>
    
                                <!-- Card form -->
                                <div id="cardForm">
                                    {{-- <div class="space-y-4">
                                        <!-- Card Number -->
                                        <div>
                                            <label class="block text-sm font-medium mb-1" for="card-nr">Numéro de carte <span class="text-red-500">*</span></label>
                                            <input id="card-nr" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="text" placeholder="1234 1234 1234 1234" />
                                        </div>
                                        <!-- Expiry and CVC -->
                                        <div class="flex space-x-4">
                                            <div class="flex-1">
                                                <label class="block text-sm font-medium mb-1" for="card-expiry">Date d'expiration <span class="text-red-500">*</span></label>
                                                <input id="card-expiry" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="text" placeholder="MM/YY" />
                                            </div>
                                            <div class="flex-1">
                                                <label class="block text-sm font-medium mb-1" for="card-cvc">CVC <span class="text-red-500">*</span></label>
                                                <input id="card-cvc" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="text" placeholder="CVC" />
                                            </div>
                                        </div>
                                        <!-- Name on Card -->
                                        <div>
                                            <label class="block text-sm font-medium mb-1" for="card-name">Nom sur la carte <span class="text-red-500">*</span></label>
                                            <input id="card-name" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="text" placeholder="John Doe" />
                                        </div>
                                        <!-- Email -->
                                        <div>
                                            <label class="block text-sm font-medium mb-1" for="card-email">Email <span class="text-red-500">*</span></label>
                                            <input id="card-email" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full" type="email" placeholder="john@company.com" />
                                        </div>
                                    </div> --}}
                                    <!-- Form footer -->
                                    <div class="mt-6">
                                        <div class="mb-4">

                                          <form action="/session" method="POST">
                                            @csrf
                                            {{-- <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a> --}}
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type='hidden' name="total" value="{{$prix}}">
                                            <input type='hidden' name="productname" value="AvisClientPRo">
                                            <button class="font-medium text-sm inline-flex items-center 
                                            justify-center px-3 py-2 border border-transparent rounded leading-5 
                                            shadow-sm transition duration-150 ease-in-out w-full bg-indigo-500 hover:bg-indigo-600
                                             text-white focus:outline-none focus-visible:ring-2" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Passez au paiement {{$prix}}€</button>
                                            </form>
                                            {{-- <button class="font-medium text-sm inline-flex items-center 
                                            justify-center px-3 py-2 border border-transparent rounded leading-5 
                                            shadow-sm transition duration-150 ease-in-out w-full bg-indigo-500 hover:bg-indigo-600
                                             text-white focus:outline-none focus-visible:ring-2">
                                             Payez
                                            </button> --}}
                                            
                                        </div>
                                        {{-- <div class="text-xs text-gray-500 italic text-center">You'll be charged $253, including $48 for VAT in Italy</div> --}}
                                    </div>
                                </div>
    
                                <!-- PayPal form -->
                                {{-- <div id="paypalForm" style="display: none;">
                                    <div>
                                        <div class="mb-4">
                                          <form action="{{ route('payment') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="amount" value="{{$prix}}">
                                          
                                            <button type="submit" class="font-medium text-sm inline-flex items-center justify-center px-3 py-2 border border-transparent rounded leading-5 
                                            shadow-sm transition duration-150 ease-in-out w-full bg-indigo-500 
                                            hover:bg-indigo-600 text-white focus:outline-none focus-visible:ring-2">
                                            Payez via PayPal {{$prix}}€</button>
                                          </form>
                                        </div>
                                    </div>
                                </div> --}}
    
                            </div>
                        </div>
                    </div>
                </div>
               </section>
               @endif
           </div>
   
          
       </div>

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
        
    </div>
    @include('sweetalert::alert')
    <script>
        function togglePaymentOption(isCard) {
            const cardForm = document.getElementById('cardForm');
            const paypalForm = document.getElementById('paypalForm');
            const toggleIndicator = document.getElementById('toggleIndicator');

            if (isCard) {
                cardForm.style.display = 'block';
                paypalForm.style.display = 'none';
                toggleIndicator.style.transform = 'translateX(0)';
            } else {
                cardForm.style.display = 'none';
                paypalForm.style.display = 'block';
                toggleIndicator.style.transform = 'translateX(100%)';
            }
        }
    </script>
</body>
</html>