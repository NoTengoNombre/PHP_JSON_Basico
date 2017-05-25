<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_documentos extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Sube el documento tanto del nombre , archivo como el idusr
     * 
     * @param type $data
     * @param type $archivoId
     * @param type $idusr
     */
    public function uploadDocument($data, $archivoId, $idusr) {

        $date = date('d/m/Y', time());

//Crea un array de documentos
        $documentos = array(
            'titulo' => $data['url'],
            'notas' => $data['notas'],
            'estado' => 0,
            'usuario_id' => $idusr,
            'fecha_creacion' => $date,
        );

//Hace una inserccion del array de datos
        $this->db->set($documentos);
        $this->db->insert('documentos');
//        $query = $this->db->insert('documentos');

        $archivos = array(
            'id_archivo' => $archivoId,
            'id_documento' => $this->db->insert_id(), // inserta el ultimo id del documento
            'nombre_archivo' => $data['nombreConjunto'],
        );

//Hace una inserccion del         
        $this->db->set($archivos);
        $this->db->insert('archivo');
    }

    /**
     * Funcion que devuelve la ultima fila de la tabla con el id_archivo 
     * 
     * @return int
     */
    public function getLastArchivoId() {

        $this->db->select('id_archivo');
        $this->db->order_by('id_archivo', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get('archivo');

        $lastId = $query->result_array();

        var_dump($lastId);

        if (!$lastId) {
            return 1;
        } else {
            return $lastId[0]['id_archivo'];
        }
    }

    /**
     * Funcion permite descargar archivos a su escritorio 
     * 
     * @param type $name
     */
    public function downloadDocument($name) {

        $this->load->helper('download');
        force_download('uploads/' . $name, NULL);
    }

    /**
     * Todos los 'datos' del documentos 
     * para el panel de administracion
     * 
     * @return type string JSON
     */
    public function getDocumentInfo() {

        $this->db->select('*');
        $this->db->join('documentos', 'documentos.documento_id = archivo.id_documento');
        $this->db->join('usuarios', 'documentos.usuario_id = usuarios.usuario_id');

        $query = $this->db->get('archivo');

        $docInfo = $query->result_array();

        $docInfoJson = json_encode($docInfo);

        return $docInfoJson;
    }

    /**
     * Pasamos "idusr" para
     * obtener los 'documentos'
     * relacionados y pasarlos de array a JSON
     * 
     * @param type $idusr
     * 
     * @return type string JSON
     */
    public function getDocumentInfoUser($idusr) {

        $this->db->select('*');
        $this->db->join('documentos', 'documentos.documento_id = archivo.id_documento and usuario_id = ' . $idusr);

        $query = $this->db->get('archivo');

        $docInfo = $query->result_array();

        $docInfoJson = json_encode($docInfo);

        return $docInfoJson;
    }
    
    /**
     * Obtener todos los elementos de la bd Documentos
     * 
     * @return type
     */
    public function get_all_documentos(){
        $documentos = $this->db->query('SELECT * FROM documentos');
        return $documentos;
    }

}
