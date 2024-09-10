<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex justify-between">
                        <h1>Voir l'avis du client</h1>
                        <a href="{{ url()->previous() }}" class="hidden md:block">
                            <x-primary-button>
                                Retour
                            </x-primary-button>
                        </a>
                        
                    </div>

                    {{-- <x-tables.default :resources="$rates" :mattributes="$rates_attributes"  type="answer" /> --}}
                    <x-tables.default :resources="$rates" :mattributes="$rates_attributes" :mactions="$my_actions" type="answer" />
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
