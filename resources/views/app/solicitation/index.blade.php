<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <a href="{{ url()->previous() }}" class="hidden md:block">
                            <x-primary-button>
                                Retour
                            </x-primary-button>
                        </a>
                        <h1 class="font-bold text-lg my-2">Liste des demandes</h1>
                    </div>
                    <div class="pt-16 md:flex mt-4">
                        <div class="w-full md:w-1/2 px-4">
                            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 rounded-lg mt-8">
                                <div class="px-6">
                                    <div class="flex flex-wrap justify-center">
                                        <div class="w-full px-4 flex justify-center">
                                            <div class="h-full w-full flex flex-col justify-center">
                                                {{-- <img alt="..." src="{{ asset('assets/img/profil.jpg') }}"
                                                    class="shadow-xl rounded-full h-24 w-24 align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"> --}}
                                                <div class="mx-auto">
                                                    {{ $qrCode }}
                                                </div>
                                               
                                            </div>
                                        </div>
                                      
                                        
                                        <div class="mr-4 p-3 text-center mt-2">
                                            <a href="{{ route('solicitation.print', $structure->id) }}">
                                           
                                                <button class="bg-green-800 text-white active:bg-green-900 font-bold uppercase text-xs px-4 py-2 rounded-md shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                                    Imprimer le QR
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <x-tables.default :resources="$solicitations" :mattributes="$my_attributes" type="solicitation" :mactions="$my_actions" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

