<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">

                        <h1 class="font-bold text-lg my-2">Pointage de Présence</h1>
                       
                        <a href="{{ url()->previous() }}" class="hidden md:block">
                            <x-primary-button>
                                Retour
                            </x-primary-button>
                        </a>
                    </div>
                    <div class="container mx-auto py-8">
                        <div class="w-full max-w-lg mx-auto bg-white rounded-lg shadow-md p-6">
                            <h2 class="text-2xl font-bold mb-6 text-center">Confirmation de Présence</h2>
                            <div class="flex justify-center space-x-4">
                                <form action="{{ route('attendance.mark-arrival') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="personnel_id" value="{{ $personnel_id }}">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Marquer l'Arrivée</button>
                                </form>
                                <form action="{{ route('attendance.mark-departure') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="personnel_id" value="{{ $personnel_id }}">
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">Confirmer le Départ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
