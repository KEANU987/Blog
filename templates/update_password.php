<!DOCTYPE html>
<head>
</head>
<body>
<?php include 'toptemp.php';?>
    <div class="top">
        <h1>Modifer mot de passe</h1>
        <p>Connexion</p>
    </div>
<?php
$this->title = 'Modifier mot mot de passe'; ?>
<div class="container">
    <div class="articleBox">
<h1>Modifier le mot de passe</h1>
<div>
 <p>Le mot de passe de <?= $this->session->get('pseudo'); ?> sera modifié</p>
 <form method="post" action="../public/index.php?route=updatePassword">
 <input type="password" id="password" name="password"><br>
 <input type="submit" value="Mettre à jour" id="submit" name="submit">
 </form>
 </div>
</div>
</div>
</body>
</html>