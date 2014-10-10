<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {
	/**
	 * Constructor
	 */
    function __construct() {
        parent :: __construct();
    }

    public function insertNewUser($usuario){
        $sql = "INSERT IGNORE INTO users(nick, name, surname, email, password, born, ini)
                VALUES('" . $usuario->nick . "', '" . $usuario->nombre . "', '" . $usuario->apellido . "', '" . $usuario->email . "', '" . $usuario->password . "', '" . $usuario->edad . "', NOW())";

        $this->db->query($sql);
    }

    public function getUserLogin($usuario, $data = false){
        $sql = "SELECT * 
                FROM users
                WHERE nick = '" . $usuario->nick . "'
                    AND password = '" . $usuario->password ."';";

        $resultado = $this->db->query($sql);

        if($resultado){
            if($data === true){
                return $resultado->row();
            } else {
                return $resultado->num_rows;
            }
        } else {
            return false;
        }
    }

}