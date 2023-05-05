<!DOCTYPE html>
<html lang="fr">
<head>
</head>
<body>
<?php
$route = isset($post) && $post->get('id') ? 'editComment' : 'addComment';
$submit = $route === 'addComment' ? 'Ajouter' : 'Mettre à jour';
?>
    <form method="post" action="../public/index.php?route=addComment&articleId=<?=  htmlspecialchars($article->getId()); ?>">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo"><br>
        <label for="content">Message</label><br>
        <textarea id="content" name="content"></textarea><br>
        <input type="submit" value="Ajouter" id="submit" name="submit">
    </form>
</body>
</html>
