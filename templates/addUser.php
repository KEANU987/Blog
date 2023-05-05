<!DOCTYPE html>
<html lang="fr">

<head>
</head>
<?php include 'toptempadm.php'; ?>
<?php $this->title = "Ajouter un Utilisateurs"; ?>
<div>

    <body>
        <div class="top">
            <h1>Ajouter un utilisateur</h1>
        </div>
        <div class="container">
            <div class="articleBox">
                <div class="article">
                    <form method="post" action="../public/index.php?route=addUser">
                        <label for="pseudo">Pseudo:</label><br>
                        <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')) : ''; ?>"><br>
                        <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
                        <label for="password">Mot de passe:</label><br>
                        <input type="password" id="password" name="password" value="<?= isset($post) ? htmlspecialchars($post->get('password')) : ''; ?>"><br>
                        <?= isset($errors['password']) ? $errors['password'] : ''; ?>
                        <label for="password">Choisir le rôle:</label><br> 
                            <?php foreach($roles as $role){?>
                                <input value="<?= isset ($post) ? htmlspecialchars ($post->get('role')) : ''; ?>">
                                <label><?= htmlspecialchars($role->getRole()); ?></label>
                            <?php }?>
                        <input type="submit" value="Ajouter l'utilisateur" id="submit" name="submit">
                        <p>Le mot de passe doit contenir au moins 1 majuscule, 1 minusucule, 1 chiffre et 1 caractère spécial.</p>
                    </form>
                </div>
            </div>
        </div>

    </body>
    <?php include('footer.php') ?>
</div>