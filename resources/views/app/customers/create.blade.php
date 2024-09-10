<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                    <h1>Envoyer un message</h1>
                    <a href="{{ url()->previous() }}" class="hidden md:block">
                        <x-primary-button>
                            Retour
                        </x-primary-button>
                    </a>
                    </div>
                    <x-forms.create :fields="$my_fields" type="customer" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
