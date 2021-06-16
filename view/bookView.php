
<?php include "layout/header.php"; ?>

<div class="row">

    <?php  if($book): ?>

        <div class="col-12 col-md-6 col-lg-4 my-5">
                <div class="card h-100">
                    <div class="card-header">
                        Livre
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo "Titre : " . $book->getNom() ; ?></li>
                            <li class="list-group-item"><?php echo "Auteur : " . $book->getAuteur() ; ?></li>
                            <li class="list-group-item"><?php echo "Catégorie : " . $book->getCategorie() ; ?></li>
                            <li class="list-group-item"><?php echo "Synopsis : " . $book->getSynopsis() ; ?></li>
                            <li class="list-group-item"><?php echo "Statut : " . $book->getStatut() ; ?></li>
                            <li class="list-group-item"><?php echo "Livre emprunté par : " . $book->getLecteur_id() ; ?></li>
                            <li class="list-group-item"><?php echo "Date de prêt : " . $book->getDate_pret() ; ?></li>

                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class=" row justify-content-evenly">
                            <a class="btn btn-primary col-3 p-1" href="book.php?id=<?php  ; ?>">a faire</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <form class=" row justify-content-around" method="POST">
                    <input class="btn btn-primary col-3 p-1" name="delete" type="submit" value="Supprimer">
                    <?php if(isset($_POST["delete"])): ?>
                        <form method="POST" action="">
                            <input class="btn btn-danger col-3 p-1" name="confirm" type="submit" value="Confirmer suppression">
                        </form>
                    <?php endif; ?>
                </form>
            </div>
                
            </div>

        </div>

    <?php else : ?>
    <?php endif; ?>

        <div class="alert alert-secondary text-center" role="alert">
            <?php echo $error; ?>
            <p>Pourquoi ne pas retourner a l'accueil</p>
            <a class="btn btn-dark text-white" href="index.php">Accueil</a>
        </div>

</div>

<?php include "layout/footer.php"; ?>