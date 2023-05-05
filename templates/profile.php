

<head>
</head>

<body>
     <?php include 'toptemp.php';?>
     <div class="top">
          <h1>Mon Profil</h1>
     </div>
          <div class="container">
               <div class="articleBox">
                    <div class="article">
                    </div><?php $this->title = 'Mon profil'; ?>
                    <?= $this->session->show('update_password'); ?>
                    <div>
                         <h2><?= $this->session->get('pseudo'); ?></h2>
                         <a href="../public/index.php?route=updatePassword">Modifier mon mot de passe</a>
                         <br>
                         <div class="del">
                         <a href="../public/index.php?route=deleteAccount">Supprimer mon compte</a>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</body>

