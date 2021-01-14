<?php
session_start();
require('controller/frontendController.php');

try {
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
            throw new Exception('Tous les champs ne sont pas remplis.');
        } elseif ($_GET['error'] == "invaliduidmail") {
            throw new Exception('Email ou pseudo invalide.');
        } elseif ($_GET['error'] == "invaliduid") {
            throw new Exception('Email ou pseudo invalide.');
        } elseif ($_GET['error'] == "invalidmail") {
            throw new Exception('Email invalide.');
        } elseif ($_GET['error'] == "passwordcheck") {
            throw new Exception('Les mots de passe ne se correspondent pas.');
        } elseif ($_GET['error'] == "usertaken") {
            throw new Exception('Pseudo déja pris.');
        } elseif ($_GET['error'] == "emailtaken") {
            throw new Exception('Email déja pris.');
        } elseif ($_GET['error'] == "wrongpwd") {
            throw new Exception('Mot de passe incorrect');
        }
    }
    if (isset($_POST['ajaxMethod'])) {
        if ($_POST['ajaxMethod'] == "send-event") {
            sayHi2($_POST['eventLat'], $_POST['eventLon'], $_POST['eventPlace'], $_POST['eventTime'], $_POST['eventDate'], $_POST['eventDesc'], $_POST['ajaxMethod']);
            postEvent(strip_tags($_SESSION['userUid']), strip_tags($_POST['eventName']), strip_tags($_POST['eventPlace']), strip_tags($_POST['eventLat']), strip_tags($_POST['eventLon']), strip_tags($_POST['eventDate']), strip_tags($_POST['eventDesc']), $_POST['eventTime']);
        }
    } elseif (isset($_POST['ajaxSuscribeMethod'])) {

        if ($_POST['ajaxSuscribeMethod'] == "suscribe-event") {
            suscribeEvent(strip_tags($_POST['eventId']), strip_tags($_SESSION['userUid']));
        }
    } elseif (isset($_POST['login-submit'])) {
        login();
    } elseif (isset($_POST['post'])) {

        if (isset($_FILES['image']) && $_FILES['image']['type'] == 'image/jpeg') {
            move_uploaded_file($_FILES['image']['tmp_name'], $_FILES['image']['name']);
            $file = $_FILES['image']['name'];
            resize_image($file, '75');

            echo "<img src='$file'/>";
        }
    } elseif (isset($_POST['signup-submit'])) {
        addUser();
    } elseif (isset($_POST['logout-submit'])) {
        logout();
        throw new Exception('Vous etes maintenant déconnecté.');
    } elseif (isset($_POST['sendMail'])) {
        sendMail();
        suscribeEvent(100, "Layaaaa");
    } elseif (isset($_POST['action']) && !empty($_POST['action'])) {
        if ($_POST['action'] == 'display-event-div') {
            displayEventDiv();
        } elseif ($_POST['action'] == 'save-suscribe-event-div') {
            displaySuscribeEventPage();
        } elseif ($_POST['action'] == 'save-event') {
            postEvent(strip_tags($_SESSION['userUid']), strip_tags($_POST['eventName']), strip_tags($_POST['eventPlace']), strip_tags($_POST['eventLat']), strip_tags($_POST['eventLon']), strip_tags($_POST['eventDate']), strip_tags($_POST['eventDate']), "19:30:00");
        }
    } elseif (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], strip_tags($_POST['author']), strip_tags($_POST['comment']));
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis.');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif (isset($_SESSION['userId'])) {
            if ($_SESSION['usertype'] == 1 || $_SESSION['usertype'] == 2) {
                if (isset($_POST['save'])) {
                    if (
                        !empty($_FILES['image']['tmp_name'])
                        && file_exists($_FILES['image']['tmp_name'])
                    ) {
                        $file = addslashes($_FILES["image"]["tmp_name"]);
                        $file = file_get_contents($file);
                        $file = base64_encode($file);
                        $fileSize = strlen($file);

                        postArticle(strip_tags($_POST['author']), strip_tags($_POST['title']), strip_tags($_POST['content']), strip_tags($_POST['idUser']), strip_tags($file), strip_tags($_POST['type']));
                    } else {
                        //  postArticle(strip_tags($_POST['author']), strip_tags($_POST['title']), strip_tags($_POST['content']), strip_tags($_POST['idUser']), NULL, strip_tags($_POST['type']));
                    }
                } elseif (isset($_POST['update'])) {
                    $file = addslashes($_FILES["image"]["tmp_name"]);
                    $file = file_get_contents($file);
                    $file = base64_encode($file);
                    $fileSize = strlen($file);

                    if ($fileSize > 0) {
                        updateArticle($_GET['id'], strip_tags($_POST['title']), strip_tags($_POST['content']), $file, strip_tags($_POST['type']));
                    } else {
                        updateArticleWithoutImg($_GET['id'], strip_tags($_POST['title']), strip_tags($_POST['content']), strip_tags($_POST['type']));
                    }
                } elseif (isset($_POST['savePpImg'])) {
                    addPpImage($_SESSION['userId']);
                }
                if ($_GET['action'] == 'addPost') {
                    addPost();
                } elseif ($_GET['action'] == 'delete') {
                    deleteArticle($_GET['id']);
                } elseif ($_GET['action'] == 'getMessage') {
                    getMessage();
                } elseif ($_GET['action'] == 'edit') {
                    editArticle();
                } elseif ($_GET['action'] == 'dashboard') {
                    dashboard();
                } elseif ($_GET['action'] == 'sendMsg') {
                    sendMessage(strip_tags($_POST['postId']), base64_decode($_POST['senderId']), strip_tags($_POST['recipient']), strip_tags($_POST['subject']), strip_tags($_POST['content']));
                }
            } else {
                throw new Exception('Page reservée aux administrateurs');
            }
        } else {
            throw new Exception('Page reservée aux administrateurs');
        }
    } else {
        home();
    }
} catch (Exception $e) {
    $_SESSION['msg_type'] = "danger";
    $_SESSION['message'] = $e->getMessage();
    home();
    die;
}
