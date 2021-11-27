<?php 

define('BASE', $_SERVER['DOCUMENT_ROOT']);
// echo BASE;
// print_r(BASE);
include(BASE . "/gestionSalle/function.php");
start_session();
try{

    // recuperer les donnees depuis le lien 
  $id=$_GET['id'];
//    echo "id est $id";


//    exit();
    //connexion bd
    
    $cnx=connecter_db();
    
    // preparation de la requete sql
    $r=$cnx->prepare("delete from  plan where pid='$id'");
    $r->execute([$id]);
    //execution de la requete 
    header("location:plan.php?m=done");
}catch (PDOException $e) {
    // header("location:create.php");
    echo "  erreur de suppression du produit  ".$e->getMessage() ;
}

?>