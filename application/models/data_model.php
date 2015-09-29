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
        return $this->db->get('cursos')->result_Array();
    }

    public function getTipoCursos() {
        return $this->db->get('tipo_cursos')->result_Array();
    }

    public function getCursosbyTipo() {
        $sql = "select nombre_tipo,c.idtipo_cursos,id_cursos,descripcion_curso from cursos"
                . " c inner join tipo_cursos tc"
                . " on tc.idtipo_cursos=c.idtipo_cursos";
        $query = $this->db->query($sql);

        return $query->result_Array();
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

}
