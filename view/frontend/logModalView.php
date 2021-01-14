    <div id="dropdownNavbar" class="dropdown">
        <a id="menuLink" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu
            <img class="order-2 ml-2" src="public/images/menu.png" width="21" alt="menu icon">
        </a>
        <ul class="dropdown-menu">
            <li class="nav_link_box">
                <a class="nav_section_link d-flex align-items-center" href="index.php?action=dashboard">
                    <img class="m-2" src="public/images/dashboard.png" alt="Dashboard icon" width="21" />Tableau de bord
                </a>
            </li>
            <li class="nav_link_box">
                <a class="nav_section_link d-flex align-items-center" href="index.php?action=getMessage">
                    <img class="m-2" src="public/images/mailbox.png" alt="Messagerie icon" width="21" />Messagerie
                </a>
            </li>
            <li class="nav_link_box">
                <a class="nav_section_link d-flex align-items-center" href="index.php?action=addPost">
                    <img class="m-2" src="public/images/add.png" alt="ajouter icon" width="21" />Ajouter
                </a>
            </li>
            <li class="nav_link_box">
                <form id="logoutForm" class="form" action="index.php" method="post">
                    <button class="dropdown-item logout-btn" type="submit" name="logout-submit"><img class="mr-2" src="public/images/logout.png" width="20" alt="map icon">Logout</button>
                </form>
            </li>
        </ul>
    </div>