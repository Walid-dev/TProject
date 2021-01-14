<div id="addSection1" class="section_h1_titles">
    <img id="annonceImg" class="img-fluid text-center" src="public/images/annon.png" width="140" alt="">
    <hr class="hr_title mb-1">
    <h4 class="text-center title_text pt-3 pb-2">N'hésitez pas à poster des annonces, recherches..<br>
        Connectez vous ou crée un compte en quelques secondes pour avoir accès à votre interface administrateur et ajouter, modifier, supprimer vos annonces ou gérer vos messages.</h4>
</div>
<div id="pagination2" class="pagination pagination_hide_add text-black text-center"><?= paginationArticles() ?><a class="pagination_slide_add btn-blue">Lire Plus</a></div>
<div class="article_wrapper">
    <?php
    while ($data = $posts->fetch()) {
        ?>
        <div class="article_box">
            <div class="article_img_box">
                <?php if ($data['image'] != NULL) {
                    echo '<img alt="image add" class="article_img" src="data:image/jpeg;base64,' . $data['image'] . '" />';
                } else {
                    echo '<img alt="image add" class="article_img" src="public/images/toronto_logo.png" />';
                }
                ?>
            </div>
            <div class="article_content">
                <h5 class="mt-2 pl-2"><?= $data['title'] ?></h5>
                <p class="pt-2 pl-2"> <?= shortArticle($data); ?></p>
                <blockquote class="d-flex blockquote align-items-center article_author_and_date text-left">
                    <div class="image_square ml-1">
                        <?= getPpImg($data['idUser']) ?>
                    </div>

                    <footer class="article_footer blockquote-footer ml-3">Par <?= $data['author'] ?><br><cite title="Source Title"> le <?= $data['creation_date_fr'] ?></cite></footer>
                </blockquote>
                <a href="index.php?action=post&amp;id=<?= $data["id"] . "#postContainer" ?>" class="btn btn-pink mt-2 ml-1 mb-2 align-self-start">Lire...</a>
            </div>
        </div>
    <?php
}
$posts->closeCursor();
?>