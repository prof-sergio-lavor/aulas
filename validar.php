<?php 
session_start();
if(isset($_SESSION['nome_usuario'])){
    $user=$_SESSION['nome_usuario'];
}
else{
    session_destroy();
    header("location:../login.php?msg=erro");
    echo "voce foi expulso";
}

?>