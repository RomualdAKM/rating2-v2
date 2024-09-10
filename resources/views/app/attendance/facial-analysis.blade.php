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
                            <h2 class="text-2xl font-bold mb-6 text-center">Analyse Faciale</h2>
                            <div class="mb-4">
                                <video id="video" class="w-full h-64 bg-gray-300" autoplay></video>
                            </div>
                            <div class="flex justify-center">
                                <button id="capture" class="bg-green-500 text-white px-4 py-2 rounded-lg">Analyser</button>
                            </div>
                            <form id="facial-analysis-form" action="{{ route('attendance.facial-analysis') }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="personnel_id" value="{{ $personnel_id }}">
                                <input type="hidden" name="image" id="image">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const video = document.getElementById('video');
    const captureButton = document.getElementById('capture');
    const form = document.getElementById('facial-analysis-form');
    const imageInput = document.getElementById('image');

    // Access the webcam
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(err => {
            console.error("Error accessing webcam: ", err);
        });

    // Capture the image
    captureButton.addEventListener('click', () => {
        const canvas = document.createElement('canvas');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        canvas.getContext('2d').drawImage(video, 0, 0);
        const imageData = canvas.toDataURL('image/png');
        imageInput.value = imageData;
        form.submit();
    });
</script>
