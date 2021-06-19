
<?php include "view/template/header.php"; ?>

<main class="container-fluid my-5">

    <h2 class="text-center">Lecteurs enregistrés</h2>

    <div class="row ">
        <?php foreach($showUsers as $index => $user) : ?>

            <div class="col-12 col-md-6 col-lg-4 my-5">
                <div class="card h-100">
                    <div class="card-header">
                        Lecteur
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo "Prénom : " . $user->getPrenom() ; ?></li>
                            <li class="list-group-item"><?php echo "Nom : " . $user->getNom() ; ?></li>
                            <li class="list-group-item"><?php echo "Carte numéro : " . $user->getCarte_numero() ; ?></li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class=" row justify-content-evenly">
                            <a class="btn btn-primary col-3 p-1" href="singleUser.php?id=<?php echo $user->getId() ; ?>">Consulter</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        
    </div>

</main>

<?php include "view/template/footer.php"; ?>

