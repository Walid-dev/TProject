<!-- Footer -->
<footer id="myFooter">
    <div class="container-fluid">
        <div class="footer_row">
            <div class="footer_row_box">
                <h5>Navigation</h5>
                <ul>
                    <li><a href="index.php#bodyTop">Accueil</a></li>
                    <li><a href="index.php#articlePage">Articles</a></li>
                    <li><a href="index.php#addPage">Annonces</a></li>
                    <li><a href="index.php#mapPage">Carte</a></li>
                    <li><a href="index.php#bodyTop">Social</a></li>
                </ul>
            </div>
            <div class="footer_row_box">
                <h5>A propos de moi</h5>
                <ul>
                    <li><a target="_blank" rel="noopener noreferrer" href="https://wh.galaxysurfing.com/">Portfolio</a></li>
                    <li><a rel="noopener noreferrer" href="public/documents/resume.pdf" download>Curriculum vitae</a></li>
                    <li><a target="_blank" rel="noopener noreferrer" href="https://www.malt.fr/profile/walidhlali">Freelance</a></li>
                    <li><a target="_blank" rel="noopener noreferrer" href="#portfolioModal4">Compétences</a></li>
                    <li><a target="_blank" rel="noopener noreferrer" href="#portfolioModal5">Site Wordpress</a></li>
                </ul>
            </div>
            <div class="footer_row_box">
                <h5>Contact</h5>
                <form id="formFooter" action="index.php" method="POST" class=".is-validated mt-3">
                    <div class="form-group d-flex mb-2">
                        <input type="text" class="form-control" id="pwd" placeholder="Nom" name="myName" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                        <input type="email" class="form-control ml-2" placeholder="Email" name="myEmail" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="uname" placeholder="Message" name="myMessage" required></textarea>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label class="form-check-label">
                            <span class="valid-feedback">Valid.</span>
                            <span class="invalid-feedback">Check this checkbox to continue.</span>
                            <button type="submit" value="Send" name="sendMail" class="btn btn-blue ml-1">Envoyer</button>
                        </label>
                    </div>
                </form>




                <!--   <form method="get" action="mailto:hlaliwalid@gmail.com">
                    <button class="btn" type="submit">Contact Mail</button>
                </form>
-->
            </div>
        </div>

        <div id="fixedBottomFooterBox">
            <ul id="socialFooterBox" class="ul-social-footer">
                <li>
                    <a target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/walid-hlali/">
                        <i class="linkedin fab fa-linkedin" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a target="_blank" rel="noopener noreferrer" href="https://github.com/Walid-dev">
                        <i class="git-hub fab fa-github" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a target="_blank" rel="noopener noreferrer" href="https://www.malt.fr/profile/walidhlali">
                        <img src="public/images/malt.png" width="31" alt="malt icon" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="twitter fab fa-twitter" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="mailto:hlaliwalid@gmail.com">
                        <img src="public/images/gmail.png" alt="mail icon" width="32" />
                    </a>
                </li>
            </ul>
            <div class="loader_box mt-3">
                <a class="nav-link" href="#bodyTop">
                    <div class="loader mx-auto">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
            <div class="footer-copyright">
                <p>© 2020 galaxysurfing.com </p>
            </div>
        </div>
    </div>

</footer>