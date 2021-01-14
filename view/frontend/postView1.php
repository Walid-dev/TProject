<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<div id="postContainer" class="backend_view">
    <div class="img_title-box text-center mt-4 mb-3">
        <img class="" src="public/images/articles.png" width="180" alt="">
    </div>
    <div class="menuLink"></div>
    <div class="article_text">
        <div class="">
            <h3 class="text-center">
                <?= htmlspecialchars($post['title']) ?>
            </h3>
            <?php if ($post['image'] != NULL) {
                echo '<img class="img-fluid mt-3 ml-2" src="data:image/jpeg;base64,' . $post['image'] . '" width="180" />';
            } else {
                echo '<img class="img-fluid mt-3 ml-2" src="public/images/toronto_logo.png" width="180" />';
            }
            ?>
            <p>
                <?= nl2br($post['content']) ?>
            </p>
            <blockquote class="blockquote mb-3 mt-2 article_author_and_date text-left">
                <footer class="blockquote-footer">Par <?= $post['author'] ?><cite title="Source Title"> le <?= $post['creation_date_fr'] ?></cite></footer>
            </blockquote>
        </div>
    </div>



    <?= checkUserTypeToComment($post, "Se connecter pour commenter ou envoyer un message"); ?>



    <div class="flex-column col-md-10 pl-0 pr-0">
        <div class="">
        </div>
        <div id="commentBox" class="comments_box mt-5 mb-3 p-3">
            <?php
            while ($comment = $comments->fetch()) {
                ?>
                <form class="signal_form" action="" method="post">
                    <p><?= htmlspecialchars($comment['author']) ?> le <?= $comment['comment_date_fr'] ?> :</p>
                    <div class="signal_box">
                        <p class="comment_text"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                        <input type="hidden" value="<?= $comment['id'] ?>" name="commentId" />
                        <input type="hidden" value="1" name="commentStatus" />
                        <input type="hidden" value="<?= signalComment($comment) ?>" name="report" />
                        <input class="signal_btn btn btn-sm btn-warning" type="submit" name="signal" value="Signaler <?= $comment['report'] ?>">
                    </div>
                </form>

            <?php

        }

        ?>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>