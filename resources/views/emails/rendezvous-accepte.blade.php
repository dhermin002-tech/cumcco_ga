<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; color: #122A4D; line-height: 1.6;">

    <div style="max-width: 560px; margin: 0 auto; padding: 24px;">

        <h2 style="color: #2DAE7E;">Votre rendez-vous est confirmé</h2>

        <p>Bonjour {{ $rendezvous->prenom }} {{ $rendezvous->nom }},</p>

        <p>Nous avons le plaisir de vous confirmer votre rendez-vous au Centre d'Urgence Médico-Chirurgical Clotilde Okinda.</p>

        <div style="background: #F7F8FA; border-radius: 8px; padding: 16px; margin: 20px 0;">
            <p style="margin: 4px 0;"><strong>Spécialité :</strong> {{ $rendezvous->specialite }}</p>
            <p style="margin: 4px 0;"><strong>Médecin :</strong> {{ $rendezvous->medecin }}</p>
            <p style="margin: 4px 0;"><strong>Date :</strong> {{ \Carbon\Carbon::parse($rendezvous->date)->format('d/m/Y') }}</p>
            <p style="margin: 4px 0;"><strong>Créneau :</strong> {{ $rendezvous->creneau }}</p>
        </div>

        <p>Merci de vous présenter quelques minutes avant l'heure prévue avec vos documents médicaux.</p>

        <p>En cas d'empêchement, contactez-nous pour reporter ou annuler votre rendez-vous.</p>

        <p style="margin-top: 24px;">Cordialement,<br>L'équipe du CUMC-CO</p>

    </div>

</body>
</html>