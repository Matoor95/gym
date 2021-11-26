

<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="Bootstrap/css/style.css">

<script src="Bootstrap/js/jquery-3.5.1.min.js"></script>
<script src="Bootstrap/js/bootstrap.bundle.js"></script>
<script src="Bootstrap/js/bootstrap.min.js"></script>

<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="home.php" class="nav-link">Home</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="../disconnect.php"> <i class="fas fa-sign-out-alt"></i> &nbsp; Se deconnecter
            </a>
        </li>

    </ul>
   

</nav>
 
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
        <img src="../images/logofinatu.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-4" style="opacity: .7">
        <span class="brand-text font-weight-light">gesformation</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../images/logofinatu.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> <?=$_SESSION['prenom']. " ".$_SESSION['nom']?>

                    </i></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            DASHBORD
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <!--lien vers la page d'ajoute d'utilisateur-->
                            <a href="langue/create.php" class="nav-link" id="bouton_ajouter">
                            <i class="fas fa-language"></i> &nbsp; langues
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="home.php" class="nav-link">
                            <i class="fas fa-user-graduate"></i>
                                <p>Etudiant</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
