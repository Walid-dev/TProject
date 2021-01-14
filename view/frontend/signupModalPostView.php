<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <div class="modal-content login_modal_content">

            <div class="modal-c-tabs">

                <ul class="nav nav-tabs border-0 md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="modal_btn nav-link active border-0 pl-3 text-white" data-toggle="tab" href="#panel7Bis" role="tab">
                            Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="modal_btn nav-link border-0 text-white" data-toggle="tab" href="#panel8BIS" role="tab">
                            Créer votre compte</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane p-4 fade in show active" id="panel7BIS" role="tabpanel">

                        <div class="modal-body mb-1">
                            <form class="form modal_form my-2 my-lg-0" action="index.php" method="post">
                                <div class="form-group text-center mt-3 text-white">
                                    <h5>Se connecter</h5>
                                    <hr class="col-1">
                                </div>
                                <div class="form-group mb-0">
                                    <input id="email2" type="email" class="form-control form-control mr-sm-2 mt-2" name="mailuid" placeholder="Username/E-mail.." required>
                                    <span class="ml-2" id='result2'></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control mr-sm-2 mt-2" type="password" name="pwd" placeholder="Password">
                                </div>
                                <button id="validate2" class="btn btn-md btn-info mt-3" type="submit" name="login-submit">Connection</button>
                            </form>
                        </div>
                        <div class="modal-footer login_modal_footer">
                            <button type="button" class="up btn btn-md btn-danger" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>

                    <div class="tab-pane p-4 fade" id="panel8Bis" role="tabpanel">

                        <div class="modal-body">
                            <form class="modal_form" action="index.php" method="post">
                                <div class="form-group text-center mt-3 text-white">
                                    <h5>Créer votre compte</h5>
                                    <hr class="col-1">
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <input type="text" class="form-control form-control mr-sm-2 mt-2" name="uid" placeholder="Pseudo">
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <input id="emailBis" type="email" class="form-control form-control mr-sm-2 mt-2" name="mail" placeholder="E-mail">
                                    <span class="ml-2" id='result'></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control mr-sm-2 mt-2" type="password" name="pwd" placeholder="Mot de passe">
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control mr-sm-2 mt-2" type="password" name="pwd-repeat" placeholder="Répeter Mot de passe">
                                </div>
                                <div class="form-group">
                                    <button id="validate" type="submit" class="btn btn-info mt-3" name="signup-submit">Créer</button>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>



<button id="logInCommentForm" class="up btn btn-md btn-info" data-toggle="modal" data-backdrop="false" data-target="#modalLRForm"><?= $text ?></button>