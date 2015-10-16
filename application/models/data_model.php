<?php

class Data_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllDpto() {
        $query = $this->db->get('ubdepartamento');

        return $query->result_Array();
    }

    public function getAllProvincias($idDpto) {
        $this->db->where('idDepa', $idDpto);
        $query = $this->db->get('ubprovincia');
        return $query->result_Array();
    }

    public function getAllDistritos($idProv) {
        $this->db->where('idProv', $idProv);
        $query = $this->db->get('ubdistrito');
        return $query->result_Array();
    }

    public function getCursos() {
        return $this->db->where('estado', 1)->get('cursos')->result_Array();
    }

    public function getTipoCursos() {
        return $this->db->get('tipo_cursos')->result_Array();
    }

    public function getCursosbyTipo() {
        $sql = "select nombre_tipo,c.idtipo_cursos,id_cursos,descripcion_curso from cursos"
                . " c inner join tipo_cursos tc"
                . " on tc.idtipo_cursos=c.idtipo_cursos where c.estado=1";
        $query = $this->db->query($sql);

        return $query->result_Array();
    }

    public function get_cursos_otrosas() {
        $this->db->select('descripcion_curso');
        $this->db->where('idtipo_cursos', 6);
        $query = $this->db->get('cursos');

        return $query->result_Array();
    }

    public function get_cursos_otros($q) {
        $sql = "select descripcion_curso from cursos where idtipo_cursos=6 and descripcion_curso like '%$q%'";
        $query = $this->db->query($sql);

        foreach ($query->result_array() as $row) {
            $row_set[] = htmlentities(stripslashes($row['descripcion_curso'])); //build an array
        }
        return json_encode($row_set); //format the array into json data
    }

    public function getAllInstituciones() {
        $this->db->order_by("entidad", "asc");
        $query = $this->db->get('instituciones_publicas');

        return $query->result_Array();
    }

    public function save($data) {
        $this->db->insert('datos_personales', $data);

        //return $this->db->affected_rows();
        return $this->db->insert_id();
    }

    public function save2($data) {
        $this->db->insert_batch('cursos_has_datos_personales', $data);
        return $this->db->error();
    }

    public function prueba($data) {
        $this->db->insert_batch('cursos', $data);
        return $this->db->error();
    }

    public function check_cursos_otros($curso) {
        $sql = "select descripcion_curso from cursos where descripcion_curso='$curso'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function add_new_curso_otros($data) {
        $this->db->insert('cursos', $data);
        return $this->db->affected_rows();
    }

    public function get_id_otro($descripcion) {
        $sql = "select id_cursos from cursos where descripcion_curso='$descripcion'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function sumar_otros() {
        $sql = " cursos where descripcion_curso='$curso'";
    }

    public function get_last_curso($limit) {
        $sql = "SELECT id_cursos FROM cursos where id_cursos order by id_cursos desc limit 0,$limit";
        $query = $this->db->query($sql);

        return $query->result_Array();
    }

}
