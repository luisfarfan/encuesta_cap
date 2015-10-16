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

    public function get_otros() {

        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            echo $this->data_model->get_cursos_otros($q);
        }
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

    public function check() {
        $this->debug($this->data_model->check_cursos_otros());
    }

    public function guardar() {

        // VALIDAR OTROS Y GUARDARLOS, SI OTROS YA SE ENCUENTRA REPETIDO, O SON NUEVOS OTROS
        // 1R PROCESO
        $otros_new = array();
        $otros_rep = array();
        $count = 0;
        for ($i = 1; $i <= 3; $i++) {
            if ($_POST['otros' . $i] !== '') {
                if ($this->data_model->check_cursos_otros($_POST['otros' . $i]) > 0) {
                    $otros_rep[$i]['id_cursos'] = $this->data_model->get_id_otro($_POST['otros' . $i]);
                } else {
                    $count++;
                    $otros_new[$i]['descripcion_curso'] = $_POST['otros' . $i];
                    $otros_new[$i]['estado'] = 2;
                    $otros_new[$i]['idtipo_cursos'] = 6;
                }
            }
        }
        // AQUI HAGO EL PROCESO PARA OTROS REPETIDOS

        $this->debug($otros_new);
        foreach ($otros_new as $row => $value) {
            $this->debug($this->data_model->add_new_curso_otros($otros_new[$row]));
        }
        $last_otros = $this->data_model->get_last_curso($count);
        $this->debug($last_otros);


        // QUITANDO VALORES DE OTROS
        $this->debug($otros_rep);
        echo $count;
        for ($i = 1; $i <= 3; $i++) {
            unset($_POST['otros' . $i]);
        }
        //ASIGNO EL POST A $cursos para la insercion de los datos en el 2do proceso
        $cursos = $_POST['id_cursos'];
        unset($_POST['id_cursos']);
        //obtengo el id de la persona para la insercion en curso x persona
        $id_persona = $this->data_model->save($_POST);
        $this->debug($id_persona);
        $i = 0;
        $a = 0;
        foreach ($last_otros as $row => $value) {
            $a++;
            $array_otros_new[$a]['id_cursos'] = $value['id_cursos'];
            $array_otros_new[$a]['id_persona'] = $id_persona;
        }

        foreach ($otros_rep as $row => $value) {
            $i++;
            $array_otros[$i]['id_cursos'] = $value['id_cursos']->id_cursos;
            $array_otros[$i]['id_persona'] = $id_persona;
        }
        if (isset($array_otros)) {
            $this->debug($array_otros);
            $this->debug($this->data_model->save2($array_otros));
        }
        if (isset($array_otros_new)) {
            $this->debug($this->data_model->save2($array_otros_new));
            $this->debug($array_otros_new);
        }

        // AQUI TERMINA EL INSERTADO DE OTROS
        //2DO PROCESO----------------------------------------------------------------------------
//        $id_cursos = $this->data_model->save($_POST);
        $array = array();
        foreach ($cursos as $row) {

            $array = array(array('id_cursos' => $row, 'id_persona' => $id_persona));
            $this->data_model->save2($array);
        }
//        $nombres = $_POST['nombres'] . ' ' . $_POST['appat'] . ' ' . $_POST['apmat'];
//        session_start();
//        $_SESSION['nombres'] = $_POST['nombres'] . ' ' . $_POST['appat'] . ' ' . $_POST['apmat'];
////        $this->load->view('formulario/exito', $nombres);
//        $base = base_url();
//        redirect($base . 'index.php/encuesta/exito');
    }

    public function prueba() {
        $arr = array();
        for ($i = 1; $i <= 5; $i++) {
//        var_dump($_POST['otros'.$i]);
            if ($_POST['otros' . $i] !== '') {

                $arr = array(array('descripcion_curso' => $_POST['otros' . $i], 'estado' => 1, 'idtipo_cursos' => 6));
                $this->debug($arr);
                $this->debug($this->data_model->prueba($arr));
            }
        }

//        $this->debug($array);
    }

    public function getLastCurso() {

        $this->debug($this->data_model->get_last_curso(3));
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
