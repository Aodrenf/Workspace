<nav>
        <div class="container">
            <img src="../assets/img/logo_nav.png" class="logo">
            <div class="profile-area">
                <div class="theme-btn">
                    <span class="material-symbols-sharp active">light_mode</span>
                    <span class="material-symbols-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="profile-photo">
                        <img src="../assets/img/profile_picture.png">
                    </div>
                </div>
                <div>
                    <h4><?php /*if(isset($_SESSION['edit_self']))
                                {
                                    $_SESSION['firstname'] = $_SESSION['edit_self_firstname'];
                                    $_SESSION['lastname'] = $_SESSION['edit_self_lastname'];
                                    $_SESSION['email'] = $_SESSION['edit_self_email'];
                                    $_SESSION['workspace_role'] = $_SESSION['edit_self_workspace_role'];
                                    $_SESSION['bagdeuse_role'] = $_SESSION['edit_self_badgeuse_role'];
                                    $_SESSION['inventory_role'] = $_SESSION['edit_self_inventory_role'];
                                    $_SESSION['form_role'] = $_SESSION['edit_self_form_role'];
                                    unset($_SESSION['edit_self']);
                                }*/
                                
                                $firstname = $_SESSION['firstname'];
                                $lastname = $_SESSION['lastname'];
                                $role = $_SESSION['workspace_role'];
                                if ($role == 1000)
                                    $role_display = 'Admin';
                                else if ($role == 3)
                                    $role_display = 'Responsable';
                                else
                                    $role_display = 'Utilisateur'; echo "$firstname $lastname"?></h4>
                    <small>Rôle :<?php echo " $role_display"?></small>
                </div>
                <button id="menu-btn">
                    <span class="material-symbols-sharp">dashboard</span>
                </button>
                <div class="logout-btn">
                    <span class="material-symbols-sharp" style="color: #e23232;"><a href="../config/logout.php">logout</a></span>
                </div>
                </div>
                
                <!-- <span class="material-symbols-sharp" style="color: #e23232;">logout</span> -->
            </div>
        </div>
    </nav>