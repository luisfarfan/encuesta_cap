<?php

class Adm_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllData_Persona() {
        $sql = "select departamento,provincia,distrito,id_persona,nombres,CONCAT(appat,' ',apmat) as apellidos,telefono,celular,edad,sexo from persona_by_ubigeo";
        $query = $this->db->query($sql);
        return $query->result_Array();
    }

    public function databyDepartamento($id) {
        $sql = "select departamento,provincia,distrito,id_persona,nombres,CONCAT(appat,' ',apmat) as apellidos,telefono,celular,edad,sexo from persona_by_ubigeo"
                . " where idDepa=$id";
        $query = $this->db->query($sql);
        return $query->result_Array();
    }

    public function databyProvincia($id) {
        $sql = "select departamento,provincia,distrito,id_persona,nombres,CONCAT(appat,' ',apmat) as apellidos,telefono,celular,edad,sexo from persona_by_ubigeo"
                . " where idProv=$id";
        $query = $this->db->query($sql);
        return $query->result_Array();
    }

    public function databyDistrito($id) {
        $sql = "select departamento,provincia,distrito,id_persona,nombres,CONCAT(appat,' ',apmat) as apellidos,telefono,celular,edad,sexo from persona_by_ubigeo"
                . " where idDist=$id";
        $query = $this->db->query($sql);
        return $query->result_Array();
    }

    public function chartDepa() {
        $sql = "select idDepa,departamento,count(idDepa) as cantidad from persona_by_ubigeo"
                . " group by idDepa having idDepa";
        $query = $this->db->query($sql);
        return $query->result_Array();
    }

    public function chartProv() {
        $sql = "select idProv,provincia,count(idProv) as cantidad from persona_by_ubigeo
group by idProv
having idProv;";
        $query = $this->db->query($sql);
        return $query->result_Array();
    }

    public function chartDist() {
        $sql = "select idDist,distrito,count(idDist) as cantidad from persona_by_ubigeo
group by idDist
having idDist;";
        $query = $this->db->query($sql);
        return $query->result_Array();
    }
    public function chartTopCursos(){
        $sql="select descripcion_curso,count(id_cursos) as cantidad from cursos_by_persona group by id_cursos having id_cursos
order by count(id_cursos) desc limit 5";
        $query=  $this->db->query($sql);
        return $query->result_Array();
    }
    public function detalleCursos(){
        $sql="select color_tr,nombre_tipo,idtipo_cursos,descripcion_curso,count(c.id_cursos) as cantidad,
CAST((select count(id_cursos) from cursos_by_persona csu where csu.id_cursos=c.id_cursos group by id_cursos)*100/
(select count(nombre_tipo) from cursos_by_persona csub where csub.idtipo_cursos=c.idtipo_cursos group by nombre_tipo) as decimal(4,1))
as porcentaje
from cursos_by_persona c
group by id_cursos";
        $query=$this->db->query($sql);
        return $query->result_Array();
    }
}
