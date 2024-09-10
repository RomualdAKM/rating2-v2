<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                    <h1>Modifier le statut de la demande</h1>
                    <a href="{{ url()->previous() }}" class="hidden md:block">
                        <x-primary-button>
                            Retour
                        </x-primary-button>
                    </a>
                    </div>
                    <x-forms.update :item="$solicitation" :fields="$my_fields" type="solicitation" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
