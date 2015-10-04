<?php

class Encuesta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('data_model');
    }

    public function index($data2 = false) {
        $data['cursos_tipo'] = $this->data_model->getCursosbyTipo();
        $data['dpto'] = $this->data_model->getAllDpto();
        $data['instituciones'] = $this->data_model->getAllInstituciones();
        if ($data2) {
            $data['exito'] = $data2;
        }
        $this->load->view('formulario/index', $data);
    }

    public function exito() {
        $this->load->view('formulario/exito');
    }

    public function getDepartamentos() {
        $data = $this->data_model->getAllDpto();
        foreach ($data as $row) {
            echo "<option value=$row[idDepa]>$row[departamento]</option>";
        }
    }

    public function getProvincias($idDpto) {
        $data = $this->data_model->getAllProvincias($idDpto);
//        echo '<option>Seleccione...</option>';
        foreach ($data as $row) {
            echo "<option value=$row[idProv]>$row[provincia]</option>";
        }
    }

    public function getDistritos($idProv) {
        $data = $this->data_model->getAllDistritos($idProv);
        echo '<option>Seleccione...</option>';
        foreach ($data as $row) {
            echo "<option value=$row[idDist]>$row[distrito]</option>";
        }
    }

    public function getCursos() {
        $data = $this->data_model->getCursos();
        echo '<pre>';
        var_dump($data);
    }

    public function getInstituciones() {
        $data = $this->data_model->getAllInstituciones();
        echo '<pre>';
        var_dump($data);
    }

    public function getCursosbyTipo() {
        $data = $this->data_model->getCursosbyTipo();
        return $data;
    }

    public function guardar() {

        if (!$_SESSION['enviado']) {
            $cursos = $_POST['id_cursos'];
            //$this->debug($cursos);
            unset($_POST['id_cursos']);
            $id_cursos = $this->data_model->save($_POST);
            $array = array();
            foreach ($cursos as $row) {
                $array = array(array('id_cursos' => $row, 'id_persona' => $id_cursos));
                $this->data_model->save2($array);
            }
            $nombres['nombres'] = $_POST['nombres'] . ' ' . $_POST['appat'] . ' ' . $_POST['apmat'];
            $_SESSION['enviado'] = true;
            $this->load->view('formulario/exito', $nombres);
        } else {
            $nombres['nombres'] = $_POST['nombres'] . ' ' . $_POST['appat'] . ' ' . $_POST['apmat'];
//            $_SESSION['enviado'] = true;
            $this->load->view('formulario/exito', $nombres);
        }
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
