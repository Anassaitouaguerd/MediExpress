<nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-success p-0 navbar-dark">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-prescription-bottle-alt"></i>
            </div>
            <div class="sidebar-brand-text mx-3"><span>Medi Express</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
            <li class="nav-item"><a class="nav-link" href="/medicaments"><i class="fas fa-table"></i><span>Medicaments</span></a></li>
            <?php if (empty($_SESSION['id'])) {?>
            <li class="nav-item"><a class="nav-link" href="login"><i class="far fa-user-circle"></i><span>Login</span></a></li>
            <?php }else{?>
            <li class="nav-item"><a class="nav-link" href="logout"><i class="far fa-user-circle"></i><span>Logout</span></a></li>
            <?php }?>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>