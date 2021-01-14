<?php ob_start(); ?>

<div class="backend_view" id="editPostSection">
    <form action="index.php?action=updateArticle&amp;id=<?= $post['id'] ?>" method="post" enctype="multipart/form-data" class="form_wrapper">
        <div class="form_wrapper_title">
            <a href="index.php" class="wrapper_btn btn btn-sm btn-info">Retour</a>
            <div class="wrapper_title">Ajouter article</div>
        </div>
        <div class="form_wrapper_inputs">
            <div class="form-group">
                <input class="form-control" placeholder="Titre" id="title" name="title" value="<?= $post['title'] ?>" required oninvalid="this.setCustomValidity('Remplir le champ svp')" oninput="setCustomValidity('')" />
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="exampleRadios1" value="1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Articles
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="exampleRadios2" value="2">
                <label class="form-check-label" for="exampleRadios2">
                    Annonces
                </label>
            </div>
            <div class="form-group">
                <?php if ($post['image'] != NULL) {
                    echo '<img class="img-fluid mt-3 ml-2" src="data:image/jpeg;base64,' . $post['image'] . '" width="180" />';
                } else {
                    echo '<img class="img-fluid mt-3 ml-2" src="public/images/toronto_logo.png" width="180" />';
                }
                ?>
                <div class="form-group">
                    <input class="mt-3" type="file" value="<?= $file ?>" name="image" id="image">
                </div>
            </div>
        </div>
        <div class="form_wrapper_tiny form-group">
            <input id="myTextArea" name="content" value="<?= $post['content'] ?>"/>
        </div>
        <div id="buttonBox" class="form_wrapper_foot">
            <button class="btn btn-info mb-5" type="submit" name="update">Sauvegarder</button>
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>