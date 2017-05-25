<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Objetivo : Volcar los datos a las VISTAS usando 'funciones' del MODELO
 * 
 */
class Controlador_documentos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('modelo_documentos');
    }

    /**
     * Subir varios archivos
     */
    public function uploadDocument() {
//Configuracion de los archivos
        $config['upload_path'] = './uploads/'; // ruta
        $config['allowed_types'] = 'pdf|doc|docx|word|odt|odp|ppt|zip'; // tipos de archivo a subir
        $config['max_size'] = 5000; // tamaño

//Valor que viene del formulario
        $numeroDocumentos = $this->input->get_post('numeroDocumentos');
// Obtenemos la variable de "session" con los valores de la session creados anteriormente
        $session = $this->session->get_userdata();
// creamos la variable de 'session' con el numero del 'idusr'
        $idusr = $session['idusr'];
// cargamos la libreria upload y agregamos la configuración de los archivos que se pueden subir
        $this->load->library('upload', $config);

// Se almacena la ultima fila de los documentos
        $archivoId = $this->modelo_documentos->getLastArchivoId() + 1;

// Se recorre el numero de documentos subidos       
        for ($i = 1; $i < $numeroDocumentos + 1; $i++) {
            
            echo $i;
            
            if (!$this->upload->do_upload('documento' . $i)) {
            
                echo '<h1>no entra</h1>';
                
                $error = array('error' => $this->upload->display_errors('<p> !! Error en la subida de archivos !! ', '</p>'));

                //$this->load->view('upload_form', $error);
                
            } else {

                echo '<h1>entra</h1>';
                /* $documentoId = $this->getNewDocumentoId(); //hacerla, saca documento id no usada */
                $upload = array('upload_data' => $this->upload->data());
                
                $name = $upload['upload_data']['file_name'];
                
                $data = array(
                    'nombreConjunto' => $this->input->get_post('nombre'),
                    'notas' => $this->input->get_post('notas'),
                    'numeroDocumentos' => $numeroDocumentos,
                    'url' => $name,
                    'documentoId' => 1,
                );
                
                $this->modelo_documentos->uploadDocument($data, $archivoId, $idusr);

                $this->load->view('upload_success', $data);
            }
        }
    }

    /**
     * Obtiene 
     * @param type $name
     */
    public function downloadDocument($name) {
        $this->modelo_documentos->downloadDocument($name);
    }

    /**
     * 
     */
    public function getDocumentInfoAdmin() {
//        getDocumentInfo = devuelve un json
        $info = $this->modelo_documentos->getDocumentInfo();
        $data = array("info" => $info);
        $this->load->view('panel/documentos_admin', $data);
    }

    /**
     * Ver todos los documentos mediante el 'Id' del usuario
     */
    public function ver_documentos() {
// Obtiene las variable de 'session'
        $session = $this->session->get_userdata();
// Obtiene variable con el 'idusr'        
        $idusr = $session['idusr'];
// Obtenemos del 'modelo'        
        $info = $this->modelo_documentos->getDocumentInfoUser($idusr);
        $data = array("info" => $info);
        $this->load->view('usuarios/ver_documentos', $data);
    }
     

    /**
     * Vista para subir archivos
     */
    public function subir_documentos() {
        $this->load->view('usuarios/subir_documentos');
    }
    
    /**
     * 
     */
    public function obtener_todos_documentos(){
        $documentos = $this->modelo_documentos->get_all_documentos();
        $this->load->view('?', $documentos);
    }

}
