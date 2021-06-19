
<?php include "view/template/header.php"; ?>

<div class="container-fluid">

    <section class="row justify-content-center">

        <div class="col-12 col-md-6 p-5">

            <h2 class="text-center">Enregistrer un nouveau lecteur</h2>
            
            <form class="mt-5" action="newUser.php" method="POST">
                <div class="mt-3">
                    <label class="form-label">Nom</label>
                    <input class="form-control my-3 p-3" name="nom" type="text">
                    <?php if(isset($error1)) : ?>
                        <aside class="text-danger"><?php echo $error1; ?></aside>
                    <?php endif; ?>
                </div>
                <div class="mt-3">
                    <label class="form-label">Prénom</label>
                    <input class="form-control my-3 p-3" name="prenom" type="text">
                    <?php if(isset($error2)) : ?>
                        <aside class="text-danger"><?php echo $error2; ?></aside>
                    <?php endif; ?>
                </div>
                <input class="form-control btn btn-dark text-white my-2" name="addUser" type="submit" value="Enregistrer">
            </form>

        </div>

    </section>

</div>

<?php include "view/template/footer.php"; ?>
