<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="../img/sjclogo.jpg" height="50px">
        </div>
        <div class="sidebar-brand-text mx-3">INDEP 2K23</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($active == 0) {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item <?php if ($active == 1) {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="lot.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Lot Allotments</span></a>
    </li>
    <li class="nav-item <?php if ($active == 2) {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="teams.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Teams</span></a>
    </li>
    <li class="nav-item <?php if ($active == 2) {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="TempUser.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Temp user</span></a>
    </li>
    <li class="nav-item <?php if ($active == 4) {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="event_permission.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Event Permission</span></a>
    </li>
    <li class="nav-item <?php if ($active == 5) {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="./Attendance.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Attendance</span></a>
    </li>
    
    <li class="nav-item <?php if ($active == 6) {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="./Dates.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Dates to Remember</span></a>
    </li>
    <li class="nav-item <?php if ($active == 7) {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="./viewNotification.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Notification</span></a>
    </li>
    <li class="nav-item <?php if ($active == 8) {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="./downloads.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Downloads</span></a>
    </li>
    <li class="nav-item <?php if ($active == 9) {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="./questions.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Questions</span></a>
    </li>
    <li class="nav-item <?php if ($active == 10) {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="./count.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Count</span></a>
    </li>

</ul>
<!-- End of Sidebar -->