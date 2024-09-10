<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/geolocation.js') }}"></script>
    <style>
        /* Styles pour la section audio */
        .display {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 20px;
            /* Ajustez la hauteur selon vos besoins */
        }

        audio {
            width: 100%;
            max-width: 400px;
        }

        /* Styles pour les contrôles audio */
        .controllers {
            text-align: center;
        }

        button {
            padding: 10px 20px;
            background-color: #4bad41;
            color: white;
            border: none;
            cursor: pointer;
            margin: 10px;
        }

        button:hover {
            background-color: #357e2e;
        }

        button:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }

        p {
            font-size: 18px;
        }
    </style>

</head>


<body x-data="{ showModal4: false, showModal3: false, showModal2: false, showModal1: true }" class="font-sans text-gray-900 antialiased">

    <div x-show="showModal1" class="fixed inset-0 overflow-y-auto z-50" x-cloak>
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-slate-100 w-full max-w-md p-4 rounded">
                  
                <div class="mt-4">
                    <h1 class="text-lg font-semibold">{{ $user->place->name ?? '' }},</h1>
                   
                    <p>
                        Bienvenu cher client(e)
                        Merci d'être passé(e). En saisissant votre numéro de telephone, vous acceptez <a href="/rgpd"
                            class="text-blue-500 underline">les conditions générales d'utilisation</a> de l'application.
                    </p>
                    <div class="mt-4">
                        <input type="tel" id="tel" placeholder="N° Telephone avec indicatif de votre pays"
                            class="bg-slate-100 my-2 peer block min-h-[auto] w-full rounded border px-3 py-[0.32rem] leading-[1.6] outline-none">
                    </div>
                </div>
                <div class="mt-6 flex justify-end">

                    @if ($user->structure->type === 'Hotel')

                    <button
                        @click="(function(){ var tel = document.getElementById('tel').value.trim(); if (tel !== '') { showModal1 = false; showModal4 = true } })()"
                        class="px-4 py-2 bg-green-500 text-white rounded-md">
                        Suivant
                    </button>
                   
                    @elseif ($user->structure->type === 'Pharmacie Agréée')
                    <button
                        @click="(function(){ var tel = document.getElementById('tel').value.trim(); if (tel !== '') { showModal1 = false; showModal2 = true } })()"
                        class="px-4 py-2 bg-green-500 text-white rounded-md">
                        Suivant
                    </button>

                    @else
                    <button
                        @click="(function(){ var tel = document.getElementById('tel').value.trim(); if (tel !== '') { showModal1 = false; showModal3 = true } })()"
                        class="px-4 py-2 bg-green-500 text-white rounded-md">
                        Suivant
                    </button>
                  

                    @endif
                </div>
            </div>
        </div>
    </div>

        
    <div x-show="showModal4" class="fixed inset-0 overflow-y-auto z-50" x-cloak>
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-slate-100 w-full max-w-md p-4 rounded">
                <div class="mt-4">
                    <h1 class="text-lg font-semibold">  Veuillez entrer le numéro de la unité</h1>
                
                    <div class="mt-4">
                        <input type="room" id="room" placeholder="N° unité" name="room"
                            class="bg-slate-100 my-2 peer block min-h-[auto] w-full rounded border px-3 py-[0.32rem] leading-[1.6] outline-none">
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button
                        @click="(function(){ var room = document.getElementById('room').value.trim(); if (room !== '') { showModal4 = false; showModal3 = true } })()"
                        class="px-4 py-2 bg-green-500 text-white rounded-md">
                        Suivant 
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div x-show="showModal2" class="fixed inset-0 overflow-y-auto z-50" x-cloak>
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-slate-100 w-full max-w-md p-4 rounded">
                <div class="mt-4">
                    <p>
                        Que souhaitez vous?
                    </p>

                    <div class="m-4">
                        <div class="mb-4 flex items-center min-h-[1.5rem] pl-[1.5rem]">
                            <input onclick="" checked
                                class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                type="radio" name="flexRadioDefault1" id="radioDefault03" value="avis" />
                            <label onclick="" class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer"
                                for="radioDefault03">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                                </svg>
                                Laisser votre avis/suggestion
                            </label>
                        </div>
                        <div class="mb-4 flex items-center min-h-[1.5rem] pl-[1.5rem]">
                            <input onclick=""
                                class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                type="radio" name="flexRadioDefault1" id="radioDefault05" value="complain" />
                            <label onclick="" class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer"
                                for="radioDefault05">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Soumettre une plainte
                            </label>
                        </div>
                        <div class="mb-4 flex items-center min-h-[1.5rem] pl-[1.5rem]">
                            <input onclick=""
                                class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                type="radio" name="flexRadioDefault1" id="radioDefault04" value="order" />
                            <label onclick="" class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer"
                                for="radioDefault04">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                                Faire une commande spéciale
                            </label>
                        </div>
                    </div>

                </div>
                <div class="mt-6 flex justify-end">
                    <button
                        @click="(function() { 
                            var radios = document.querySelectorAll('input[name=\'flexRadioDefault1\']');
                            var value = Array.from(radios).find(radio => radio.checked).value; 
                            if (value === 'avis') { showModal2 = false; showModal3 = true; };
                            if (value === 'order') { showModal2 = false; showOrderForm(), setContact() };
                            if (value === 'complain') { showModal2 = false; showComplainForm(), setContact() }
                        }) ()"
                        class="px-4 py-2 bg-green-500 text-white rounded-md">
                        Suivant
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div x-show="showModal3" class="fixed inset-0 overflow-y-auto z-50" x-cloak>
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-slate-100 w-full max-w-md p-4 rounded">
                <div class="mt-4">
                    <p>
                        Vous avez la possibité de donner votre avis par message audio ou écrit
                    </p>

                    <div class="m-4">
                        <div class="mb-4 flex items-center min-h-[1.5rem] pl-[1.5rem]">
                            <input onclick="showTextForm()" checked
                                class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                type="radio" name="flexRadioDefault" id="radioDefault02" />
                            <label onclick="showTextForm()"
                                class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="radioDefault02">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8 inline-block mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                Ecrit
                            </label>
                        </div>
                        <div class="mb-4 flex items-center min-h-[1.5rem] pl-[1.5rem]">
                            <input onclick="showAudioForm()"
                                class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                type="radio" name="flexRadioDefault" id="radioDefault01" />
                            <label onclick="showAudioForm()"
                                class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="radioDefault01">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8 inline-block mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z" />
                                </svg>
                                Audio
                            </label>
                        </div>
                    </div>

                </div>
                <div class="mt-6 flex justify-end">
                    <button @click="showModal3 = false; showForm(); setContact()"
                        class="px-4 py-2 bg-green-500 text-white rounded-md">
                        Suivant
                    </button>
                </div>
            </div>
        </div>
    </div>

    <header id="header" class="hidden">
        <!-- Navigation bar -->
        <nav class="relative flex w-full items-center justify-between bg-white text-white py-2 shadow-lg md:flex- md:justify-start"
            style="background-color: #03224c" data-te-navbar-ref>
            {{-- <div class="flex w-full flex-wrap items-center justify-between px-3"> --}}
            <div class="flex w-full flex-wrap items-center justify-center px-3">

                <div>
                    <a class="flex items-center no-underline hover:no-underline font-bold text-2xl lg:text-4xl h-20"
                        href="/">
                        {{-- <img class="w-10" src="{{ url('storage/' . $user->structure->logo) }}" alt=""> &nbsp; --}}
                        <div class="tracking-widest text-sm font-semibold italic rounded text-white">
                            {{ $user->place->name ?? '' }}
                        </div>
                    </a>
                </div>
            </div>
        </nav>

        <!-- Hero section with background image, heading, subheading and button -->
        <div class="bg-center bg-contain bg-no-repeat h-96"
            style="background-position: 50%; background-image: url('/assets/img/146.jpg');">
            <div class="px-8 md:px-14 mx-auto flex flex-wrap flex-col md:flex-row items-center h-full py-2"
                style="background-color: rgba(4, 46, 70, .5)">
            </div>
        </div>
    </header>

    <input id="form_type" type="hidden" value="text">

    <section id="form" class="hidden text-gray-600 body-font">
        <div class="container md:px-5 py-12 mx-auto">
            <div class="p-4">
                @if (Session::has('success'))
                    <div class="mb-4 rounded-lg bg-success-100 px-6 py-5 text-base text-success-700" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <h2 class="text-center font-bold text-xl md:text-2xl my-6">Merci de nous accorder 2 min</h2>
                
                <form action="" id="" method="POST">

                    @csrf

                    <input type="hidden" name="quizzes" value="{{ $quizzes->count() }}">

                    <div class="relative my-6 md:w-1/2 md:mx-auto">
                        <h3 class="font-bold">Souhaitez vous décliner votre idchambre ? </h3>
                        <select id="identity" onchange="displayId(this.value)"
                            class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none">
                            <option value="no">Non</option>
                            <option value="yes">Oui</option>
                        </select>
                    </div>
                    <div id="idForm" class="hidden relative my-6 md:w-1/2 md:mx-auto">
                        <div>
                            <label for="name" class="font-bold">
                                Nom et Prénoms
                            </label>
                            <input id="name"
                                class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none"
                                type="text" name="name" />
                        </div>
                        <div>
                            <label for="email" class="font-bold">
                                Email
                            </label>
                            <input id="email"
                                class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none"
                                type="email" name="email" />
                        </div>
                    </div>

                    {{-- @if ($user->structure->type == 'Hotel')
                        <div class="relative my-6 md:w-1/2 md:mx-auto">
                            <label for="room" class="font-bold">
                                Entrez le numéro de votre unité
                            </label>
                            <input 
                                class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none"
                                type="hidden" name="room" :value="document.getElementById('room').value.trim()" />
                        </div>
                    @endif --}}

                    @php $i = 0; @endphp
                    @foreach ($quizzes as $quiz)
                        @if ($quiz !== null)
                        @if ($quiz->type == 'Réponse par taux de satisfaction')
                        <div class="relative my-6 md:w-1/2 md:mx-auto">

                            <label for="{{ 'quiz' . $i }}" class="font-bold">
                                {{ $quiz->question }}
                            </label>

                            <select
                                class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none"
                                name="{{ 'answer' . $i }}" id="{{ 'quiz' . $i }}" 
                                required>
                                <option value="">Réponse par taux de satisfaction</option>
                                <option value="Non satisfait">Non satisfait</option>
                                <option value="Peu satisfait">Peu satisfait</option>
                                <option value="Satisfait">Satisfait</option>
                                <option value="Tres satisfait">Trés satisfait</option>
                            </select>

                            <x-input-error :messages="$errors->get('answer{{ $i }}')" class="mt-2" />

                        </div>
                        @elseif ($quiz->type == 'Réponse par taux appliqué')   
                        <div class="relative my-6 md:w-1/2 md:mx-auto">

                            <label for="{{ 'quiz' . $i }}" class="font-bold">
                                {{ $quiz->question }}
                            </label>

                            <select
                                class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none"
                                name="{{ 'answer' . $i }}" id="{{ 'quiz' . $i }}" 
                                required>
                                <option value="">Réponse par taux appliqué</option>
                                <option value="Non appliqué">Non appliqué</option>
                                <option value="Peu satisfait">Peu satisfait</option>
                                <option value="Satisfait">Satisfait</option>
                                <option value="Tres satisfait">Trés satisfait</option>
                            </select>

                            <x-input-error :messages="$errors->get('answer{{ $i }}')" class="mt-2" />

                        </div> 
                        @else
                            
                        <div class="relative my-6 md:w-1/2 md:mx-auto">

                            <label for="{{ 'quiz' . $i }}" class="font-bold">
                                {{ $quiz->question }}
                            </label>

                            <select
                                class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none"
                                name="{{ 'answer' . $i }}" id="{{ 'quiz' . $i }}" 
                            required>
                                <option value="">Réponse par oui / non</option>
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                            </select>

                            <x-input-error :messages="$errors->get('answer{{ $i }}')" class="mt-2" />

                        </div>
                        @endif
                            <input type="hidden" name="{{ 'quiz_id' . $i }}" value="{{ $quiz->id }}">

                            @php $i++; @endphp
                        @endif
                    @endforeach

                    <div class="relative mb-6 md:w-1/2 md:mx-auto">
                        <textarea rows="5" name="{{ 'appreciation' }}" placeholder="Veuillez laisser votre avis"
                            class="my-2 peer block min-h-[auto] w-full rounded border px-3 py-[0.32rem] leading-[1.6] outline-none"></textarea>
                    </div>

                    <input type="hidden" name="structure" value="{{ $structure->id }}">
                    <input type="hidden" name="user" value="{{ $user->id }}">

                    <input type="hidden" id="latitude" name="latitude" value="">
                    <input type="hidden" id="longitude" name="longitude" value="">
                    <input type="hidden" id="form_type" name="form_type" value="classic">
                    <input type="hidden" name="contact" id="contact1">

                    <!--Submit button-->
                    <button type="submit"
                        class="md:w-1/2 block mx-auto rounded px-6 pb-2 pt-2.5 my-6 text-xs font-medium uppercase leading-normal text-white"
                        style="background-color: #4bad41">
                        Envoyer
                    </button>
                </form>
            </div>
        </div>
    </section>
    <!-----------------------------  vocal ---------------------------->
    <div id="vocal" class="p-4 hidden">
        <div class="relative my-2 md:w-1/2 md:mx-auto">
            <h3>Message audio</h3>
        </div>
        <div class="display"></div>
        <div class="controllers"></div>

        <form action="" method="POST" style="text-align: center;" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="form_type" value="audio">
            <input type="hidden" name="structure" value="{{ $structure->id }}">
            <input type="hidden" name="user" value="{{ $user->id }}">
            <input type="hidden" name="audio" id="aud">
        </form>
    </div>

    <!----------------------------- order form ---------------------------->
    <section id="orderForm" class="hidden text-gray-600 body-font">
        <div class="container md:px-5 py-12 mx-auto">
            <div class="p-4">
                @if (Session::has('success'))
                    <div class="mb-4 rounded-lg bg-success-100 px-6 py-5 text-base text-success-700" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <h2 class="text-center font-bold text-xl md:text-2xl my-6">Faire une commande</h2>
                <form action="{{ route('store.order') }}" id="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="structure" value="{{ $structure->id }}">

                    <div id="" class="relative my-6 md:w-1/2 md:mx-auto">
                        <div>
                            <label for="name" class="font-bold">
                                Nom et Prénoms
                            </label>
                            <input id="name"
                                class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none"
                                type="text" name="name" />
                        </div>
                        <div>
                            <label for="contact1" class="font-bold">
                                Contact
                            </label>
                            <input id="contact1"
                                class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none"
                                type="tel" name="tel" />
                        </div>
                        <div>
                            <label for="product" class="font-bold">
                                Produit
                            </label>
                            <input id="product"
                                class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none"
                                type="text" name="product" />
                        </div>
                        <div>
                            <label for="quantity" class="font-bold">
                                Quantitée
                            </label>
                            <input id="quantity"
                                class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none"
                                type="number" value="1" name="quantity" />
                        </div>
                        <div>
                            <label for="delay" class="font-bold">
                                Délai
                            </label>
                            <input id="delay"
                                class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none"
                                type="date" value="1" name="delay" />
                        </div>
                        <div>
                            <label for="description" class="font-bold">
                                Description (optionnel)
                            </label>
                            <textarea rows="5" name="description" placeholder="Description" id="description"
                                class="my-2 peer block min-h-[auto] w-full rounded border px-3 py-[0.32rem] leading-[1.6] outline-none"></textarea>
                        </div>
                        <div>
                            <label for="image" class="font-bold">
                                Image (optionnel)
                            </label>
                            <input id="image"
                                class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none"
                                type="file" value="1" name="image" accept="image/*" />
                        </div>
                    </div>

                    <!--Submit button-->
                    <button type="submit"
                        class="md:w-1/2 block mx-auto rounded px-6 pb-2 pt-2.5 my-6 text-xs font-medium uppercase leading-normal text-white"
                        style="background-color: #4bad41">
                        Envoyer
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!----------------------------- complain form ---------------------------->
    <section id="complainForm" class="hidden text-gray-600 body-font">
        <div class="container md:px-5 py-12 mx-auto">
            <div class="p-4">
                @if (Session::has('success'))
                    <div class="mb-4 rounded-lg bg-success-100 px-6 py-5 text-base text-success-700" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <h2 class="text-center font-bold text-xl md:text-2xl my-6">Laisser une plainte</h2>
                <form action="{{ route('store.complain') }}" id="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="structure" value="{{ $structure->id }}">

                    <div id="" class="relative my-6 md:w-1/2 md:mx-auto">
                        <div>
                            <label for="name" class="font-bold">
                                Nom et Prénoms
                            </label>
                            <input id="name"
                                class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none"
                                type="text" name="name" />
                        </div>
                        <div>
                            <label for="contact1" class="font-bold">
                                Contact
                            </label>
                            <input id="contact1"
                                class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none"
                                type="tel" name="tel" />
                        </div>
                        <div>
                            <label for="complain" class="font-bold">
                                Plainte
                            </label>
                            <textarea rows="5" name="complain" placeholder="Plainte" id="complain"
                                class="my-2 peer block min-h-[auto] w-full rounded border px-3 py-[0.32rem] leading-[1.6] outline-none"></textarea>
                        </div>
                    </div>

                    <!--Submit button-->
                    <button type="submit"
                        class="md:w-1/2 block mx-auto rounded px-6 pb-2 pt-2.5 my-6 text-xs font-medium uppercase leading-normal text-white"
                        style="background-color: #4bad41">
                        Envoyer
                    </button>
                </form>
            </div>
        </div>
    </section>

    <footer id="footer" class="hidden px-6 mx-auto flex-wrap flex-col md:flex-row items-center"
        style="background-color: #03224c">
        <!--Footer-->

        <div class="w-full pt-8 pb-8 text-md text-center fade-in flex flex-col md:flex-row justify-between">
            <div class="mt-2">
                <a class="text-white no-underline hover:no-underline" href="/rgpd">RGPD</a> <span
                    class="text-white"> 
                </span>
                {{-- <a class="text-white no-underline hover:no-underline" href="#">CGU</a> --}}
            </div>

            <div class="mb-2">
                <a class="text-white no-underline hover:no-underline"
                    href="#">&copy;{{ $user->place->name ?? '' }}&nbsp; 2024</a>
            </div>
        </div>

        <div class="my-2 flex justify-center items-center w-full">
            <a class="text-white no-underline hover:no-underline" href="https://vibecro-corp.tech/"><i>By Vibecro
                    Corporation</i></a>
            &nbsp; &nbsp;
            {{-- <a class="text-white no-underline hover:no-underline" href="tel:+22955695656"> <i> <u>Tel:</u> +229 55 69
                    56 56</i></a> --}}
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    @include('sweetalert::alert')

</body>
<!-- Votre code HTML existant -->
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
<script>
    function setContact() {
        if (document.getElementById('contact1')) {
            document.getElementById('contact1').value = document.getElementById('tel').value;
        }
    }

    function showTextForm() {
        document.getElementById('form_type').value = "text";
    }

    function showAudioForm() {
        document.getElementById('form_type').value = "audio";
    }

    function showOrderForm() {
        document.getElementById('header').style.display = 'block';
        document.getElementById('orderForm').style.display = 'block';
        document.getElementById('footer').style.display = 'flex';
    }

    function showComplainForm() {
        document.getElementById('header').style.display = 'block';
        document.getElementById('complainForm').style.display = 'block';
        document.getElementById('footer').style.display = 'flex';
    }

    function showForm() {
        document.getElementById('header').style.display = 'block';
        document.getElementById('footer').style.display = 'flex';

        if (document.getElementById('form_type').value == 'text') {
            document.getElementById('form').style.display = 'block';
        } else {
            document.getElementById('vocal').style.display = 'block';
        }
    }

    // collect DOMs
    const display = document.querySelector('.display');
    const controllerWrapper = document.querySelector('.controllers');

    const State = ['Initial', 'Record', 'Download'];
    let stateIndex = 0;
    let mediaRecorder, chunks = [],
        audioURL = '';

    // mediaRecorder setup for audio
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        console.log('mediaDevices supported..');

        navigator.mediaDevices.getUserMedia({
            audio: true
        }).then(stream => {
            mediaRecorder = new MediaRecorder(stream);

            mediaRecorder.ondataavailable = (e) => {
                chunks.push(e.data);
            }

            mediaRecorder.onstop = () => {
                const blob = new Blob(chunks, {
                    'type': 'audio/ogg; codecs=opus'
                });
                chunks = [];
                audioURL = window.URL.createObjectURL(blob);
                document.querySelector('audio').src = audioURL;
            }
        }).catch(error => {
            console.log('Following error has occurred: ', error)
        });
    } else {
        stateIndex = '';
        application(stateIndex);
    }

    const clearDisplay = () => {
        display.textContent = '';
    }

    const clearControls = () => {
        controllerWrapper.textContent = '';
    }

    const record = () => {
        stateIndex = 1;
        mediaRecorder.start();
        application(stateIndex);
    }

    const downloadAudio = () => {
        const downloadLink = document.createElement('a');
        downloadLink.href = audioURL;
        downloadLink.setAttribute('download', 'audio');
        downloadLink.click();
    }

    const addButton = (id, funString, text) => {
        const btn = document.createElement('button');
        btn.id = id;
        btn.setAttribute('onclick', funString);
        btn.textContent = text;
        btn.style =
            'border-radius: 5px; padding: 10px 20px; background-color: #ed4337; color: white; border: none; cursor: pointer;';
        controllerWrapper.append(btn);
    }

    const addMessage = (text) => {
        const msg = document.createElement('p');
        msg.textContent = text;
        display.append(msg);
    }

    const addAudio = () => {
        const audio = document.createElement('audio');
        audio.controls = true;
        audio.src = audioURL;
        display.append(audio);
    }

    const application = (index) => {
        switch (State[index]) {
            case 'Initial':
                clearDisplay();
                clearControls();

                addButton('record', 'record()', 'Laisser Un vocal');
                break;

            case 'Record':
                clearDisplay();
                clearControls();

                addMessage('Recording...');
                addButton('stop', 'stopRecording()', 'Stoppez le vocal');
                break

            case 'Download':
                return redirect('done');

                clearControls();
                clearDisplay();

                addAudio();
                addButton('record', 'record()', 'Laisser Un vocal');
                break

            default:
                clearControls();
                return redirect('done');

                clearDisplay();

                addMessage('Your browser does not support mediaDevices');
                break;
        }
    }

    function send() {
        document.getElementById("send").value = document.getElementsByTagName("audio")[0].src;
    }

    const sendAudioToController = async (audioBlob) => {
        const formData = new FormData();
        formData.append('audio', audioBlob);
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('form_type', 'audio');
        formData.append('structure', '{{ $structure->id }}');
        formData.append('user', '{{ $user->id }}');
        formData.append('contact', document.getElementById('tel').value);
        formData.append('room', document.getElementById('room').value);

        try {
            const response = await fetch("https://avis-client.online/public/voice", {
                // const response = await fetch("/voice/", {
                method: 'POST',
                body: formData,
            });

            if (response.ok) {
                console.log('Audio téléversé avec succès.');
                window.location.replace('/done');
            } else {
                console.error('Erreur lors du téléversement de l\'audio.');
            }
        } catch (error) {
            console.error('Erreur réseau :', error);
        }
    };

    const stopRecording = () => {
        stateIndex = 2;
        mediaRecorder.stop();

        // Après avoir arrêté l'enregistrement, envoyez l'audio au contrôleur
        mediaRecorder.onstop = () => {
            const blob = new Blob(chunks, {
                'type': 'audio/ogg; codecs=opus'
            });
            chunks = [];
            audioURL = window.URL.createObjectURL(blob);

            sendAudioToController(blob); // Envoyer le blob audio au contrôleur
            alert("Audio envoyé avec succes");
            application(stateIndex);
        };
    }
    application(stateIndex);

    function displayId(param) {
        switch (param) {
            case 'yes':
                change1();
                break;
            case 'no':
                change2();
                break;
        }
    }

    function change1() {
        document.getElementById("idForm").style.display = "block";
    }

    function change2() {
        document.getElementById("idForm").style.display = "none";
    }
</script>

</html>
