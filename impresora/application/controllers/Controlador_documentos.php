<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controlador_documentos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('modelo_documentos');
    }

    /**
     * Subir archivo al servidor
     * mediate un formulario
     */
    public function uploadDocument() {
// Configuración de los archivos que se van a subir       
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 5000;

//Recibe del formulario el numeroDocumentos  
        $numeroDocumentos = $this->input->post('numeroDocumentos');

//Obtengo todos los valores del 'Array Asociativo' $session         
        $session = $this->session->get_userdata();
                    //  '__ci_last_regenerate' => int 1496512944
                    //  'idusr' => string '1' (length=1)
                    //  'tipousr' => string '1' (length=1)
                    //  'nombreusr' => string 'u' (length=1)

#Creo 'string' con la variable de session        
        $idusr = $session['idusr'];

//Subir archivo con la configuracion
        $this->load->library('upload', $config);

//        
        $archivoId = $this->modelo_documentos->getLastArchivoId() + 1;

        for ($i = 1; $i < $numeroDocumentos + 1; $i++) {
            
            echo $i;
            
            if (!$this->upload->do_upload('documento' . $i)) {
                echo '<h1>no entra</h1>';
                $error = array('error' => $this->upload->display_errors());
            } else {

                echo '<h1>entra</h1>';
                $upload = array('upload_data' => $this->upload->data());
                $name = $upload['upload_data']['file_name'];
                $data = array(
                    'nombreConjunto' => $this->input->post('nombre'),
                    'notas' => $this->input->post('notas'),
                    'numeroDocumentos' => $numeroDocumentos,
                    'url' => $name,
                    'documentoId' => 1,
                );
                $this->modelo_documentos->uploadDocument($data, $archivoId, $idusr);
            }
        }
    }

    public function downloadDocument($name) {
        $this->modelo_documentos->downloadDocument($name);
    }

    public function getDocumentInfoAdmin() {
        $info = $this->modelo_documentos->getDocumentInfo();
        return $info;
    }

    public function ver_documentos() {

        $session = $this->session->get_userdata();
        $idusr = $session['idusr'];
        $info = $this->modelo_documentos->getDocumentInfoUser($idusr);
        $data = array("info" => $info);
        $data['pagina'] = 'usuarios/ver_documentos';
        $this->load->view('conjunto_vistas', $data);
    }

    public function subir_documentos() {
        $data['pagina'] = 'usuarios/subir_documentos';
        $this->load->view('conjunto_vistas', $data);
    }

    public function cambiar_estado($id) {
        $data = array('estado' => 1);
        echo $id;
        $this->db->where('documento_id', $id);
        $this->db->update('documentos', $data);
    }

}
