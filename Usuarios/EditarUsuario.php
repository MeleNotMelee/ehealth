<?php
    $idUsuario = $_GET['IDUsuario'];
    $nombreUsuario = $_GET['NombreUsuario'];
    $apaternoUsuario = $_GET['APaternoUsuario'];
    $amaternoUsuario = $_GET['AMaternoUsuario'];
    $puesto = $_GET['Puesto'];


    include_once 'UsuariosConexion.php';

    $sql_editar = 'update usuarios set NombreUsuario=?, APaternoUsuario=?, AMaternoUsuario=?, Puesto=?, where IDUsuario=?';
    $sentencia_editar = $pdo->prepare($sql_editar);
    $sentencia_editar->execute(array($nombreUsuario, $apaternoUsuario, $amaternoUsuario, $puesto, $idUsuario));

    $sentencia_editar = null;
    $pdo = null;
    
    header('location: index.php');
    ?>