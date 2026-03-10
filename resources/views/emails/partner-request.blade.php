<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de partenariat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h2 {
            color: #1E90FF;
            border-bottom: 2px solid #FFD700;
            padding-bottom: 10px;
        }
        .info {
            margin-bottom: 15px;
        }
        .info strong {
            display: inline-block;
            width: 150px;
            color: #555;
        }
        .message {
            background: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #FFD700;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Nouvelle demande de partenariat</h2>

        <div class="info"><strong>Organisation :</strong> {{ $data['organisation'] }}</div>
        <div class="info"><strong>Type :</strong> {{ $data['type'] }} {{ $data['type_autre'] ? ' - '.$data['type_autre'] : '' }}</div>
        <div class="info"><strong>Personne de contact :</strong> {{ $data['contact'] }}</div>
        <div class="info"><strong>Fonction :</strong> {{ $data['fonction'] ?? 'Non précisée' }}</div>
        <div class="info"><strong>Email :</strong> {{ $data['email'] }}</div>
        <div class="info"><strong>Téléphone :</strong> {{ $data['phone'] }}</div>
        <div class="info"><strong>Pays :</strong> {{ $data['country'] ?? 'Non précisé' }}</div>

        @if(!empty($data['message']))
            <div class="message">
                <strong>Message :</strong><br>
                {{ nl2br($data['message']) }}
            </div>
        @endif
    </div>
</body>
</html>