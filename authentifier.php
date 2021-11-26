
<?php
 session_start();

define('BASE', $_SERVER['DOCUMENT_ROOT']);
include(BASE."/gestionsalle/function.php");
$login=$_POST["email"];
$Pass=$_POST["password"];
// $role=$_POST["role"];
if(checker($login,$Pass)){
    header("location:Admin/index.php");
}else{
     header("location:index.php");
}
