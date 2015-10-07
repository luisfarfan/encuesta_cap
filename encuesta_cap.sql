
-- ----------------------------
-- View structure for cursos_by_persona
-- ----------------------------
DROP VIEW IF EXISTS cursos_by_persona;
CREATE VIEW cursos_by_persona AS select 
tc.color_tr AS color_tr,tc.idtipo_cursos AS idtipo_cursos,tc.nombre_tipo AS nombre_tipo,cp.id_cursos
AS id_cursos,c.descripcion_curso AS descripcion_curso,cp.id_persona AS id_persona
from ((cursos_has_datos_personales cp join cursos c on((c.id_cursos = cp.id_cursos))) join tipo_cursos
tc on((tc.idtipo_cursos = c.idtipo_cursos))) order by cp.id_cursos ;

-- ----------------------------
-- View structure for dist_by_provincia_by_dpto
-- ----------------------------
DROP VIEW IF EXISTS dist_by_provincia_by_dpto;
CREATE VIEW dist_by_provincia_by_dpto AS select ud.idDist AS idDist,ud.distrito AS distrito,ud.idProv AS idProv,up.provincia AS provincia,up.idDepa AS idDepa,udp.departamento AS departamento from ((ubdistrito ud join ubprovincia up on((ud.idProv = up.idProv))) join ubdepartamento udp on((udp.idDepa = up.idDepa))) ;

-- ----------------------------
-- View structure for persona_by_ubigeo
-- ----------------------------
DROP VIEW IF EXISTS persona_by_ubigeo;
CREATE VIEW persona_by_ubigeo AS select
 dp.id_persona AS id_persona,dp.nombres AS nombres,dp.appat AS appat,dp.apmat AS apmat,dp.correo AS correo,dp.telefono AS telefono,dp.celular AS celular,dp.edad AS edad,dp.sexo AS sexo,dp.idDist AS idDist,dp.idinstituciones_publicas AS idinstituciones_publicas,dp.area AS area,dp.sugerencias AS sugerencias,vdpd.distrito AS distrito,vdpd.idProv AS idProv,vdpd.provincia AS provincia,vdpd.idDepa AS idDepa,vdpd.departamento AS departamento from (datos_personales dp join dist_by_provincia_by_dpto vdpd on((dp.idDist = vdpd.idDist))) ;
