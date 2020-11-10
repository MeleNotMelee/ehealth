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
        $nombreUsuario = $_POST['NombreUsuario'];
        $apaternoUsuario = $_POST['APaternoUsuario'];
        $amaternoUsuario = $_POST['AMaternoUsuario'];
        $puesto = $_POST['Puesto'];
        
        $sql_agregar = 'insert into usuarios(NombreUsuario, APaternoUsuario, AMaternoUsuario, Puesto) values(?,?,?,?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        $sentencia_agregar->execute(array($nombreUsuario, $apaternoUsuario, $amaternoUsuario, $puesto));
        
        $sentencia_agregar = null;
        $pdo = null;

        header('location: index.php');
    }