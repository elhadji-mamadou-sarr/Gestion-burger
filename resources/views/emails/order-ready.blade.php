<!DOCTYPE html>
<html>
<head>
    <title>Votre commande est prête</title>
</head>
<body>
    <h1>Bonjour {{ $order->user->nom }} {{ $order->user->prenom }},</h1>
    <p>Votre commande #{{ $order->id }} est prête.</p>
    <p>Vous trouverez ci-joint la facture au format PDF.</p>
    <p>Merci pour votre confiance !</p>
</body>
</html>