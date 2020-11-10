<?php
    include_once 'PacienteConexion.php';

    $idPaciente = $_GET['IDPaciente'];

    $sql_borra = 'update pascientes set Activo=0 WHERE IDPaciente=?';
    $sentencia_borra = $pdo->prepare($sql_borra);
    $sentencia_borra-> execute(array($idPaciente));

    $sentencia_borra = null;
    $pdo = null;
    
    header('location: indexPaciente.php');

?>
    