<?php

    $link = 'mysql:host=localhost:8889; dbname=protectophp;';
    $user = 'root';
    $pass = 'root';
    
    try{
        $pdo = new PDO($link, $user, $pass);
    }
    catch(PDOException $e){
        print "Error!!! " . $e -> getMessage(). "</br>";
        die();
    }

    if($_POST){
        $nombrePaciente = $_POST['NombrePaciente'];
        $apaternoPaciente = $_POST['APaternoPaciente'];
        $amaternoPaciente = $_POST['AMaternoPaciente'];
        $edad = $_POST['Edad'];
        $activo = $_POST['Activo'];
        
        $sql_agregar = 'insert into pascientes(NombrePaciente, APaternoPaciente, AMaternoPaciente, Edad, Activo) values(?,?,?,?,?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        $sentencia_agregar->execute(array($nombrePaciente, $apaternoPaciente, $amaternoPaciente, $edad, $activo));
        
        $sentencia_agregar = null;
        $pdo = null;

        header('location: indexPaciente.php');
    }