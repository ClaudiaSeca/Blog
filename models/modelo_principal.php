<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modelo_principal extends CI_Model {
function __construct()
   {
    $this->load->database();
    parent::__construct();
    }
    function validar_usuario($usuario, $password){
        $query= "SELECT * FROM users WHERE user = ? AND password = ?";
        $sql = $this->db->query($query, array($usuario,$password))->result();
        return $sql;
    }

    function insertar_usuario($firstname,$lastname, $usuario, $password){
        $sqlC = $this->db->query("INSERT INTO users (nombre, apellido, user, password) VALUES ('$firstname','$lastname', '$usuario', '$password')");
    }
    
    function select_usuario(){
        $sqlR = $this->db->query("SELECT * FROM users")->result();
        return $sqlR;
        
    }

    function update_usuario($firstname,$lastname,$usuario,$password){
        $sqlU = $this->db->query("UPDATE INTO users (nombre, apellido, user, password) VALUES ('$firstname','$lastname', '$usuario', '$password')");
    }
    
    function consultar_usuario($usuario){
        $sqlR = $this->db->query("SELECT * FROM users WHERE user LIKE '%$usuario%'")->result();
        return $sqlR;  

    }
    
}