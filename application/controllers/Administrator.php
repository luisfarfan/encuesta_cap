<?php

class Administrator extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('data_model');
        $this->load->model('adm_model');
        $this->load->helper('url');
    }

    public function index() {
        $data = array('detacursos' => $this->detallebyCantidad_Percent());
        $this->layout('administrator/index', $data);
    }

    public function ubigeos() {
        $data['dpto'] = $this->data_model->getAllDpto();
        $data['chartDpto'] = $this->adm_model->chartDepa();
        $data['chartProv'] = $this->adm_model->chartProv();
        $data['chartDist'] = $this->adm_model->chartDist();
        $this->layout('administrator/ubigeo', $data);
    }

    public function topcursos() {
        $data['topcursos'] = $this->adm_model->chartTopCursos();
        $this->layout('administrator/topcursos', $data);
    }

    public function chartubigeos() {
        $data['chartDpto'] = $this->adm_model->chartDepa();
        $data['chartProv'] = $this->adm_model->chartProv();
        $data['chartDist'] = $this->adm_model->chartDist();

        $this->load->view('administrator/chartubigeo', $data);
    }

    public function layout($mid = false, $data = false) {
        $this->load->view('layout/header');
        $this->load->view($mid, $data);
        $this->load->view('layout/footer');
    }

    public function getDataPersona() {
        $data = $this->adm_model->getAllData_Persona();
//        var_dump(json_encode($data));
        echo json_encode($data);
//        return json_encode($data);
    }

    public function getDataPersonabyDepartamento($iddepa) {
        $data = $this->adm_model->databyDepartamento($iddepa);
        echo json_encode($data);
    }

    public function getDataPersonabyProvincia($idprov) {
        $data = $this->adm_model->databyProvincia($idprov);
        echo json_encode($data);
    }

    public function getDataPersonabyDistrito($iddist) {
        $data = $this->adm_model->databyDistrito($iddist);
        echo json_encode($data);
    }

    public function detallebyCantidad_Percent() {
        $deta = $this->adm_model->detalleCursos();
        return json_encode($deta);
    }

    public function getLastCurso() {

        echo $this->adm_model->get_last_curso();
    }

    public function prueba() {
        
    }

    function debug() {
        $trace = debug_backtrace();
        $rootPath = dirname(dirname(__FILE__));
        $file = str_replace($rootPath, '', $trace[0]['file']);
        $line = $trace[0]['line'];
        $var = $trace[0]['args'][0];
        $lineInfo = sprintf('<div><strong>%s</strong> (line <strong>%s</strong>)</div>', $file, $line);
        $debugInfo = sprintf('<pre>%s</pre>', print_r($var, true));
        print_r($lineInfo . $debugInfo);
    }

}
