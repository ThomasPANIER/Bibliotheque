

<?php include "view/template/header.php"; ?>

<div class="row mb-5">

    <?php if($showUser): ?>

        <div class="col-12 col-md-6 col-lg-4 my-5 m-auto">
            <div class="card h-100">
                <div class="card-header">
                    Lecteur
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo "Prénom : " . $showUser->getPrenom() ; ?></li>
                        <li class="list-group-item"><?php echo "Nom : " . $showUser->getNom() ; ?></li>
                        <li class="list-group-item"><?php echo "Numéro de carte : " . $showUser->getCarte_numero() ; ?></li>
                        <?php if ($bookUser) : ?>
                        <li class="list-group-item"><?php echo "Livre emprunté : " . $bookUser->getTitre() ; ?></li>
                        <li class="list-group-item"><?php echo "Date de prêt : " . $bookUser->getDate_pret() ; ?></li>
                        <?php else : ?>
                                <li class="list-group-item"><?php echo "Pas d'emprunt en cours."  ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="card-footer">
            <?php if (!$bookUser) : ?>
                <form class="row justify-content-around" method="POST">
                    <input class="btn btn-primary col-5 p-1 mb-3" name="delete" type="submit" value="Supprimer le lecteur">
                    <?php if(isset($_POST["delete"])): ?>
                        <form method="POST" action="">
                            <input class="btn btn-danger col-5 p-1 mb-3" name="confirm" type="submit" value="Confirmer suppression">
                        </form>
                    <?php endif; ?>
                </form>
            <?php else : ?>
                <form class="row justify-content-around" method="POST" action="">
                    <input class="btn btn-primary col-6 p-1" name="return" type="submit" value="Rendre le livre">
                    <?php if (isset($_POST["return"])) : ?>
                        <a class="btn btn-dark text-white" href="index.php">Accueil</a>
                    <?php endif; ?>
                </form>
            <?php endif; ?>
            </div>
                
            </div>

        </div>

    <?php else : ?>
    
        <div class="alert alert-secondary text-center" role="alert">
            <?php echo $error; ?>
            <p>Pourquoi ne pas retourner a l'accueil</p>
            <a class="btn btn-dark text-white" href="index.php">Accueil</a>
        </div>

    <?php endif; ?>

</div>

<?php include "view/template/footer.php"; ?>
