<?php
    include_once 'UsuariosConexion.php';

    $idUsuario = $_GET['IDUsuario'];

    $sql_borra = 'DELETE FROM usuarios WHERE IDUsuario=?';
    $sentencia_borra = $pdo->prepare($sql_borra);
    $sentencia_borra-> execute(array($idUsuario));

    $sentencia_borra = null;
    $pdo = null;
    
    header('location: index.php');

?>
    