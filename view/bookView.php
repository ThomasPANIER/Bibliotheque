
<?php include "view/template/header.php"; ?>

<div class="row">

    <?php if($showBook): ?>

        <div class="col-12 col-md-6 col-lg-4 my-5 m-auto">
                <div class="card h-100">
                    <div class="card-header">
                        Livre
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo "Titre : " . $showBook->getNom() ; ?></li>
                            <li class="list-group-item"><?php echo "Auteur : " . $showBook->getAuteur() ; ?></li>
                            <li class="list-group-item"><?php echo "Catégorie : " . $showBook->getCategorie() ; ?></li>
                            <li class="text-justify list-group-item"><?php echo "Synopsis : " . $showBook->getSynopsis() ; ?></li>
                            <li class="list-group-item"><?php echo "Statut : " . $showBook->getStatut() ; ?></li>
                            <li class="list-group-item"><?php echo "Livre emprunté par : " . $showBook->getLecteur_id() ; ?></li>
                            <li class="list-group-item"><?php echo "Date de prêt : " . $showBook->getDate_pret() ; ?></li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-around">
                            <?php if (!$showBook->getStatut()) : ?>
                            <form class="row justify-content-around" method="POST" action="">
                                <input class="btn btn-primary col-6 p-1" name="return" type="submit" value="Rendre le livre">
                            </form>
                            <?php endif; ?>
                            <?php if ($showBook->getStatut()) : ?>
                            <form class="row justify-content-around" method="POST" action="">
                                <input class="btn btn-primary col-6 p-1" name="rent" type="submit" value="Emprunter le livre">
                            </form>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <form class=" row justify-content-around" method="POST">
                    <input class="btn btn-primary col-3 p-1" name="delete" type="submit" value="Supprimer du catalogue">
                    <?php if(isset($_POST["delete"])): ?>
                    
                        <?php if ($showBook->getStatut()) : ?>
                            <form method="POST" action="">
                                <input class="btn btn-danger col-3 p-1" name="confirm" type="submit" value="Confirmer suppression">
                            </form>
                        <?php else : ?>
                                <li class="list-group-item text-center text-danger"><?php echo "Le livre doit être rendu pour être supprimé."  ?></li>
                        <?php endif; ?>

                    <?php endif; ?>
                </form>
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