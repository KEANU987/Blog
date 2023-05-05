<DOCTYPE html lang="fr">

    <head>
        <?php $this->title = "Admin"; ?>
    </head>

    <?php include 'toptempadm.php'; ?>
    <div class="top">
        <h1>Espace Admin</h1>
    </div>
    <div class="bf-container">
        <div class="container">



            <table>
                <tr>
                    <th colspan="12">
                        <h2>Articles</h2>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">ID</th>
                    <th colspan="2">Nom de l'article</th>
                    <th colspan="2">Auteur</th>
                    <th colspan="2">Crée le</th>
                    <th colspan="2">Modifier</th>
                    <th colspan="2">Supprimer</th>

                </tr>
                <?php foreach ($articles as $article) { ?>
                    <tr>
                        <th colspan="2"><?= htmlspecialchars($article->getId()); ?></th>
                        <td colspan="2"><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()); ?>"><?= htmlspecialchars($article->getTitle()); ?></a></td>
                        <td colspan="2">
                            <p><?= htmlspecialchars($article->getAuthor()); ?></p>
                        </td>
                        <td colspan="2"><?= htmlspecialchars($article->getCreatedAt()); ?></td>
                        <td colspan="2">
                            <div class="edit">
                                <a href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">✅</a>
                        </td>
                        <td colspan="2">
                            <div class="del">
                                <a href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">❌</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>





            <table>
                <tr>
                    <th colspan="12">
                        <h2>Commentaires signalés</h2>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">ID</th>
                    <th colspan="2">Auteur</th>
                    <th colspan="2">Nom de l'article</th>
                    <th colspan="2">Crée le</th>
                    <th colspan="2">Enlever le signalement</th>
                    <th colspan="2">Supprimer</th>

                </tr>
                <?php
                foreach ($comments as $comment) {
                ?>
                    <tr>
                        <td colspan="2"><?= htmlspecialchars($comment->getId()); ?></td>
                        <td colspan="2"><?= htmlspecialchars($comment->getPseudo()); ?></td>
                        <td colspan="2"><?= substr(htmlspecialchars($comment->getContent()), 0, 150); ?></td>
                        <td colspan="2"><?= htmlspecialchars($comment->getCreatedAt()); ?></td>
                        <td colspan="2">
                            <div class="flag">
                                <a href="../public/index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>">🏳️</a>
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="del">
                                <a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">❌</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                    <?php
                }
                    ?>
                    </tr>
            </table>
            <table>
                <tr>
                    <th colspan="10">
                        <h2>Utilisateurs</h2>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">Id</th>
                    <th colspan="2">Pseudo</th>
                    <th colspan="2">Date</th>
                    <th colspan="2">Rôle</th>
                    <th colspan="2">Supprimer</th>
                </tr>
                <?php
                foreach ($users as $user) {
                ?>
                    <tr>
                        <td colspan="2"><?= htmlspecialchars($user->getId()); ?></td>
                        <td colspan="2"><?= htmlspecialchars($user->getPseudo()); ?></td>
                        <td colspan="2">Créé le : <?= htmlspecialchars($user->getCreatedAt()); ?></td>
                        <td colspan="2"><?= htmlspecialchars($user->getRole()); ?></td>
                        <td>
                            <?php
                            if ($user->getRole() != 'admin') {
                            ?>
                                <div class="del">
                                    <a href="../public/index.php?route=deleteUser&userId=<?= $user->getId(); ?>">❌</a>
                                </div>
                            <?php } else {
                            ?>
                                Admin
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                 <tr>
                    <td>
                    <a href="../public/index.php?route=addUser"><button>Ajouter un Utilisateur</button></a>
                    </td>
                </tr>
            </table>

        </div>
    </div>

    </body>
    <?php include('footer.php') ?>

    </html>