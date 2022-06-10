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
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h1>Iniciar Sesión</h1>
						 </div>
					</div>
                   <form action="<?php echo base_url();?>validarSesion " method="post" name="login">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Usuario</label>
                              <input type="text" name="usuario"  class="form-control" id="usuario" aria-describedby="emailHelp" placeholder="Usuario">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Contraseña</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Contraseña">
                           </div>
                           <?php 
                           if(isset($_SESSION['fallaUsuario'])){
                              echo "<p>Usuario y Contraseña Incorrecta-><a href='restablecer'> Restablecer Contraseña</a></p>
                           
                              ";
                              unset($_SESSION['fallaUsuario']);
                           }
                           ?>
                           <div class="form-group">
                              <p class="text-center">Para iniciar, Aceptar <a href="#"> Terminos y Condiciones</a></p>
                           </div>
                           <div class="col-md-12 text-center ">
                              <input type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" value = "INICIAR SESION"/>
                           </div>
                           <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                                 <span class="span-or" style="text-align: center;">ó</span>
                              </div>
                           </div>
                           <div class="col-md-12 mb-3">
                              <p class="text-center">
                                 <a href="javascript:void();" class="google btn mybtn"><i class="fa fa-google-plus">
                                 </i> Iniciar Sesión con tu cuenta de Google
                                 </a>
                              </p>
                           </div>
                           <div class="form-group">
                              <p class="text-center">¿Aún no tienes Cuenta? <a onclick='hideshow()' id="signup">Crear una cuenta</a></p>
                           </div>
                        </form>
      				</div>
			</div>


			  <div id="second">
			      <div class="myform form ">
                        <div class="logo mb-3">
                           <div class="col-md-12 text-center">
                              <h1 ></h1>
                           </div>
                        </div>
                        <form action="controlador_principal/crear_usuario" name="registration" id="registration" method="post" style="display:none">
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
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Crear Mi cuenta</button>
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
// this is the id of the form
$("#registration").submit(function(e) {

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
<script>
function hideshow(){
var frm=document.getElementById("registration");
if(frm.style.display=="block"){
   frm.style.display="none";
}
else
if(frm.style.display=="none"){
   frm.style.display="block";
}
}
</script>
<!-- seria algo asi con ajax<script>
function logearse(){
   var usuario = document.getElementById("usuario").value;
   var password = document.getElementById("password").value;
   var url = "<?php echo base_url();?>controlador_principal/validar_login";
   var ruta = "<?php echo base_url();?>principal";
    $.ajax({
   type:'POST',
   url: url,
   data:{
      "usuario":usuario,
      "password": password
   },
   success:function(response){
     
      if(response=='ok'){
         window.location="<?php echo base_url();?>principal";
      }
   }
  

   })
   
}
</script> -->
      