<?php ob_start(); ?>

<div id="addPostSection">
    <div class="backend_view">
        <form action="index.php?action=updateArticle&amp;id=<?= $post['id'] ?>" method="post" enctype="multipart/form-data" class="form_wrapper">
            <div class="form_wrapper_title">
                <a href="index.php" class="wrapper_btn btn btn-sm btn-info">Retour</a>
                <div class="wrapper_title">Ajouter article</div>
            </div>
            <div class="form_wrapper_inputs">
                <input type="hidden" name="idUser" value="<?= $_SESSION['userId'] ?>" />
                <div class="form-group">
                    <input class="form-control" type="hidden" id="author" name="author" value="<?= $post['author'] ?>">
                </div>
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
                        <input class="mt-3" type="file" name="image" id="image">
                    </div>
                    <div class="form-group mt-3 ml-2">
                        <p id="warningTextEditPost">Pour mettre à jour le contenu correctement, veuillez vous assurer de ne pas laisser le curseur dans un des champs avant la validation.</p>                
                    </div>
                </div>
            </div>
            <div class="form_wrapper_tiny form-group">
                <textarea id="myTextArea" name="content"><?= $post['content'] ?></textarea>
            </div>
            <div id="buttonBox" class="form_wrapper_foot">
                <button class="btn btn-info mb-5" type="submit" name="update">Sauvegarder</button>
            </div>
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>