<?php
session_start();
?>

<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="../userlistpage.php"><img src="../view/assets/images/logo.svg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="../userlistpage.php"><img src="../view/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field d-none d-xl-block">
            <form class="d-flex align-items-center h-100" action="#">
            </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">


            <?php
            if (isset($_SESSION["email"])) {
                echo '<li class="nav-item nav-profile dropdown">';
                echo '<a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">';
                echo '<div class="nav-profile-img">';
                echo '<img src="../view/assets/images/faces/face28.png" alt="image">';
                echo '</div>';
                echo '<div class="nav-profile-text">';
                echo '<p class="mb-1 text-black">' . $_SESSION["email"] . '</p>';
                echo '</div>';
                echo '</a>';
                echo '<div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">';
                echo '<div class="p-3 text-center bg-primary">';
                echo '<img class="img-avatar img-avatar48 img-avatar-thumb" src="../view/assets/images/faces/face28.png" alt="">';
                echo '</div>';
                echo '<div class="p-2">';
                
                //login 
                echo '<a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">';
                echo '<span>WELCOME ' . $_SESSION["email"] . '</span>';
                echo ' <span class="p-0">';
                echo '</a>';
               
                echo '<div role="separator" class="dropdown-divider"></div>';
                echo '<h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2">Actions</h5>';
                echo '<a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">';
                echo '<span>Lock Account</span>';
                echo '<i class="mdi mdi-lock ml-1"></i>';
                echo '</a>';
              
                //Logout
                echo '<a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="../controller/UserController.php?action=logout">';
                echo '<span>Log Out</span>';
                echo '<i class="mdi mdi-logout ml-1"></i>';
                echo '</a>';
                
                echo '</div>';
                echo '</div>';
                echo '</li>';
            } else {
                echo '<li class="nav-item nav-profile dropdown">';
                echo '<a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">';
                echo '<div class="nav-profile-img">';
                echo '<img src="../view/assets/images/faces/face28.png" alt="image">';
                echo '</div>';
                echo '<div class="nav-profile-text">';
                echo '<p class="mb-1 text-black"></p>';
                echo '</div>';
                echo '</a>';
                echo '<div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">';
                echo '<div class="p-3 text-center bg-primary">';
                echo '<img class="img-avatar img-avatar48 img-avatar-thumb" src="../view/assets/images/faces/face28.png" alt="">';
                echo '</div>';
                echo '<div class="p-2">';
                
                echo '<h5 class="dropdown-header text-uppercase pl-2 text-dark">User Options</h5>';
                echo '<a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="../view/login.php">';
                echo '<span>Login</span>';
               
                echo ' <span class="p-0">';
                echo '</a>';
                echo '<div role="separator" class="dropdown-divider"></div>';
                echo '<h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2">Actions</h5>';
                echo '<a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">';
                echo '<span>Lock Account</span>';
                echo '<i class="mdi mdi-lock ml-1"></i>';
                echo '</a>';
                
                echo '<a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">';
                echo '<span>Log Out</span>';
                echo '<i class="mdi mdi-logout ml-1"></i>';
                echo '</a>';
                
                echo '</div>';
                echo '</div>';
                echo '</li>';
            }
            ?>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>