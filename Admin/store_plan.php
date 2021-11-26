<?php 
define('BASE', $_SERVER['DOCUMENT_ROOT']);
// echo BASE;
// print_r(BASE);
include(BASE."/gestionSalle/function.php");
start_session();

try{

    // recuperer les donnees du formulaires (par leurs name )
    $pid=$_POST['planid'];
    $nom=$_POST['nom'];
    $desc=$_POST['desc'];

    $val=$_POST['val'];
    $prix=$_POST['prix'];
    $active=$_POST['active'];



   
    //connexion bd
    $cnx = connecter_db();
    
    
    // preparation de la requete sql
    $r=$cnx->prepare("insert into plan (pid,planName,description,validity,amount,active) values(?,?,?,?,?,?)");
    //execution de la requete 
    $r->execute([$pid,$nom,$desc,$val,$prix,$active]);
    $_SESSION['message1']="forfait ajoutée avec succés";
    $_SESSION['status']="success";
}catch (PDOException $e) {
    echo "Erreur d'ajout de la facture   ".$e->getMessage() ;
}
header("location:plan.php");

?>

