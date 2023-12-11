<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        <img src="assets/images/logo-v3.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="index.php"
                                class="<?php if(isset($index)) echo "active" ?>">Accueil</a></li>
                        <li class="scroll-to-section"><a href="progress.php">suivre Ã l'avance</a></li>

                        <li class="scroll-to-section"><a href="index.php">Services</a></li>
                        <?php
                        if (isset($_SESSION['id_user'])) {
                        ?>
                        <li class="scroll-to-section"><a href="cours.php"
                                class="<?php if(isset($cours)) echo "active" ?>">Cours</a></li>
                        <li class="scroll-to-section"><a href="quizze.php"
                                class="<?php if(isset($quizz)) echo "active" ?>">Quizzes</a></li>

                        <?php } ?>
                        <li class="scroll-to-section"><a href="index.php">Contact</a></li>
                        <?php
                        if (isset($_SESSION['id_user'])) {
                        ?>
                        <li class="scroll-to-section">
                            <div class="border-first-button"><a href="../admin/scripte.php?log_out=ok">Deconexion</a>
                            </div>
                        </li>
                        <?php } else {
                        ?>
                        <li class="scroll-to-section">
                            <div class="border-first-button"><a href="../admin/login.php">Connexion</a></div>
                        </li>
                        <?php
                        } ?>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>