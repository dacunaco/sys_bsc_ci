<?php
    if(!defined('BASEPATH'))   exit('No direct script access allowed');
    class User_model extends CI_Model{
        function __construct() {
            parent::__construct();
        }
        function check_login($username , $password){
            $sha1_password = $password;
            $query_str = 'SELECT usuario,password,idusuario,idperfilusuario,dni,foto,nombres,apellidos,sexo FROM usuario WHERE usuario = ? and password = ? LIMIT 1';
            $result = $this->db->query($query_str, array($username, $sha1_password));
            
            if($result->num_rows() == 1){
                $user_data = array('user_id' => $result->row(0)->idusuario, 'user_nick' => $result->row(0)->usuario, 'user_perfil' => $result->row(0)->idperfilusuario, 'user_dni' => $result->row(0)->dni, 'user_name' => $result->row(0)->nombres, 'user_lastname' => $result->row(0)->apellidos, 'user_sex' => $result->row(0)->sexo, 'user_foto' => $result->row(0)->foto);
                return $user_data;
            }else{
                return false;
            }
        }
    }
?>
