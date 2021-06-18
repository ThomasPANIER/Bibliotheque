
<?php include "view/template/header.php"; ?>

<div class="container-fluid">

    <section class="row justify-content-center">

        <div class="col-12 col-md-6 p-5">

            <h2 class="text-center">Enregistrer un nouveau livre</h2>
            
            <form class="mt-5" action="newBook.php" method="POST">
                <div class="mt-3">
                    <label class="form-label">Nom</label>
                    <input class="form-control my-3 p-3" name="nom" type="text">
                    <?php if(isset($error1)) : ?>
                        <aside class="text-danger"><?php echo $error1; ?></aside>
                    <?php endif; ?>
                </div>
                <div class="mt-3">
                    <label class="form-label">Auteur</label>
                    <input class="form-control my-3 p-3" name="auteur" type="text">
                    <?php if(isset($error2)) : ?>
                        <aside class="text-danger"><?php echo $error2; ?></aside>
                    <?php endif; ?>
                </div>
                <div class="mt-3">
                    <label class="form-label">Catégorie</label>
                    <input class="form-control my-3 p-3" name="categorie" type="text">
                    <?php if(isset($error3)) : ?>
                        <aside class="text-danger"><?php echo $error3; ?></aside>
                    <?php endif; ?>
                </div>
                <div class="mt-3">
                    <label class="form-label">Synopsis</label>
                    <input class="form-control my-3 p-3" name="synopsis" type="text">
                    <?php if(isset($error4)) : ?>
                        <aside class="text-danger"><?php echo $error4; ?></aside>
                    <?php endif; ?>
                </div>
                <input class="form-control btn btn-dark text-white my-2" name="addBook" type="submit" value="Enregistrer">
            </form>

        </div>

    </section>

</div>

<?php include "view/template/footer.php"; ?>
