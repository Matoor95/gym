<?php 
define('BASE', $_SERVER['DOCUMENT_ROOT']);
// echo BASE;
// print_r(BASE);
include(BASE."/gestionTS/function.php");
start_session();
try{

    // recuperer les donnees du formulaires (par leurs name )
       // recuperer les donnees du formulaires (par leurs name )
    $nom_mission=$_POST['nom_mission'];
    $tache=$_POST['tache'];
    $date=$_POST['date'];
    $nbre = $_POST['nbre'];
    //upload du fichier 
    //connexion a la bd
    $cnx = connecter_db();
    //inserer les donnees dans la base de données
    $r=$cnx->prepare("insert into missions(nom_mission,tache,date,nbre_heure) values(?,?,?,?)");
    // $last_id = $conn->lastInsertId();


    $id_user=$_SESSION['id_user'];
    //execution de la requete 
    $r->execute([$nom_mission,$tache,$date,$nbre]);
    $id_mission= $cnx->lastInsertId();
    $r=$cnx->prepare("insert into ligne_user_mission(id_user,id_mission) values(?,?)");
    //execution de la requete 
    $r->execute([$id_user,$id_mission]);
    $_SESSION['message1']="mission ajouter avec succés";
    $_SESSION['status']="success";
}catch (PDOException $e) {
    echo "Erreur d'ajout de la facture   ".$e->getMessage() ;
}
header("location:index.php");

?>