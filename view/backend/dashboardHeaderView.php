    <?php while ($getImg = $getPpImg->fetch()) {
        ?>
       
            <?php if ($getImg['pp_image'] != NULL) {
                echo '<img alt="user image" class="ppImg" src="data:image/jpeg;base64,' . $getImg['pp_image'] . '" />';
            } else {
                echo '<img alt="user image" class="ppImg" src="public/images/blank-avatar.png" width="150" />';
            }
            ?>
                   
    <?php }
$getPpImg->closeCursor();
?>