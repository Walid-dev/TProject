<div>
    <h1><?= $data['type'] ?></h1>
    <h5><?= $data['title'] ?></h5>
    <hr>
    <?= '<img class="img-fluid mb-3" src="data:image/jpeg;base64,' . $data['image'] . '" />' ?>
    <p> <?= shortArticle($data); ?></p>
    <blockquote class="blockquote mb-3 mt-2 article_author_and_date text-left">
        <footer class="blockquote-footer">Par <?= $data['author'] ?><br><cite title="Source Title"> le <?= $data['creation_date_fr'] ?></cite></footer>
    </blockquote>
    <a href="index.php?action=post&amp;id=<?= $data['id'] . "#postContainer" ?>" class="btn btn-md btn-info">Lire...</a>
</div>