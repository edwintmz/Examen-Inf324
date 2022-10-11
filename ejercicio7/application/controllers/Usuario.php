<?php
class Usuario extends CI_Controller {
    function __construct() {
        parent::__construct();
        //comunicación con el modelo
        $this->load->model('Model_Usuario');
    }    
    public function index(){
        $data['contenido'] = "usuario/index";        //enviar a plantilla la vista index de usuario
        $data['selPerfil'] = $this->Model_Usuario->selPerfil();
        $data['listaUsuario'] = $this->Model_Usuario->listUsuario();
        $this->load->view("plantilla", $data);
    }
    public function insert(){
        $datos = $this->input->post();        
        if(isset($datos)){
            $txtci = $datos['txtci'];
            $txtNombre = $datos['txtNombre'];
            $txtFecha = $datos['txtFecha'];
            $txtdpto = $datos['txtdpto'];
            $this->Model_Usuario->insertUsuario($txtci, $txtNombre, $txtFecha, $txtdpto);
            redirect('');
        }        
    }    
    public function delete($id = NULL){
        if($id != NULL){
            $this->Model_Usuario->deleteUsuario($id);
            redirect('');
        }
    }
    public function edit($id = NULL){
        if($id != NULL){
            //mostrar datos
            $data['contenido'] = 'usuario/edit';
            $data['selPerfil'] = $this->Model_Usuario->selPerfil();
            $data['datosUsuario'] = $this->Model_Usuario->editUsuario($id);
            $this->load->view('plantilla', $data);
        }else{
            //regresar a index enviar parametro
            redirect('');
        }
        
    }
    public function update(){
        $datos = $this->input->post();        
        if(isset($datos)){
            $txtci = $datos['txtci'];
            $txtNombre = $datos['txtNombre'];
            $txtFecha = $datos['txtFecha'];
            $txtdpto = $datos['txtdpto'];
            $this->Model_Usuario->updateUsuario($txtci, $txtNombre, $txtFecha, $txtdpto);
            redirect('');
        }
    }
    
}