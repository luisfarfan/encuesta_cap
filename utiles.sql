/*
Reporte por Departamente, provincia y distrito de residencia.
Querremos saber la cantidad y detalle de participantes de la encuesta por estos 3 datos de ubigeo.
Encuestados por Sexo.
Cantidad y detalle de encuestados por Institución.
Esto debe ser cerrado. Colocar un combo con las instituciones publicas.
Encuestados por rango de edades. Solo mayores de edad.
Top 10 de cursos. Cuales son los cursos más requeridos.
Top 5 por tipo de curso. Los 5 cursos más botados de Economia, de estadística, de informática, etc.
*/

select dp.*,descripcion_curso from datos_personales dp inner join cursos_by_persona cp on dp.id_persona=cp.id_persona


drop view cursos_by_persona;
create view cursos_by_persona
as 
select tc.idtipo_cursos,nombre_tipo,cp.id_cursos,descripcion_curso,id_persona from cursos_has_datos_personales cp inner join cursos c on
c.id_cursos=cp.id_cursos inner join tipo_cursos tc on
tc.idtipo_cursos=c.idtipo_cursos order by id_cursos;
select * from cursos_by_persona order by descripcion_curso;

drop view dist_by_provincia_by_dpto;
create view dist_by_provincia_by_dpto
as
select idDist,distrito,ud.idProv,provincia,up.idDepa,departamento from ubdistrito ud inner join ubprovincia up
on ud.idProv=up.idProv inner join ubdepartamento udp on udp.idDepa=up.idDepa;
select * from dist_by_provincia_by_dpto;

drop view persona_by_ubigeo;
create view persona_by_ubigeo
as
select dp.*,distrito,idProv,provincia,idDepa,departamento from datos_personales dp
inner join dist_by_provincia_by_dpto vdpd on dp.idDist=vdpd.idDist;

select  * from persona_by_ubigeo where idProv=3;

select idDepa,departamento,count(idDepa) as cantidad from persona_by_ubigeo
group by idDepa
having idDepa;

select idProv,provincia,count(idProv) as cantidad from persona_by_ubigeo
group by idProv
having idProv;

select idDist,distrito,count(idDist) as cantidad from persona_by_ubigeo
group by idDist
having idDist;


SELECT cp.id_persona,nombres,appat,apmat, GROUP_CONCAT(descripcion_curso SEPARATOR ' , ') as cursos
FROM cursos_by_persona cp inner join datos_personales dp on cp.id_persona=dp.id_persona
group by cp.id_persona


-- Top 10 Cursos
select descripcion_curso,count(id_cursos) as cantidad from cursos_by_persona group by id_cursos having id_cursos
order by count(id_cursos) desc limit 5 
