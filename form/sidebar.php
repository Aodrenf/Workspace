<!-- La sidebar du workspace -->
<div style="display: <?php echo $status_sidebar2 ?> "class="sidebar">
            <a href="<?php echo $link ?>" class="active">
                    <span class="material-symbols-sharp">dashboard</span>
                    <h4>Accueil</h4>
                </a>
                </div>
            <div style="display: <?php echo $status_sidebar ?>;" class="sidebar">
                <a href="<?php echo $link ?>" class="<?php echo $status_welcome ?>">
                    <span class="material-symbols-sharp">dashboard</span>
                    <h4>Accueil</h4>
                </a>
                <a class="<?php echo $status_admin ?>" style="display: <?php echo $status_sidebar_admin ?> ;" href="<?php echo $link3 ?>">
                    <span class="material-symbols-sharp">admin_panel_settings</span>
                    <h4>Administrateurs</h4>
                </a>
                <a class="<?php echo $status_user ?>" href="<?php echo $link2 ?>">
                    <span class="material-symbols-sharp">supervisor_account</span>
                    <h4>Utilisateurs</h4>
                </a>
            </div>
            <div class="account">
                <span class="material-symbols-sharp">badge</span>
                <a href="<?php echo $link4?>">
                    <h4>Accès Compte</h4>
                </a>
            </div>