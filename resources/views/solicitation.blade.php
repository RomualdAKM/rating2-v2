<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire de Solicitation</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js" defer></script>
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }
        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }
        .form-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
            color: #333333;
        }
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px 15px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #3490dc;
            background-color: #ffffff;
        }
        .form-group label {
            position: absolute;
            top: -10px;
            left: 15px;
            background-color: #ffffff;
            padding: 0 5px;
            font-size: 12px;
            color: #666666;
        }
        .form-group input[type="file"] {
            padding: 5px 15px;
        }
        .submit-btn {
            width: 100%;
            padding: 10px 15px;
            background-color: #3490dc;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            color: #ffffff;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #2779bd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Formulaire de la demande</h2>
            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="/y$10$wHsZAdDo8uF2YZpyoZiQesGDTOdXRh1BQ/{{ $structure->id }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" placeholder="Votre nom" required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" id="contact" name="contact" placeholder="Votre contact" required>
                </div>
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" placeholder="Votre adresse e-mail" required>
                </div>
                <div class="form-group">
                    <label for="object_solicitation">Objet de la demande</label>
                    <input type="text" id="object_solicitation" name="object_solicitation" placeholder="Objet de votre demande" required>
                </div>
                <div class="form-group">
                    <label for="description_solicitation">Description de la demande</label>
                    <textarea id="description_solicitation" name="description_solicitation" rows="4" placeholder="Décrivez votre demande" required></textarea>
                </div>
                <div class="form-group">
                    <label for="file">Fichier (optionnel)</label>
                    <input type="file" id="file" name="file">
                </div>
                <button type="submit" class="submit-btn">Soumettre</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
</body>
</html>
