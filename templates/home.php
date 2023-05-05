<!DOCTYPE html>

<head>
    <?php $this->title = "Accueil"; ?>
</head>

<body>
    <div class="barmenu">
        <?php
        if ($this->session->get('pseudo')) {
        ?>
            <li>
                <a href="../public/index.php?route=profile">Profil</a>
                <a href="../public/index.php?route=addArticle">Nouvel article</a>
                <a class="deconnect" href="../public/index.php?route=logout">Déconnexion</a>
            <?php if ($this->session->get('role') === 'admin') { ?>
                    <a href="../public/index.php?route=admin">Admin</a>
                </li>
            <?php } ?>
        <?php
        } else { ?>
            <li>
                <a href="../public/index.php?route=register">Inscription</a>
                <a href="../public/index.php?route=login">Connexion</a>
            </li>
        <?php
        } ?>
    </div>
    <div class="top">
        <h1>Mon blog</h1>
    </div>

    <?php foreach ($articles as $article) {
    ?>
        <div class="container">
            <div class="addEdit">
                <?= $this->session->show('add_article'); ?>
                <?= $this->session->show('edit_article'); ?>
                <?= $this->session->show('delete_article'); ?>
                <?= $this->session->show('add_comment'); ?>
                <?= $this->session->show('flag_comment'); ?>
                <?= $this->session->show('delete_comment'); ?>
                <?= $this->session->show('register'); ?>
                <?= $this->session->show('login'); ?>
                <?= $this->session->show('logout'); ?>
                <?= $this->session->show('delete_account'); ?>
            </div>
            <div class="articleBox">
                <div class="article">
                    <h2>
                        <a href="../public/index.php?route=article&articleId=<?=htmlspecialchars($article->getId()); ?>"><?= htmlspecialchars($article->getTitle()); ?>
                        </a>
                    </h2>
                    <p><?= htmlspecialchars($article->getContent()); ?></p>
                    <p><?= htmlspecialchars($article->getAuthor()); ?></p>
                    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt()); ?></p>
                </div>
            </div>
        </div>

        <br>
    <?php
    }
    ?>
</body>
<?php include ('footer.php') ?>
