<?php

class Model_Usuario extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //la función de Select * en sql
    public function selPerfil(){
        $query = $this->db->query("Select * from persona");
        //retornamos todo los registros de la tabla perfil
        return $query->result();
    }
    
    //funcion para insertar usuario
    public function insertUsuario($ci, $nombre, $fecha, $depto){
        
        $arrayDatos = array(
            'ci' => $ci,
            'nom_com' => $nombre,
            'fec_nac' => $fecha,
            'departamento' => $depto,
        );

        $this->db->insert('persona', $arrayDatos);
        
    }
    //funcion para listar usuarios
    public function listUsuario(){
        $query = $this->db->query("SELECT * FROM persona");
        return $query->result();
    }
    
    public function deleteUsuario($id){        
        $this->db->where('ci', $id);
        $this->db->delete('persona');
    }
    public function editUsuario($id){
        $consulta = $this->db->query("SELECT * FROM persona WHERE ci = $id");
        return $consulta->result();
    }
    public function updateUsuario($ci, $txtNombre, $txtFecha, $txtdpto){
        $array = array(
            'ci' => $ci,
            'nom_com' => $txtNombre,
            'fec_nac' => $txtFecha,
            'departamento' => $txtdpto,
        );
        $this->db->where('ci', $ci);
        $this->db->update('persona',$array);
    }
    
    
}