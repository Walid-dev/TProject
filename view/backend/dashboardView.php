<?php ob_start(); ?>
<div class="backend_view">
    <div class="container">
        <div class="img_title-box text-center">
            <img class="mt-5 mb-3" src="public/images/dashboard.png" width="155" alt="">
        </div>
        <div id="dashboardHeaderBox">
            <form method="post" action="" class="text-center" enctype="multipart/form-data">
                <label class="dashboard_img" for="image">
                    <input type="file" name="image" id="image" style="display:none;" />
                    <?= getPpImg($_SESSION['userId']); ?>
                    <input id="savePpBtn" class="btn btn-yellow mt-2" type="submit" name="savePpImg" value="Modifier">
                </label>
            </form>

            <div>

            </div>
        </div>

        <div class="dashboard_article_list">
            <?php
            $num = $dashboardArticles->rowCount();

            if ($num > 0) { } else {
                echo '<div class="empty_text">Vous n\'avez aucun Article</div>';
            }
            ?>
            <?php while ($dashboardArticle = $dashboardArticles->fetch()) {
                ?>
                <?php $_SESSION['dashboardUserCheck'] = $dashboardArticle['idUser']; ?>
                <div class="dashboard_box">
                    <?= '<img class="dashboard_article_img" src="data:image/jpeg;base64,' . $dashboardArticle['image'] . '" />' ?>
                    <span class="dashboard_article_title"><?= shortenContent(strip_tags($dashboardArticle['title']), 50)  ?></span>
                    <span class="dashboard_article_date">Le <?= $dashboardArticle['creation_date_fr'] ?></span>
                    <div class="dashboard_btn_box">
                        <a class="btn btn-blue mt-1" href="index.php?action=post&amp;id=<?= $dashboardArticle['id'] . "#postContainer" ?>">Lire</a>
                        <a class="btn btn-pink mt-1" href="index.php?action=edit&amp;id=<?= $dashboardArticle['id'] . "#editPostContainer" ?>">Editer</a>
                        <a class="btn btn-yellow mt-1" href="" data-toggle="modal" data-target="#exampleModalCenter<?= strip_tags($dashboardArticle['id']) ?>">
                            Supprimer
                        </a>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter<?= $dashboardArticle['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div id="modalDelete" class="modal-content deleteModalContent">
                                <div class="modal-header">
                                    <h5 class="modal-title">Supprimer article</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>L'article est sur le point d'etre définitivement supprimer.<br>Confirmer la suppression ?</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info" data-dismiss="modal">Annuler</button>
                                    <a href="index.php?action=delete&amp;id=<?= $dashboardArticle['id'] ?>" class="btn btn-danger">Supprimer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }

        $dashboardArticles->closeCursor();
        ?>


        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>