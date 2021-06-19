

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
                            <?php if (!$book->getStatut()) : ?>
                                <li class="list-group-item text-danger"><?php echo "Disponibilité : Non disponible"  ?></li>
                            <?php else : ?>
                                <li class="list-group-item text-success"><?php echo "Disponibilité : Disponible"  ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class=" row justify-content-evenly">
                            
                            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop?id=<?php echo $book->getId() ; ?>" href="#staticBackdrop?id=<?php echo $book->getId() ; ?>">test</a>
                            <a class="btn btn-primary col-3 p-1" href="singleBook.php?id=<?php echo $book->getId() ; ?>">Voir</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
            <!-- modal -->
            <?php if($showBook): ?>
            <div class="modal fade" id="staticBackdrop?id" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Livre</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                            <div class=" row justify-content-evenly">
                                <a class="btn btn-primary col-3 p-1" href="book.php?id=<?php  ; ?>">a faire</a>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        
        
    </div>

</main>

<?php include "view/template/footer.php"; ?>
