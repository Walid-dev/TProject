<div class="dashboard_btn_box mt-2">
    <div class="dashboard_article_title"><?= $dashboardArticle['title'] ?></div>
    <?= '<img class="img-fluid mt-3 ml-2" src="data:image/jpeg;base64,' . $dashboardArticle['image'] . '" width="60" />' ?>
    <a class="btn btn-warning mt-3 ml-2" href="index.php?action=post&amp;id=<?= $dashboardArticle['id'] . "#postContainer" ?>">Lire</a>
    <a href="index.php?action=edit&amp;id=<?= $dashboardArticle['id'] . "#editPostContainer" ?>" class="btn btn-info mt-3 ml-2">Editer</a>
    <a href="" class="btn btn-danger mt-3 ml-2" data-toggle="modal" data-target="#exampleModalCenter<?= $dashboardArticle['id'] ?>">
        Supprimer article
    </a>
    <br>
    <span class="dashboard_article_date mt-2">Le <?= $dashboardArticle['creation_date_fr'] ?></span>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter<?= $dashboardArticle['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content deleteModalContent">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <a href="index.php?action=delete&amp;id=<?= $dashboardArticle['id'] ?>" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
    </div>




</div>