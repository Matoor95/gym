<?php
define('BASE', $_SERVER['DOCUMENT_ROOT']);
// echo BASE;
// print_r(BASE);
include(BASE . "/gestionSalle/function.php");
start_session();


if (checker($_SESSION['email'], $_SESSION['password']) == false) {
    header("location:../index.php?cn=no");
    die();
}
?>
<?php
try {



    //connexion bd
    $cnx = connecter_db();

    // preparation de la requete sql
    $r = $cnx->prepare("SELECT * FROM plan order by pid");
    //execution de la requete 
    $r->execute();
    $plan = $r->fetchAll();
} catch (PDOException $e) {
    echo "Erreur     " . $e->getMessage();
}


?>



<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Gestion TS</title>

    <!-- Font Awesome Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="icon" href="../images/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div class="wrapper" style="overflow-x: hidden;">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light bg-gradient-gray-dark  fixed-top">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-black" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="home.php" class="nav-link text-black">Home</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <!-- <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> -->

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-black" href="../disconnect.php"> <i class="fas fa-sign-out-alt"></i> &nbsp; Se deconnecter
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
                <span class="brand-text font-weight-light">Gestion salle de sport</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../images/logofinatu.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> <?= $_SESSION['prenom'] . " " . $_SESSION['nom'] ?>

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
                                    <a href="index.php" class="nav-link">
                                        <i class="fas fa-user-graduate"></i>
                                        <p>client</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-user-graduate"></i>
                                        <p>Forfait</p>
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!-- <h1 class="m-0 text-dark"> </h1> -->
                <!-- /.col -->
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                </ol>
                <!-- /.col -->
                <!-- /.row -->
                <!-- /.container-fluid -->
            </section>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="container-fluid">
                <!--lien vers la page d'ajoute d'utilisateur-->
                <!-- <a href="#" class="btn btn-large btn-info" id="bouton_ajouter">
                    <i class="fas fa-plus"></i> &nbsp; Ajouter un client
                </a> -->
                <div class="col-lg-12">
                    <div class="row mb-4 mt-4">
                        <div class="col-md-12">

                        </div>
                    </div>
                    <div class="row">
                        <!-- FORM Panel -->

                        <!-- Table Panel -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <b>Active Member List</b>
                                    <span class="">

                                        <button class="btn btn-primary btn-block btn-sm col-sm-2 float-right" type="button" data-bs-toggle="modal" data-bs-target="#etudiant">
                                            <i class="fa fa-plus"></i> New</button>
                                    </span>
                                </div>
                                <div class="card-body">
                                    <!-- <h3 class="text-center my-5  text-danger">
                                        Liste des clients
                                    </h3> -->
                                    <table class="table table-tripped" id="matar">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">forfait </th>
                                                <th scope="col">Description</th>
                                                <!-- <th scope="col">Nom</th>
                                 <th scope="col">Prenom</th> -->
                                                <th scope="col">validity</th>
                                                <th scope="col">amount</th>
                                                <!-- <th scope="col">Email</th> -->
                                                <th scope="col">active </th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($plan as $p) { ?>
                                                <tr>
                                                    <td scope="row"><?= $p['pid'] ?></td>
                                                    <td scope="row"><?= $p['planName'] ?></td>
                                                    <td scope="row"><?= $p['description'] ?></td>
                                                    <td scope="row"><?= $p['validity'] ?></td>
                                                    <td scope="row"><?= $p['amount'] ?></td>
                                                    <td scope="row"><?= $p['active'] ?></td>



                                                    <td><a href="delete_Client.php?id=<?= $p['id_client']; ?>" class="del_btn"><i class="fas fa-trash text-red"></i></td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                    <?php
                                    if (isset($_GET['m'])) { ?>
                                        <div class="flash-data" data-flashdata="<?php echo $_GET['m']; ?>"></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- Table Panel -->
                    </div>
                </div>

                <div class="modal fade" id="plan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title  w-100 text-center text-uppercase">Ajouter un client</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form method="post" action="store_plan.php">
                                    <!--creation de la form avec la met hod post-->
                                    <div class="mb-3">
                                        <?php
                                        function getRandomWord($len = 6)
                                        {
                                            $word = array_merge(range('A', 'Z'));
                                            shuffle($word);
                                            return substr(implode($word), 0, $len);
                                        }

                                        ?>
                                        <input type="text" name="planid" class="form-control" id="planid" readonly value="<?= getRandomWord(); ?>">
                                    </div>
                                    <div class="mb-3">
                                        Nom forfait: <input type="text" name="nom" id="nom" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        Description: <input type="text" name="desc" id="desc" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        validité: <input type="number" name="val" id="val" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        Prix: <input type="number" name="prix" id="prix" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        Active: <input type="text" name="active" id="active" class="form-control" required>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <button class="btn btn-primary col-md-6">Valider</button>
                                    </div>

                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>









        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php
    include_once "footer.php";

    ?>
    </div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <?php
    include_once "script.php";


    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        $(document).ready(function() {
            $('#matar').DataTable({

                lengthMenu: [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "All"]
                ],
                order: [],
                info: true,
                responsive: true,
                autoWidth: false,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },

                // autoWidth: false,

            });
        });
    </script>
    <script>
        $('.del_btn').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            Swal.fire({
                title: 'voulez vous supprimer ce client ?',
                text: "Vous ne pourrez pas revenir en arrière!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimez-le!'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;

                }
            })
        })

        const flashdata = $('.flash-data').data('flashdata')
        if (flashdata) {
            swal.fire({
                type: 'success',
                title: 'client supprimé',
                text: 'Le client a été supprimé'
            })
        }
    </script>

</body>

</div>