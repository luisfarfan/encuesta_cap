<?php

class Administrator extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('data_model');
        $this->load->model('adm_model');
        $this->load->helper('url');
    }

    public function index() {
//        $data['todo']=  $this->data_model->getAll();
        $this->layout('administrator/index');
    }

    public function ubigeos() {
        $data['dpto'] = $this->data_model->getAllDpto();
        $data['chartDpto'] = $this->adm_model->chartDepa();
        $data['chartProv'] = $this->adm_model->chartProv();
        $data['chartDist'] = $this->adm_model->chartDist();
        $this->layout('administrator/ubigeo', $data);
    }
    public function topcursos(){
        $data['topcursos']=  $this->adm_model->chartTopCursos();
        $this->layout('administrator/topcursos',$data);
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

}
