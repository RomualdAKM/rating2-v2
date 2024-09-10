<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>PROTECT-AVIS

</title>
    
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo-avis-securisé.jpg') }}">

    <link rel="stylesheet" href="{{ asset('src/css/style.css')}}">
    <link rel="icon" href="{{ asset('src/img/favicon.png')}}">
</head>
<body class="pt-20 font-sans text-base font-normal text-gray-700 dark:bg-gray-800 dark:text-gray-300">
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
            <span class="text-4xl font-semibold dark:text-gray-100">PROTECT-AVIS
</span></span>
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
                  <span class="text-4xl font-semibold px-4 dark:text-gray-200">PROTECT-AVIS
</span>/span>
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

            <span class="text-4xl font-semibold dark:text-gray-100">PROTECT-AVIS
</span>
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
      <!-- =========={ HERO }==========  -->
      <div id="hero" class="relative py-12 jarallax">
        <!-- background parallax -->
        <img class="jarallax-img" src="src/img-min/bg/bg-planet.jpg" alt="title">
        <!-- background overlay -->
        <div class="absolute top-0 left-0 w-full h-full opacity-90 bg-blue-700" style="z-index:-1;"></div>
  
        <div class="container xl:max-w-6xl mx-auto px-4">
          <div class="flex flex-wrap flex-row -mx-4 items-center justify-center">
            <!-- content -->
            <div class="max-w-full w-full lg:w-7/12 px-4">
              <div class="mt-0 py-6 text-center">
                
                <div class="mt-0 pt-8 text-center">
                  <h1 class="text-3xl md:text-4xl leading-normal mb-0 font-bold text-white">
                    CONDITIONS GENERALES D'UTILISATION
                </h1>           
                </div>
              </div>
            </div><!-- end content -->
          </div>
        </div>
      </div><!-- End hero -->
      
      <!-- =========={ POST }==========  -->
      <div id="post-content" class="relative bg-white dark:bg-gray-800 pb-12">
        <div class="container xl:max-w-6xl mx-auto px-4">
          <div class="flex flex-wrap flex-row -mx-4 justify-center">
            <div class="max-w-full w-full lg:w-8/12 px-4">
              <div class="md:px-4">
                <!-- Post content -->
                <div class="leading-relaxed pt-12 pb-4">
                 
                    
                     
                      <h2 class="mb-5 font-bold">
                        Bienvenue sur Avis Client Pro, la plateforme de gestion des avis clients. Les
                        présentes Conditions Générales d'Utilisation (ci-après dénommées "CGU")
                        régissent l'utilisation de notre solution. En utilisant notre service, vous acceptez
                        ces CGU dans leur intégralité.
                      </h2>
                      
                     <h3 class="text-2xl leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">
                        1. Accès à la Solution
                     </h3>
                     
                      <p class="mb-5">
                        <span style="font-weight: 900;">1.1. Admissibilité : </span> 
                        Vous devez être autorisé à conclure des contrats
                        contraignants dans votre juridiction pour utiliser
                        notre solution.
                     </p>
                      <p class="mb-5">
                        <span style="font-weight: 900;">1.2. Accès : </span> 
                        Nous vous accordons un accès limité, non exclusif et révocable à
                        notre solution conformément à ces CGU.
                     </p>
                     <h3 class="text-2xl leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">
                        2. Utilisation de la Solution
                     </h3>
                     
                      <p class="mb-5">
                        <span style="font-weight: 900;">2.1. Utilisation Conforme : </span> 
                        Vous vous engagez à utiliser notre solution
                        conformément à ces CGU et à toutes les lois applicables.
                     </p>
                      <p class="mb-5">
                        <span style="font-weight: 900;">2.2. Comptes Utilisateurs : </span> 
                        Vous êtes responsable de la confidentialité de vos
                        comptes utilisateurs et de toute activité qui se produit
                         sous ces comptes.
                     </p>
                     <h3 class="text-2xl leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">
                        3. Données Personnelles
                     </h3>
                     
                      <p class="mb-5">
                        <span style="font-weight: 900;">3.1. Protection des Données : </span> 
                        Nous respectons la législation française sur la
                        protection des données. Consultez notre politique de confidentialité pour plus
                        d'informations.
                     </p>
                     <h3 class="text-2xl leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">
                        4. Propriété Intellectuelle
                     </h3>
                     
                      <p class="mb-5">
                        <span style="font-weight: 900;">4.1. Droits de Propriété : </span> 
                        Tous les droits de propriété intellectuelle relatifs à
                        notre solution restent la propriété exclusive de 
                        <span style="font-weight: 900;">Celia CHARPENTIER.</span>
                     </p>
                     <h3 class="text-2xl leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">
                        5. Résiliation
                     </h3>
                     
                      <p class="mb-5">
                        <span style="font-weight: 900;">5.1. Résiliation : </span> 
                        Vous pouvez résilier votre utilisation de notre solution à tout
                        moment. Nous nous réservons le droit de résilier ou de suspendre votre accès
                        à tout moment pour violation de ces CGU.
                     </p>
                     <h3 class="text-2xl leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">
                        6. Modifications des CGU
                     </h3>
                     
                      <p class="mb-5">
                        <span style="font-weight: 900;">6.1. Notification : </span> 
                        Toute modification de ces CGU sera notifiée sur notre site
                        web. L'utilisation continue de notre solution après de telles modifications
                        constitue votre acceptation des CGU mises à jour
                     </p>
                     <h3 class="text-2xl leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">
                        7. Limitation de Responsabilité
                     </h3>
                     
                      <p class="mb-5">
                        <span style="font-weight: 900;">7.1. Exclusion de Responsabilité : </span> 
                        Nous ne sommes pas responsables des
                        dommages directs, indirects, accessoires, spéciaux ou consécutifs résultant de
                        l'utilisation de notre solution
                     </p>
                     <h3 class="text-2xl leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">
                        8. Loi Applicable et Litiges
                     </h3>
                     
                      <p class="mb-5">
                        <span style="font-weight: 900;">8.1. Loi Applicable : </span> 
                        Ces CGU sont régies par les lois françaises.
                     </p>
                      <p class="mb-5">
                        <span style="font-weight: 900;">8.2. Juridiction : </span> 
                        Tout litige résultant de ces CGU sera soumis à la juridiction
                        exclusive des tribunaux français compétents.
                     </p>
                     
                     <h3 class="text-2xl leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">
                        MERCI DE LIRE ATTENTIVEMENT CES CGU. EN UTILISANT NOTRE
                        SOLUTION, VOUS ACCEPTEZ D'ETRE LIE PAR CES TERMES.
                     </h3>
                     <p class="mb-5">
                        Dernière mise à jour : 16 septembre 2024. </br>
                        Pour toute question, veuillez nous contacter à contact@protectavis.fr 
                     </p>
                </div>
                
                <div class="text-center">
                    <a href="{{ route('pricing') }}" class="text-sm py-4 px-4 bg-yellow-300 text-gray-700 rounded">J'accepte</a>
                </div>
              
  
                
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Contact Form -->
    </main><!-- end main -->
  
     <!-- Footer start -->
     <footer class="bg-gray-900 text-gray-300">
        <!-- footer content -->
        <div id="footer-content" class="relative">
          <div class="container xl:max-w-6xl mx-auto px-4 py-8 border-t border-gray-200 border-opacity-10">
            <!-- row -->
            <div class="flex flex-wrap flex-row -mx-4">
              <!-- copyright text -->
              <div class="flex-shrink max-w-full px-4 w-full md:w-2/3 text-center md:ltr:text-left md:rtl:text-right mb-6 md:mb-0">
                <p><a href="{{ route('login2') }}">© AvisClientPro</a>  | Tout droit réservé</p>
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