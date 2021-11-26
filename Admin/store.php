<?php 
define('BASE', $_SERVER['DOCUMENT_ROOT']);
// echo BASE;
// print_r(BASE);
include(BASE."/gestionsalle/function.php");
start_session();
try{

    // recuperer les donnees du formulaires (par leurs name )
       // recuperer les donnees du formulaires (par leurs name )
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $date=$_POST['date'];
    $email=$_POST['email'];
    $tel = $_POST['tel'];
    $discipline = $_POST['discipline'];
    $numero_vac = $_POST['numero_vacc'];
    
    //upload du fichier 
    //connexion a la bd
    $cnx = connecter_db();
    //inserer les donnees dans la base de données
    $r=$cnx->prepare("insert into client (nom,prenom,date_naiss,email,tel,discipline,numero_vacc) values(?,?,?,?,?,?,?)");
    
    $r->execute([$nom,$prenom,$date,$email,$tel,$discipline,$numero_vac]);
    $_SESSION['message1']="mission ajouter avec succés";
    $_SESSION['status']="success";
}catch (PDOException $e) {
    echo "Erreur d'ajout de la facture   ".$e->getMessage() ;
}
header("location:index.php");

?>