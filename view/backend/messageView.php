<?php ob_start(); ?>
<div id="messageSection" class="backend_view container">
    <h4 class="text-center pt-5 pb-2">Bonjour <?= $_SESSION['userUid'] . " !" ?></h4>
    <div class="message_wrapper">
        <?php
        $numOfMsg = $messages->rowCount();

        if ($numOfMsg > 0) { } else {
            echo '<div class="empty_text">Vous n\'avez aucun Message</div>';
        }
        ?>
        <?php
        while ($message = $messages->fetch()) {
            ?>
            <div class="message_container">
                <div class="message_box">
                    <div class="sender_box_msg">Expéditeur: <?= strip_tags($message['sender']) ?></div>
                    <div class="subject_box_msg">Sujet: <?= strip_tags($message['subject']) ?></div>
                    <div class="date_box_msg"><?= strip_tags($message['date']) ?></div>
                    <div id="msgShortenedAndModalBox">
                        <?= strip_tags($message['content']) ?>
                    </div>
                </div>
                <div class="message_list_btn_box">
                    <a class="btn btn-pink mr-3 readMoreMsg">Lire Plus..</a>
                    <?php
                    if ($message['sender'] != $_SESSION['userUid']) : ?>
                        <button id="" type="button" class="btn btn_answer_msg btn-blue" data-toggle="modal" data-target="#exampleModal">Répondre à <?= $message['sender'] ?></button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div id="messageModal" class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Message à <?= $message['sender'] ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="index.php?action=sendMsg" method="post">
                                            <div class="form-group">
                                                <input name="recipient" value="<?= $message['sender'] ?>" type="hidden" class="form-control" id="">
                                            </div>
                                            <div class="form-group">
                                                <input name="senderId" value="<?= base64_encode($_SESSION['userUid']) ?>" type="hidden" class="form-control" id="">
                                            </div>
                                            <div class="form-group">
                                                <input name="postId" value="<?= $message['postId'] ?>" type="hidden" class="form-control" id="">
                                            </div>
                                            <div class="form-group">
                                                <input name="subject" type="text" class="form-control" placeholder="<?= "Re: " . $message['subject'] ?>" id="">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" name="content" id="message-text" placeholder="Message"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info" name="sendMsg">Envoyer</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>
                </div>
            </div>

        <?php
    }

    $messages->closeCursor();
    ?>
    </div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/templateSoft.php'); ?>