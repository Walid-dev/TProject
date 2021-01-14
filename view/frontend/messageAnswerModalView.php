<button id="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Répondre à <?= $message['senderId'] ?></button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div id="messageModal" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Message à <?= $message['senderId'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php?action=sendMsg" method="post">
                    <div class="form-group">
                        <input name="recipient" value="<?= $post['author'] ?>" type="hidden" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <input name="senderId" value="<?= $_SESSION['userId'] ?>" type="hidden" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <input name="postId" value="<?= $post['id'] ?>" type="hidden" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <input name="subject" type="text" class="form-control" placeholder="Sujet" id="">
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