<?php
    include_once 'PacienteConexion.php';

    $sql_leer = 'select IDPaciente, NombrePaciente, APaternoPaciente, AMaternoPaciente from pascientes where Activo=1';
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute();

    $resultado = $gsent->fetchAll();

    if($_GET){
      $idPaciente = $_GET['IDPaciente'];
      $sql_Paciente = 'select * from pascientes where IDPaciente=?';
      $gsent_Paciente = $pdo -> prepare($sql_Paciente);
      $gsent_Paciente -> execute(array($idPaciente));
      $resultado_unico = $gsent_Paciente -> fetch();
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="estiloPaciente.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>ehelth Pacientes</title>
    <script src="https://kit.fontawesome.com/2a0b62b31f.js" crossorigin="anonymous"></script>
  </head>
  <body class="bg-info">
    <header>
    <h1>Pacientes <i>E-Helth Care</i></h1>

    <ul class="menu">
        <li><a href="../index.html">Home</a></li>
        <li><a href="../Usuarios/indexUsuarios.php">Usuarios</a></li>
        <li><a href="indexPaciente.php">Pacientes</a></li>
        <li><a href="../Consultas/indexConsulta.php">Nueva Consulta</a></li>
        <li><a href="../Consultas/indexNuevaConsulta.php">Buscar Consulta</a></li>
        <li><a href="../Contacto/indexContacto.php">Contacto</a></li>
    </ul>
    </header>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="wrapper">
        <div class="row">
        <div class="col-md-6">
        <h1>Pacientes</h1>
        <br>
            <?php foreach($resultado as $dato): ?>
                <div class="alert text-uppercase">
                <?php echo $dato['IDPaciente'] ?>
                <?php echo $dato['NombrePaciente'] ?>
                <?php echo $dato['APaternoPaciente'] ?>
                <?php echo $dato['AMaternoPaciente'] ?>
                <a href="indexPaciente.php?IDPaciente=<?php echo $dato['IDPaciente']?>" class="float-right"><i class="fas fa-user-edit"></i></a>
                <a href="BorrarPaciente.php?IDPaciente=<?php echo $dato['IDPaciente']?>" class="float-right ml-3 mr-3"><i class="fas fa-user-minus"></i></a>
                </div>
            <?php endforeach?>
        </div>
        <div class="col-md-6">
              <?php
                if(!$_GET):?>
                  <h1>Agregar Pacientes</h1>
                  <form method="post">
                      <input type="text" class="form-control" name="NombrePaciente"value="Nombre">
                      <input type="text" class="form-control" name="APaternoPaciente" value="Apellido Paterno">
                      <input type="text" class="form-control" name="AMaternoPaciente" value="Apellido Materno">
                      <input type="text" class="form-control" name="Edad" value="Edad">
                      <input type="text" class="form-control" name="Activo" value="1">
                      <button class="btn btn-primary mt-3">AGREGAR</button>
                  </form>
              <?php endif?>
              <?php if($_GET):?>
                <h1>Editar Paciente</h1>
                <form action="EditarPaciente.php" method="get">
                      <input type="text" class="form-control" name="Nombre" value="<?php echo $resultado_unico['NombrePaciente'] ?>">
                      <input type="text" class="form-control" name="APaterno" value="<?php echo $resultado_unico['APaternoPaciente'] ?>">
                      <input type="text" class="form-control" name="AMaterno" value="<?php echo $resultado_unico['AMaternoPaciente'] ?>">
                      <input type="text" class="form-control" name="Edad" value="<?php echo $resultado_unico['Edad'] ?>">
                      <input type="hidden" name="IDPaciente" value="<?php echo $resultado_unico['IDPaciente'] ?>">
                      <button class="btn btn-warning mt-3">EDITAR</button>
                </form>
              <?php endif?>
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