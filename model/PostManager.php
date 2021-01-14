<?php
class PostManager extends Manager
{
    public function getPosts($addOrArticle)
    {
        $db = Manager::dbConnect();



        $req = $db->prepare('SELECT id, type FROM posts WHERE type=' . $addOrArticle . '');
        $req->execute(array($addOrArticle));
        $articlesCount = $req->rowCount($db);

        $perPage = 12;
        $cPage = 1;
        $nbPages = ceil($articlesCount / $perPage);

        if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) {
            $cPage = $_GET['p'];
        } else {
            $cPage = 1;
        }


        $req = $db->prepare('SELECT id, title, content, author, idUser, image, type, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin\') AS creation_date_fr FROM posts WHERE type=' . $addOrArticle . ' ORDER BY creation_date DESC LIMIT ' . (($cPage - 1) * $perPage) . ', ' . $perPage . ' ');
        $req->execute(array('idUser'));
        return $req;
    }

    public function pagination($addOrArticle)
    {
        $db = Manager::dbConnect();


        $req = $db->prepare('SELECT id, type FROM posts WHERE type=' . $addOrArticle . ' ');
        $req->execute(array($addOrArticle));
        $articlesCount = $req->rowCount($db);

        $perPage = 12;
        $cPage = 1;
        $nbPages = ceil($articlesCount / $perPage);

        if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) {
            $cPage = $_GET['p'];
        } else {
            $cPage = 1;
        }

        //  $req = $db->query('SELECT id, title, content, author, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT ' . (($cPage - 1) * $perPage) . ', ' . $perPage . ' ');


        for ($i = 1; $i <= $nbPages; $i++) {
            if ($i == $cPage) {
                echo "<span>$i</span>";
            } else {
                echo " <a href=\"index.php?p=$i#articleSection$addOrArticle\">$i</a>";
            }
            // echo '<script type="text/javascript">window.onload = function() { document.getElementById("content").innerHTML = "' . $pagination . '"; }</script>';
        }

        return $req;
    }


    public function getPost($postId)
    {
        $db = Manager::dbConnect();
        $req = $db->prepare('SELECT id, title, content, author, image, type, idUser, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }



    public function addArticle()
    {
        require('view/backend/addPostView.php');
    }


    public function postArticle($author, $title, $content, $idUser, $file, $type)
    {
        $db = Manager::dbConnect();

        $article = $db->prepare('INSERT INTO posts(author, title, content, idUser, image, type, creation_date) VALUES(?, ?, ?, ?, ?, ?, NOW())');
        $article->execute(array($author, $title, $content, $idUser, $file, $type));
    }



    public function deleteFromDataBase($id)
    {
        $db = Manager::dbConnect();
        $deleteArticle = $db->prepare("DELETE FROM posts WHERE id=$id");
        $deleteArticle->execute(array($id));
        //  $db->query("DELETE FROM comments WHERE post_id=$id");
    }

    public function updatePost($id, $title, $content, $file, $type)
    {
        $db = Manager::dbConnect();
        $updateArticle = $db->prepare("UPDATE posts SET title='$title', content='$content', image='$file', type='$type' WHERE id='$id'");
        $updateArticle->execute(array($id, $title, $content, $file, $type));
    }

    public function updatePostWithoutImg($id, $title, $content, $type)
    {
        $db = Manager::dbConnect();
        $updateArticle = $db->prepare("UPDATE posts SET title='$title', content='$content', type='$type' WHERE id='$id'");
        $updateArticle->execute(array($id, $title, $content, $type));
    }

    public function dashboard()
    {
        $db = Manager::dbConnect();

        $cPage = 1;
        $perPage = 30;
        $idUser = $_SESSION['userId'];
        $req = $db->prepare('SELECT id, title, content, author, idUser, image, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin\') AS creation_date_fr FROM posts WHERE idUser=' . $idUser . ' ORDER BY creation_date DESC LIMIT ' . (($cPage - 1) * $perPage) . ', ' . $perPage . ' ');
        $req->execute(array('idUser'));
        return $req;
    }

    public function getPpImg($idUser)
    {
        $db = Manager::dbConnect();
        $req = $db->prepare('SELECT pp_image FROM users WHERE idUsers=' . $idUser . ' ');
        $req->execute(array('idUsers'));

        return $req;
    }
}
