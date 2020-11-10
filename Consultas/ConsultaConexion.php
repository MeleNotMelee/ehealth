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
        $idPaciente = $_POST['IDPaciente'];
        $idUsuario = $_POST['IDUsuario'];
        $fecha = $_POST['Fecha'];
        $diagnostico = $_POST['Diagnostico'];
        $tratamiento = $_POST['Tratamiento'];
        
        $sql_agregar = 'insert into consultas(IDPaciente, IDUsuario, Fecha, Diagnostico, Tratamiento) values(?,?,?,?,?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        $sentencia_agregar->execute(array($idPaciente, $idUsuario, $fecha, $diagnostico, $tratamiento));
        
        $sentencia_agregar = null;
        $pdo = null;

        header('location: indexConsulta.php');
    }