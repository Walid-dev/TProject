<div id="dropdownSmallScreen" class="dropdown">
    <a id="menuLink2" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="order-2 ml-2" src="public/images/menu.png" width="25" alt="menu icon">
    </a>
    <ul class="dropdown-menu">
        <li class="nav_link_box">
            <a class="nav_section_link d-flex align-items-center" href="index.php?action=dashboard">
                <img class="m-2" src="public/images/house.png" alt="dashboard icon" width="20" />Tableau de bord
            </a>
        </li>
        <li class="nav_link_box">
            <a class="nav_section_link d-flex align-items-center" href="index.php?action=getMessage">
                <img class="m-2" src="public/images/admin.png" alt="message icon" width="20" />Messagerie
            </a>
        </li>
        <li class="nav_link_box">
            <a class="nav_section_link d-flex align-items-center" href="index.php?action=addPost">
                <img class="m-2" src="public/images/add-file.png" alt="add icon" width="20" />Ajouter
            </a>
        </li>
        <li>
            <form class="form" action="index.php" method="post">
                <button class="dropdown-item logout-btn" type="submit" name="logout-submit"><img class="mr-2" src="public/images/logout.png" width="20" alt="map icon">Logout</button>
            </form>
        </li>
    </ul>
</div>