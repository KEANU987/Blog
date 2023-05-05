<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    $this->title = "Connexion"; ?>
    <?= $this->session->show('error_login'); ?>
</head>
<?php $this->title = "Inscription"; ?>
<div>
    <body>
    <?php include 'toptemp.php';?>
    <div class="top">
        <h1>Inscription</h1>
</div>
    <div class="container">
        <div class="articleBox">
            <div class="article">
    <form method="post" action="../public/index.php?route=register">
    <label for="pseudo">Pseudo:</label><br>
    <input type="text" id="pseudo" name="pseudo" value = "<?= isset ($post) ? htmlspecialchars ($post->get('pseudo')): ''; ?>"><br>
    <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
    <label for="password">Mot de passe:</label><br>
    <input type="password" id="password" name="password" ><br>
    <?= isset($errors['password']) ? $errors['password'] : ''; ?>
    <input type="submit" value="Inscription" id="submit" name="submit">
    <p>Le mot de passe doit contenir au moins 1 majuscule, 1 minusucule, 1 chiffre et 1 caractère spécial pour l'inscription.</p>
    </form>
    </div>
        </div>
    </div>

    </body>
</div>