

<?php include "view/template/header.php"; ?>

<main class="container-fluid my-5">

    <h2 class="text-center">Livres catalogue</h2>

    <div class="row ">
        <?php foreach($showBooks as $index => $book) : ?>

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
                            <a class="btn btn-primary col-3 p-1" href="book.php?id=<?php echo $book->getId() ; ?>">Voir</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        
    </div>

</main>

<?php include "view/template/footer.php"; ?>
