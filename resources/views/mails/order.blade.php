<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nouvelle commande</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #e1e1e1;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333333;
            font-size: 24px;
            text-align: center;
        }
        p {
            color: #555555;
            font-size: 16px;
            line-height: 1.6;
            margin: 0 0 20px 0;
        }
        .cta-button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #3498db;
            color: #ffffff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
        .cta-button:hover {
            background-color: #2980b9;
        }
        .footer {
            text-align: center;
            color: #888888;
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Nouvelle commande client</h1>
        <p>Bonjour</p>
        <p>Une nouvelle commande vient d'être faite par un client. Veuillez consulter votre application AVIS CLIENT ou votre plateforme web pour en prendre connaissance.</p>
        {{-- <a class="cta-button" href="{{ $cta_link }}">Voir les retours</a> --}}
        <p>Cordialement,</p>
        <p>L'équipe VIBECRO</p>
    </div>
    <div class="footer">
        &copy; 2024 VIBECRO. Tous droits réservés.
    </div>
</body>
</html>
