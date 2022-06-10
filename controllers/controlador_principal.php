<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controlador_principal extends CI_Controller {
public function __construct()
{
    parent::__construct();
    $this->load->model('modelo_principal');
}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function inicio()
	{
        // session_destroy();
		unset($_SESSION['usuario']);
		$this->load->view('login');
	}
    public function pag_principal()
	{
        if(isset($_SESSION['usuario'])){
		$this->load->view('pagina_principal');
        }
        else {
            redirect('init');
        }
	}
    public function validar_login()
	{
		$usuario = $this->input->post("usuario"); 
        $password = $this->input->post("password"); 
        $datos = $this->modelo_principal->validar_usuario($usuario,$password);
        foreach($datos as $resultado){
            $nomUsuario = $resultado->user;
            $_SESSION['usuario']=$nomUsuario;
        }
        if($nomUsuario != ''){
            redirect('principal');
        }else{
			$_SESSION['fallaUsuario']="fallo";
            redirect('init');
			// echo "ERROR";
        }
	}

	public function crear_usuario()
	{
		$firstname = $this->input->post("firstname"); 
        $lastname = $this->input->post("lastname"); 
		$usuario = $this->input->post("usuario"); 
        $password = $this->input->post("password"); 
	$this->modelo_principal-> insertar_usuario($firstname,$lastname, $usuario, $password);
	//redirect('init');
	echo json_encode("ok");
	}

	public function restablecerC()
	{
		$this->load->view('restablecer_contraseña');
		}

		public function restablecerU()
		{
			$this->load->view('restablecer_usuario');
			}

	public function editar_usuario()
		{
			$firstname = $this->input->post("firstname"); 
        $lastname = $this->input->post("lastname"); 
		$usuario = $this->input->post("usuario"); 
        $password = $this->input->post("password"); 
	$this->modelo_principal-> update_usuario($firstname,$lastname, $usuario, $password);
	//redirect('init');
	echo json_encode("ok");
		}

public function buscar_usuario(){
	$usuario = $this->input->post("valorBusqueda"); 
	$resultado=$this->modelo_principal-> consultar_usuario($usuario);
//redirect('init');
if($resultado != ''){
foreach($resultado as $registros){
	$usuario_encontrado= $registros->user;
}
echo json_encode($usuario_encontrado);
} else {
	echo "No se encontraron resultados";
	}
}

	public function registros_usuario()
	{
		if(isset($_SESSION['usuario'])){
			$datos = $this->modelo_principal->select_usuario();
			$this->load->view('registros_usuarios', compact('datos'));
		}else{
			redirect('init');
		}

	}

	public function about_us(){
		$this->load->view('about');
	}
	public function contacts(){
		$this->load->view('contact');
	}
	public function repo(){
		$this->load->view('blog');
	}
}
