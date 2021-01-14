<?php

class LoginSystemManager extends Manager
{
    public function addUser()
    {
        $db = Manager::dbConnect();
        $username = strip_tags($_POST['uid']);
        $email = strip_tags($_POST['mail']);
        $password = strip_tags($_POST['pwd']);
        $passwordRepeat = strip_tags($_POST['pwd-repeat']);


        if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
            header("Location: index.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: index.php?error=invalidmailuid=");
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: index.php?error=invalidmail&uid=" . $username);
        } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: index.php?error=invaliduid&mail=" . $email);
        } elseif ($password !== $passwordRepeat) {
            header("Location: index.php?error=passwordcheck&uid=" . $username . "&mail=" . $email);
        } else {

            $request = $db->prepare("SELECT emailUsers FROM users WHERE emailUsers=?");
            $request->execute(array($email));

            $request2 = $db->prepare("SELECT uidUsers FROM users WHERE uidUsers=?");
            $request2->execute(array($username));


            $emailCheck =  $request->rowCount();
            $usernameCheck = $request2->rowCount();

            if ($emailCheck > 0) {
                header("Location: index.php?error=emailtaken&mail= . $email");
                exit();
            } elseif ($usernameCheck > 0) {
                header("Location: index.php?error=usertaken&username= . $username");
            } else {

                $hachedPwd = password_hash($password, PASSWORD_DEFAULT);

                $request = $db->prepare('INSERT INTO users (uidUsers , emailUsers, pwdUsers, type) VALUE (?, ?, ?, 1) ');
                $request->execute(array($username, $email, $hachedPwd));

                header("Location: index.php?useradded");
            }
        }
    }


    public function login()
    {
        $db = Manager::dbConnect();

        $mailuid = $_POST['mailuid'];
        $password = $_POST['pwd'];

        if (empty($mailuid) || empty($password)) {
            header("Location: index.php?error=emptyfields");
            exit();
        } else {

            sleep(1);

            $stmt = $db->prepare("SELECT * FROM users WHERE emailUsers=?");
            $stmt->execute([$mailuid]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['pwdUsers'])) {
                session_start();
                $_SESSION['userId'] = $user['idUsers'];
                $_SESSION['userUid'] = $user['uidUsers'];
                $_SESSION['usertype'] = $user['type'];

                header("Location: index.php?login=success");
            } else {
                header("Location: index.php?error=wrongpwd");
            }
        }
    }


    function resize_image2($file, $max_resolution)
    {
        if (file_exists($file)) {
            $original_image = imagecreatefromjpeg($file);

            // Resolution
            $original_width = imagesx($original_image);
            $original_height = imagesy($original_image);
            // Try to check the width first
            $ratio = $max_resolution / $original_width;
            $new_width = $max_resolution;
            $new_height = $original_height * $ratio;
            // If that didn't work
            if ($new_height > $max_resolution) {
                $ratio = $max_resolution / $original_height;
                $new_height = $max_resolution;
                $new_width = $original_width * $ratio;
            }

            if ($original_image) {
                $new_image = imagecreatetruecolor($new_width, $new_height);
                imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
                imagejpeg($new_image, $file, 90);
            }
        }
        move_uploaded_file($_FILES["image"]["tmp_name"], $_FILES["image"]["name"]);
        $ppImg = $_FILES["image"]["name"];
        resize_image($ppImg, "500");
    }



    public function resize_image($file, $max_resolution)
    {

        if (file_exists($file)) {
            ini_set('memory_limit', '-1');
            $original_image = imagecreatefromjpeg($file);

            // Resolution
            $original_width = imagesx($original_image);
            $original_height = imagesy($original_image);
            // Try to check the width first
            $ratio = $max_resolution / $original_width;
            $new_width = $max_resolution;
            $new_height = $original_height * $ratio;
            // If that didn't work
            if ($new_height > $max_resolution) {
                $ratio = $max_resolution / $original_height;
                $new_height = $max_resolution;
                $new_width = $original_width * $ratio;
            }

            if ($original_image) {
                $new_image = imagecreatetruecolor($new_width, $new_height);
                imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
                imagejpeg($new_image, $file, 90);
            }
        } else{
            $_SESSION['message'] = "L'image n'est pas au format jpg";
            $_SESSION['msg_type'] = "danger";
        }
        return $file;
    }

    public function addPpImage($idUser)
    {
        $db = Manager::dbConnect();


        $ppImg = addslashes($_FILES["image"]["tmp_name"]);


        $resizeImg = LoginSystemManager::resize_image($ppImg, "300");

        $ppImg = file_get_contents($ppImg);
        $ppImg = base64_encode($ppImg);
        $ppImgSize = strlen($ppImg);


        $addPpImage = $db->prepare("UPDATE users SET pp_image='$ppImg' WHERE idUsers='$idUser'");
        $addPpImage->execute(array($ppImg, $idUser));



        $_SESSION['message'] = "Image ajoutée.";
        $_SESSION['msg_type'] = "danger";
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }
}
