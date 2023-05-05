<!DOCTYPE html>
<html lang="fr">

<head>
    <?php $this->title = "Article"; ?>
</head>

<body>
    <?php include 'toptemp.php'; ?>
    <div class="top">
        <h1>Article</h1>
    </div>
    <div class="container">
        <div class="articleBox">
            <div class="article">
                <h2><?= htmlspecialchars($article->getTitle()); ?></h2>
                <p><?= htmlspecialchars($article->getContent()); ?></p>
                <p><?= htmlspecialchars($article->getAuthor()); ?></p>
                <p>Créé le : <?= htmlspecialchars($article->getCreatedAt()); ?></p>
            </div>
        </div>
        <div class="commentBox">
            <h3>Commentaires</h3>
            <?php foreach ($comments as $comment) { ?>
                <div class="comment">
                    <h4><?= htmlspecialchars($comment->getPseudo()); ?></h4>
                    <p><?= htmlspecialchars($comment->getContent()); ?></p>
                    <p>Posté le <?= htmlspecialchars($comment->getCreatedAt()); ?></p>
                </div>
                        <?php if($comment->isFlag()) { ?>
                            <p>Ce commentaire a déjà été signalé</p>
                            <?php } else { ?>
                                <div class="flag">
                                <a href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a>
                                </div>
                            <?php } ?>
            <?php
            }
            ?>
        </div>
        <div class="commentBox">
            <div id="addComment">
                <h3>Ajouter un commentaire</h3>
                <?php include('form_comment.php'); ?>
            </div>
        </div>
    </div>
</body>
<?php include ('footer.php') ?>

</html>