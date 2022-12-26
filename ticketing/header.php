<!-- Le header du workspace -->
    <nav>
        <div class="container">
            <img src="assets/img/logo_nav.png" class="logo">
            <div class="profile-area">
                <div class="theme-btn">
                    <span class="material-symbols-sharp active">light_mode</span>
                    <span class="material-symbols-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="profile-photo">
                        <img src="assets/img/profile_picture.png">
                    </div>
                </div>
                <div>
                    <h4><?php if (isset($_SESSION['edit_self_firstname'])) {
                                    $firstname = $_SESSION['edit_self_firstname'];
                                    $lastname = $_SESSION['edit_self_lastname'];
                                    $role = $_SESSION['edit_self_workspace_role'];
                    } else {


                        $firstname = $_SESSION['firstname'];
                        $lastname = $_SESSION['lastname'];
                        $role = $_SESSION['workspace_role'];
                    }
                                if ($role == 1000 || $role == 'Admin')
                                    $role_display = 'Admin';
                                else if ($role == 3 || $role == 'Responsable')
                                    $role_display = 'Responsable';
                                else
                                    $role_display = 'Utilisateur'; echo "$firstname $lastname"?></h4>
                    <small>Rôle :<?php echo " $role_display"?></small>
                </div>
                <button id="menu-btn">
                    <span class="material-symbols-sharp">dashboard</span>
                </button>
                <div class="logout-btn">
                    <span class="material-symbols-sharp" style="color: #e23232;"><a href="logout.php">logout</a></span>
                </div>
                </div>
            </div>
        </div>
    </nav>