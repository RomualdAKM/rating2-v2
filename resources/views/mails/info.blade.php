<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROTECT AVIS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        p {
            color: #555;
            margin: 10px 0;
        }
        strong {
            font-weight: bold;
        }
        .container {
            background-color: #fff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Informations Entreprise</h2>
        <p><strong>Nom Entreprise:</strong> {{ $name_structure }}</p>
        <p><strong>Email Entreprise:</strong> {{ $email_structure }}</p>
        <p><strong>Nom Admin:</strong> {{ $name_admin }}</p>
        <p><strong>Email Admin:</strong> {{ $email_admin }}</p>
        <p><strong>Adresse:</strong> {{ $adress }}</p>
        <p><strong>Contact:</strong>{{$phone}}</p>
        <p><strong>Ville:</strong>{{$city}}</p>
        <p><strong>Code POstal:</strong>{{$postal}}</p>
        <p><strong>Code D'Activation:</strong>{{$promo}}</p>
        <p><strong>Prix:</strong>{{$prix}}€</p>
        {{-- <p>{{ $contenu }}</p> --}}
    </div>
</body>
</html>
