<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href=" <?php echo base_url(); ?> curso1/resources/estilos.css">
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<body>
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form "><br>
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h1>Restablecer</h1>
						 </div>
					</div>
   			</div>
			</div>

			  <div id="second">
			      <div class="myform form ">
                        
                        <form action="controlador_principal/editar_usuario" accept-charset="utf-8" name="restablecer" id="restablecer" method="post">
                        <div class="form-group">
                              <label for="exampleInputEmail1">Buscar Usuario:</label>
                              <input type="text"   name="busqueda" class="form-control" id="busqueda" aria-describedby="emailHelp" placeholder="User..." maxlength="50" autocomplete="off" onKeyUp="buscar();">
                        </div>
                        <div id="resultadoBusqueda"></div>
                        <div class="form-group">
                              <label for="exampleInputEmail1">Nombre:</label>
                              <input type="text"  name="firstname" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Enter Firstname">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Apellido:</label>
                              <input type="text"  name="lastname" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Enter Lastname">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Usuario</label>
                              <input type="usuario" name="usuario"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Contraseña</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <div class="col-md-12 text-center mb-3">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Restablecer Mi cuenta</button>
                           </div>
                           <div class="col-md-12 ">
                              <!-- <div class="form-group">
                                 <p class="text-center"><a href="#" id="signin">Already have an account?</a></p>
                              </div> -->
                           </div>
                            </div>
                        </form>
                     </div>
			</div>
		</div>
      </div>   
         
</body>
<script>
   $(document).ready(function() {
    $("#resultadoBusqueda").html('<p>JQUERY VACIO</p>');
});
function buscar() {
    var textoBusqueda = $("#busqueda").val();
    if (textoBusqueda != "") {
        $.post("buscar", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusqueda").html(mensaje);
        }); 
    } else { 
      $("#resultadoBusqueda").html('<p>JQUERY VACIO</p>');
	};
};
</script>
<!-- <script>
$('#buscar').keyup(function(e) {
    clearTimeout($.data(this, 'timer'));
    if (e.keyCode == 13)
      buscar(true);
    else
      $(this).data('timer', setTimeout(buscar, 500));
});
function buscar(force) {
    var existingString = $("#buscar").val();
    if (!force && existingString.length < 3) return; //wasn't enter, not > 2 char
    $.get('buscar' + existingString, function(data) {
        $('div#results').html(data);
        $('#results').show();
    });
}
</script> -->

<script>
// this is the id of the form
$("#restablecer").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');
    
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
               location.reload();
           }
         });

    
});
</script>
