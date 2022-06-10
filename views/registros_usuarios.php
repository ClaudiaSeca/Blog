<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registro de Usuarios</title>
    <script src="resources/DataTables/jQuery-3.6.0/jquery-3.6.0.js"></script>
    <script src="resources/bootstrap-5.1.3/css/bootstrap.min.css"></script>
    <script src="resources/bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="resources/DataTables/datatables.min.js"></script>
    <script src="resources/DataTables/dataTables.responsive.min.js"></script>
    <link rel="stylesheet" type="text/css" href="resources/DataTables/datatables.min.css"/>
</head>
<script>
$(document).ready( function () {
    $('#tabla').DataTable();
} );
</script>
<script>
$(document).ready( function () {
    $('#tabla2').DataTable();
} );
</script>
<style>
    header{
	background: url(resources/img/head.jpg);
    background-size:cover;
	height:100px;
	width: 100%;
	position: absolute;
	left:0;
	top:0;
}
</style>

<header></header><br><br><br><br>
<div class="container">

<hr><br>
<div id="1" align="left">
    <a href="principal"><strong>volver</strong></a>
</div>
<hr>
<div class="col-lg-4">
<table id="tabla" class="display responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>Nombre:</th>
            <th>Apellido:</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
      <?php 
      foreach($datos as $usuarios){
      echo '<tr><td>'.$usuarios->nombre.'</td>
      <td>'.$usuarios->apellido.'</td>
      <td><a href="editar"><img src="resources/img/edit.png" width="20" style="margin-right:50px;"></a></td>
      </tr>';
      }
      ?>
    </tbody>
</table>
    </div>
    
<br>
<div class="col-lg-4">
<table id="tabla2" class="display responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>Usuario:</th>
            <th>Contraseña:</th>
        </tr>
    </thead>
    <tbody>
      <?php 
      foreach($datos as $usuarios2){
      echo '<tr><td>'.$usuarios2->user.'</td>
      <td>'.$usuarios2->password.'</td>
      </tr>';
      }
      ?>
    </tbody>
</table>
</div>
    </div>