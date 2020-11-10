<?php
    $idPaciente = $_GET['IDPaciente'];
    $nombrePaciente = $_GET['NombrePaciente'];
    $apaternoPaciente = $_GET['APaternoPaciente'];
    $amaternoPaciente = $_GET['AMaternoPaciente'];
    $edad = $_GET['Edad'];


    include_once 'PacienteConexion.php';

    $sql_editar = 'update pascientes set NombrePaciente=?, APaternoPaciente=?, AMaternoPaciente=?, Edad=?, where IDPaciente=?';
    $sentencia_editar = $pdo->prepare($sql_editar);
    $sentencia_editar->execute(array($nombrePaciente, $apaternoPaciente, $amaternoPaciente, $edad, $idPaciente));

    $sentencia_editar = null;
    $pdo = null;
    
    header('location: indexPaciente.php');
    ?>