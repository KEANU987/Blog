
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    $this->title = "Connexion"; ?>
    <?= $this->session->show('error_login'); ?>
</head>
<body>
<?php include 'toptemp.php';?>
<div class="top">
        <h1>Connexion</h1>
</div>

<div class="container">
    <div class="articleBox">
        <div class="article">
    <form method="post" action="../public/index.php?route=login">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value = "<?= isset($post) ? htmlspecialchars($post->get('pseudo')) : ''; ?>"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Connexion" id="submit" name="submit">
        <p>Vous n'avez pas de compte? <a href="../public/index.php?route=register"> Inscrivez-vous.</a></p>
    </form>
           
    </div>
</div>
</div>
</body>
</html>