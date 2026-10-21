<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>

    <!-- Étape 2 : Titre -->
    <h1>Se connecter</h1>

    <!-- Étape 5 : Message transmis par le contrôleur -->
    <?php if (isset($message) && !empty($message)): ?>
        <p class="message"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <!-- Étape 3 : Formulaire avec method="post" et action="/login" -->
    <form action="/login" method="post">
        
        <!-- Champ email -->
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <!-- Champ password -->
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>

        <!-- Bouton de soumission -->
        <div>
            <input type="submit" name="submit" value="Connexion">
        </div>

    </form>

</body>
</html>