<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {
	/**
	 * Constructor
	 */
    function __construct() {
        parent :: __construct();
    }

    public function getUserData($user_id){
        $sql = "SELECT *
                FROM users
                WHERE user_id = " . $user_id . ";";


        $res = $this->db->query($sql);

        if($res){
            return $res->row();
        } else {
            return false;
        }
    }

    public function getUserByNick($nick, $data = false){
        $sql = "SELECT *
                FROM users
                WHERE nick like '" . $nick . "';";

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

    public function saveToken($token, $id_usuario){
        $sql = "UPDATE users
                SET tokenpass = '" . $token . "'
                WHERE id = " . $id_usuario . "
                LIMIT 1;";

        $this->db->query($sql);
    }

    public function getUserByEmail($email, $data = false){
        $sql = "SELECT * 
                FROM users
                WHERE email like '" . $email . "';";

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