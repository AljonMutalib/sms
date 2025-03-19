<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

$_SESSION['active_page'] = basename($_SERVER['PHP_SELF'], ".php"); 

?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" style="width: 60px; height: 60px;" src="../images/dict-logo.png"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold"><?php echo $_SESSION['fname'].' '.$_SESSION['lname']?></span>
                        <span class="text-muted text-xs block"><?php echo $_SESSION['position']?></span>
                    </a>
                </div>
                <div class="logo-element">
                    DICT
                </div>
            </li>
            <li class="<?= (isset($_SESSION['active_page']) && $_SESSION['active_page'] == 'dashboard') ? 'active' : ''; ?>">
                <a href="dashboard.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li class="<?= (isset($_SESSION['active_page']) && $_SESSION['active_page'] == 'employee') ? 'active' : ''; ?>">
                <a href="employee.php"><i class="fa fa-users"></i> <span class="nav-label">Employee</span></a>
            </li>
            <li class="<?= (isset($_SESSION['active_page']) && in_array($_SESSION['active_page'], ['property', 'property_transfer', 'itr', 'disposal'])) ? 'active' : ''; ?>">
                <a href="#"><i class="fa fa-folder"></i> <span class="nav-label">Property</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level <?= (isset($_SESSION['active_page']) && in_array($_SESSION['active_page'], ['property', 'property_transfer', 'itr', 'disposal'])) ? 'collapse in' : 'collapse'; ?>">
                    <li class="<?= (isset($_SESSION['active_page']) && $_SESSION['active_page'] == 'property_transfer') ? 'active' : ''; ?>"><a href="property_transfer.php">Property Transfer</a></li>
                    <li class="<?= (isset($_SESSION['active_page']) && $_SESSION['active_page'] == 'itr') ? 'active' : ''; ?>"><a href="itr.php">Invoice Transfer</a></li>
                    <li class="<?= (isset($_SESSION['active_page']) && $_SESSION['active_page'] == 'disposal') ? 'active' : ''; ?>"><a href="disposal.php">Disposal</a></li>
                </ul>
            </li>
            <li class="<?= (isset($_SESSION['active_page']) && in_array($_SESSION['active_page'], ['supply', 'purchase', 'inventory', 'withdrawal'])) ? 'active' : ''; ?>">
                <a href="#"><i class="fa fa-file"></i> <span class="nav-label">Supply</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level <?= (isset($_SESSION['active_page']) && in_array($_SESSION['active_page'], ['supply', 'inventory', 'withdrawal'])) ? 'collapse in' : 'collapse'; ?>">
                    <li class="<?= (isset($_SESSION['active_page']) && $_SESSION['active_page'] == 'supply') ? 'active' : ''; ?>"><a href="supply.php">Common Supply</a></li>
                    <li class="<?= (isset($_SESSION['active_page']) && $_SESSION['active_page'] == 'purchase') ? 'active' : ''; ?>"><a href="purchase.php">Purchase</a></li>
                    <li class="<?= (isset($_SESSION['active_page']) && $_SESSION['active_page'] == 'inventory') ? 'active' : ''; ?>"><a href="inventory.php">Inventory</a></li>
                    <li class="<?= (isset($_SESSION['active_page']) && $_SESSION['active_page'] == 'withdrawal') ? 'active' : ''; ?>"><a href="withdrawal.php">Withdrawal</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-gear"></i> <span class="nav-label">Setting</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="">Leave Policies & Guidelines</a></li>
                    <li><a href="">User Profile</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>