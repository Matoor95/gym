<?php 

function connecter_db(){

    try{
        $cnx=new PDO('mysql:host=localhost;dbname=gym',"root", "");
        $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $cnx;

    }

    catch(PDOException $e){
        echo " erreur" .$e->getMessage();
}
    }

    function checker($login, $Pass)
    {
        try {
            $cnx = connecter_db();
            $r = $cnx->prepare("SELECT * FROM admin WHERE email=? AND password=?");
    
            $r->execute([$login, $Pass]);
            $user = $r->fetch();
            if (!empty($user)) {
                start_session();
                    $_SESSION['email'] = $login;
                    $_SESSION['password'] = $Pass;
                    $_SESSION['nom']=$user['nom'];
                    $_SESSION['prenom']=$user['prenom'];
                    return true;

            }




                
             else {
                 $_SESSION['message']="login ou mot de passe incorrecte";
                return false;
            }
        } catch (PDOException $e) {
            // header("location:index.php?m=uniq");
            echo "  erreur checker  " . $e->getMessage();
        }
    }

    function start_session(){
        if (!isset($_SESSION)) {
            # code...
            session_start();
            session_regenerate_id();
        }
    }
    function fermer_session()
   {  start_session();
      session_destroy();
   }
