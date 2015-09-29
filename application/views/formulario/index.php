
<html>
    <head>
        <title>Encuesta de Necesidades de Capacitaci&oacute;n 2011</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--<link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>-->
        <!--<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.js" type="text/javascript"></script>-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/estilo.css">
        <script language="javascript" src="<?php echo base_url() ?>assets/js/comun.js"></script>
        <script language="javascript" src="<?php echo base_url() ?>assets/js/ubigeo.js"></script>
        <script language="javascript" src="<?php echo base_url() ?>assets/js/LN.js"></script>
        
        <style>
            .error{
                color: red;
            }
        </style>
    </head>
    <body>
        <form action="<?php echo base_url() ?>index.php/encuesta/guardar"  name="frm" id="frm_id" method="POST" accept-charset="utf-8">
            <table align="center" cellspacing="0" cellpadding="2" width="969">
                <tr>
                    <td width="963" align="center">
                        <table align="center" width="100%">
                            <tr>
                                <td><img src="<?php echo base_url() ?>assets/images/logo_inei.gif" border=0 /></td>
                                <td class="titulo">
                                    <div align="center"><strong>ENCUESTA DE NECESIDADES  DE CAPACITACI&Oacute;N 2015</strong></div>
                                </td>
                                <td><img src="<?php echo base_url() ?>assets/images/logo_enei.gif" border=0 /></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    
                <tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <?php //echo form_open('guardar',array('id'=>'frm','name'=>'frm')) ?>

                <tr>
                    <td class="grupo">I. OBJETIVOS</td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li>Identificar los requerimientos  de capacitaci&oacute;n a fin de elaborar el <em>Plan  de Capacitaci&oacute;n 2015</em>, cuyo desarrollo permitir&aacute; fortalecer, actualizar y  mejorar los conocimientos de los trabajadores del INEI, del SEN y de otras  instituciones</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp; </td>
                </tr>
                <tr>
                    <td class="grupo">II. DATOS PERSONALES<a id="b2"/></td>
                </tr>
                <tr>
                    <td><span class="rojo"> Datos Obligatorios.</span> </td>
                </tr>
                <tr>
                    <!-- Cuadro de Datos -->
                    <td>
                        <table border="0" cellspacing="0" cellpadding="2" align="center" width="100%">
                            <tr class="subgrupo">
                                <td>Nombres </td>
                                <td>&nbsp;</td>
                                <td>Apellido Paterno</td>
                                <td>&nbsp;</td>
                                <td>Apellido Materno</td>
                            </tr>
                            <tr>
                                <td>
                                    <input 
                                        type="text" 
                                        id="nombres"
                                        name="nombres"
                                        style="width:200px;" 
                                        onkeypress="return alfabetoNombre(event)" 
                                        maxlength="50"  
                                        onBlur="acceptLiteral(this);"
                                        class="upper"
                                        title="Por favor, ingrese sus nombres"
                                        required
                                        /> <span class="rojo"></span> <span id="r1"></span> 
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    <input 
                                        maxlength="50" 
                                        type="text" 
                                        id="appat" name="appat" 
                                        style="width:200px;" 
                                        onkeypress="return alfabetoNombre(event)" 
                                        onBlur="acceptLiteralPat(this);"
                                        class="upper"
                                        title="Por favor, ingrese sus apellidos"
                                        required
                                        /> <span class="rojo"></span> <span id="r2"></span> 
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    <input 
                                        maxlength="50" 
                                        type="text" 
                                        id="apmat" name="apmat" 
                                        style="width:200px;" 
                                        onkeypress="return alfabetoNombre(event)" 
                                        onBlur="acceptLiteralMat(this);"
                                        class="upper"
                                        title="Por favor, ingrese su apellido materno"
                                        required
                                        /> <span class="rojo"></span> <span id="r3"></span> 
                                </td>
                            </tr>
                            <tr class="subgrupo">
                                <td>Institución</td>
                                <td>&nbsp;</td>
                                <td>Dirección o area</td>
                                <td>&nbsp;</td>
                                <td>Correo Electr�nico</td>
                            </tr>
                            <tr>
                                <td><select name="idinstituciones_publicas" id="idinstituciones_publicas" title="Debe seleccionar una institucion Publica" required>
                                        <option>Seleccione...</option>    
                                    <?php
                                        
                                        foreach ($instituciones as $row) {
                                            echo '<option value=' . $row['idinstituciones_publicas'] . '>' . $row['entidad'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <span id="r4"></span> 
                                </td>
                                <td>&nbsp;</td>
                                <td><input 

                                        type="text" 
                                        id="area"
                                        name="area"
                                        style="width:200px;" 
                                        onkeypress="return acceptTxt(event)" 
                                        maxlength="300"
                                        class="upper" title="Debe escribir el area a donde pertenece" required /> 
                                    <span id="r5"></span> 
                                </td>
                                <td>&nbsp;</td>
                                <td><input 

                                        type="text" 
                                        id="correo" name="correo" 
                                        style="width:200px;" 
                                        onblur="acceptCorreo(this)" 
                                        maxlength="200"  
                                        class="upper" /> <span class="rojo"></span> <span id="r6"></span> </td>
                            </tr>
                            <tr class="subgrupo">
                                <td colspan="5">Lugar Donde Reside </td>
                            </tr>
                            <tr>
                                <td>
                                    Departamento 
                                    <select id="cmbDpto" style="width:150px;" title="Debe seleccionar su departamento" required>
                                        <option>---SELECCIONE</option>
                                        <?php
                                        foreach ($dpto as $row) {
                                            echo "<option value=$row[idDepa]>$row[departamento]</option>";
                                        }
                                        ?>
                                    </select> <span class="rojo"></span> <span id="r7"></span> 
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    Provincia 
                                    <select id="cmbProv" style="width:150px;" title="Debe seleccionar su Provincia" required>
                                        <option value="-1">Seleccione ...</option>
                                    </select>
                                    <span class="rojo"></span> <span id="r8"></span> 
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    Distrito 
                                    <select id="cmbDist" name="idDist" style="width:150px;" title="Debe seleccionar su Distrito" required>
                                        <option>Seleccione ...</option>
                                    </select>
                                    <span class="rojo"></span> <span id="r9"></span> 
                                </td>
                            </tr>
                            <tr class="subgrupo">
                                <td>Teléfono</td>
                                <td>&nbsp;</td>
                                <td>Edad</td>
                                <td>&nbsp;</td>
                                <td>Sexo</td>
                            </tr>
                            <tr>
                                <td>Fijo 
                                    <input type="text" id="telefono" name="telefono" style="width:80px;"  maxlength="10" onkeypress="return numero(event)" 
                                           />&nbsp;Celular 
                                    <input 
                                        type="text" 
                                        id="celular" name="celular" 
                                        style="width:80px;" 
                                        maxlength="10" 
                                        onkeypress="return numero(event)" 
                                        />  <span id="r10"></span> 
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    <input 
                                        type="text"
                                        id="edad" name="edad" 
                                        style="width:50px;" 
                                        onKeyPress="return numero(event)" 
                                        maxlength="2" 
                                        /> 
                                    a&ntilde;os<span class="rojo"></span> <span id="r11"></span> 
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    <select id="sexo" name="sexo">
                                        <option>Seleccione..</option>
                                        <option value="1">Femenino</option>
                                        <option value="2">Masculino</option>
                                    </select>
                                    <span class="rojo"></span> <span id="r12"></span> 
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp; </td>
                </tr>
                <tr>
                    <td class="grupo"><a id="b3" />III. NECESIDADES DE CAPACITACI�N &nbsp;<span id="r14"></span></td>
                </tr>
                <tr>
                    <td>Marque con un <img src="<?php echo base_url() ?>assets/images/ok.gif" width="16" height="16"> el o los cursos de su inter&eacute;s para actualizar y fortalecer su desarrollo profesional y laboral.</td>
                </tr>
                <tr>
                    <td>
                        <table align="center" width="100%" id="parte3">
                            <tbody>

                                <?php
                                $grupo = array();
                                foreach ($cursos_tipo as $row) {
                                    $grupo[$row['nombre_tipo']][] = $row;
                                }
                                foreach ($grupo as $row => $values) {
                                    ?>
                                    <tr class="subgrupo">
                                        <td colspan="5"><strong><?php echo $row ?></strong></td>
                                    </tr>

                                    <tr onmouseover="this.style.backgroundColor = '#EAF3FB'" onmouseout="this.style.backgroundColor = ''">
                                        <?php
                                        $count = 0;

                                        foreach ($values as $value => $v) {
                                            $count++;
                                            //echo $count;
                                            if ($count % 2 == 0) {
                                                ?>
                                                <td><?php echo $count . '. ' . $v['descripcion_curso'] ?></td>
                                                <td><input type="checkbox" value="<?php echo $v['id_cursos'] ?>" name="id_cursos[]" id="<?php echo 'id' . $v['id_cursos'] ?>"/></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        <?php } else {
                                            ?>
                                            <tr onmouseover="this.style.backgroundColor = '#EAF3FB'" onmouseout="this.style.backgroundColor = ''">
                                                <td><?php echo $count . '. ' . $v['descripcion_curso'] ?></td>
                                                <td><input type="checkbox" value="<?php echo $v['id_cursos'] ?>" name="id_cursos[]" id="<?php echo $v['id_cursos'] ?>"/></td>
                                                <td>&nbsp;</td>
                                            <?php } //echo '</tr>';
                                            ?>
                                            <?php
                                        }
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp; </td>
                </tr>
                <tr>
                    <td class="grupo">IV. SUGERENCIAS Y OPINIONES</td>
                </tr>
                <tr>
                    <td>
                        <table width="100%">
                            <tr class="subgrupo">
                                <td>1. Indique en que cursos adicionales requiere capacitarse</td>
                            </tr>
                            <tr>
                                <td align="center"><textarea id="sugenrencias" name="sugerencias" class="upper" ></textarea></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="submit" class="boton" id="btnEnviar" value="Enviar" /></td>
                </tr>

                <tr>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td>&nbsp; </td>
                </tr>

                <tr>
                    <td class="pie" align="center" bgcolor="#0F83E1">Copyright � INEI 2015. Derechos Reservados</td>
                </tr>
            </table>
           
        </form>
    </body>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/my_js/index.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/jquery.validate.js"></script>
    <script>
//
    $('#frm_id').submit(function(){
        var checked=$('#parte3 :checked').length;
        if(checked===0){
            alert("Tiene que marcar al menos 1 curso");
            return false;
        }else{

        }
    });
                                    $().ready(function () {

                                       var container = $('div.container');
                                        // validate the form when it is submitted
                                        var validator = $("#frm_id").validate({
                                            errorContainer: container,
                                            errorLabelContainer: $("ol", container),
                                            wrapper: 'li'
                                        });
                                        $(".cancel").click(function () {
                                            validator.resetForm();
                                        });
                                    });
    </script>
    <script>


        var base_url = window.location.origin;
        $("#cmbDpto").on('change', function () {
            $.ajax({
                url: '<?php echo base_url() ?>index.php/encuesta/getProvincias/' + this.value,
                success: function (response, textStatus, jqXHR) {
                    $('#cmbProv').html('<option>Seleccione..</option>'+response);
                    $('#cmbDist').empty();
                    $('#cmbDist').html('<option>Seleccione..</option>');
                }
            })
        });
        $("#cmbProv").on('change', function () {
            $.ajax({
                url: '<?php echo base_url() ?>index.php/encuesta/getDistritos/' + this.value,
                success: function (response, textStatus, jqXHR) {
                    $('#cmbDist').html('<option>Seleccione..</option>'+response);
                }
            });
        });
        


    </script>
</html>