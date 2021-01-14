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