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
                            <h2 class="text-2xl font-bold mb-6 text-center">Pointage de Présence</h2>
                            @if ($errors->any())
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('attendance.verify-id') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700">ID du Personnel</label>
                                    <input type="text" name="personnel_id" class="w-full px-4 py-2 border rounded-lg"
                                        required>
                                </div>
                                <div class="flex justify-center">
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-lg">Vérifier</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
