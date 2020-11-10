<?php
    include_once 'ConsultaConexion.php';

    $sql_leer = 'select IDUsuario, IDPaciente, Fecha, Diagnostico from consultas';
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute();

    $resultado = $gsent->fetchAll();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="estiloConsultas.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>ehelth Buscar Consulta</title>
    <script src="https://kit.fontawesome.com/2a0b62b31f.js" crossorigin="anonymous"></script>
  </head>
  <body class="bg-info">
    <header>
    <h1>Busqueda de Consulta <i>E-Helth Care</i></h1>

    <ul class="menu">
    <li><a href="../index.html">Home</a></li>
        <li><a href="../Usuarios/indexUsuarios.php">Usuarios</a></li>
        <li><a href="../Pacientes/indexPaciente.php">Pacientes</a></li>
        <li><a href="indexConsulta.php">Nueva Consulta</a></li>
        <li><a href="indexNuevaConsulta.php">Buscar Consulta</a></li>
        <li><a href="../Contacto/indexContacto.php">Contacto</a></li>
    </ul>
    </header>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="wrapper">
        <div class="row">
        <div class="paciente"> 
        <h1>Buscar Consulta</h1>
        <br>
         <?php foreach($resultado as $dato): ?>
                  <div>
                    *
                  <?php echo $dato['IDConsulta'] ?>
                  # Paciente:
                  <?php echo $dato['IDPaciente'] ?>
                  # Medico:
                  <?php echo $dato['IDUsuario'] ?>
                  Fecha:
                  <?php echo $dato['Fecha'] ?>
                  Diagnostico:
                  <?php echo $dato['Diagnostico'] ?>
                  </div>
              <?php endforeach?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>