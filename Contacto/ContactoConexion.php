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
        $nombreContacto = $_POST['NombreContacto'];
        $area = $_POST['Area'];
        $fechaContacto = $_POST['FechaContacto'];
        $pregunta = $_POST['Pregunta'];
       
        
        $sql_agregar = 'insert into contacto(NombreContacto, Area, FechaContacto, Pregunta) values(?,?,?,?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        $sentencia_agregar->execute(array($nombreContacto, $area, $fechaContacto, $pregunta));
        
        $sentencia_agregar = null;
        $pdo = null;

        header('location: indexContacto.php');
    }