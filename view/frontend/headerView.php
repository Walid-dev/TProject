<nav id="navHeader">
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>

    <ul class="nav-links">
        <li id="logo_link" class=""><a href="index.php"><img class="logo" src="public/images/toronto_logo.png" width="120" alt="toronto logo"></a></li>
        <li><?= displayModal2("Connection"); ?></li>
        <li class="nav_link_box">
            <a class="nav_section_link" href="index.php#bodyTop">
                Accueil<img class="ml-2" src="public/images/home.png" alt="" />
            </a>
        </li>
        <li class="nav_link_box">
            <a class="nav_section_link" href="index.php#articlePage">
                Articles<img class="ml-2" src="public/images/blog.png" alt="" />
            </a>
        </li>
        <li class="nav_link_box">
            <a class="nav_section_link" href="index.php#addPage">
                Annonces<img class="ml-2" src="public/images/magazine.png" alt="" />
            </a>
        </li>
        <li class="nav_link_box">
            <a class="nav_section_link" href="index.php#mapPage">
                Carte<img class="ml-2" src="public/images/map.png" alt="" />
            </a>
        </li>
        <li class="nav_link_box">
            <a class="nav_section_link" href="index.php#endOfPage">
                Contacts<img class="ml-2" src="public/images/profile.png" alt="" />
            </a>
        </li>
    </ul>
</nav>



<!--Modal: Login / Register Form-->