<?php
//if(isset($_SESSION['nombres'])){
session_start();
//var_dump($_SESSION['nombres']);
$nombres = $_SESSION['nombres'];
//}else{
//    header('Location:'.base_url().'index.php/encuesta');
//}
?>
<html>
    <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>

    <div class="row">
        <div class="col-sm-4 col-md-offset-4">
            <div class="thumbnail">

                <!--<div class="caption">-->
                <div class="panel panel-primary">
                    <div class="panel-body">
                        Escuela Nacional de Estadistica e Informatica (ENEI)
                    </div>
                    <div class="panel-footer">Muchas gracias.. <?php echo $nombres ?> la encuesta fue ejecutada correctamente. Para cualquier consulta no dude en escribirnos al correo: cursos@ine.gob.pe</div>
                </div>
                <p><a href="<?php echo base_url() ?>index.php/encuesta" class="btn btn-primary" role="button">Regresar a la encuesta</a></p>
                <!--</div>-->
            </div>
        </div>
    </div>
    <link href="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.js" rel="stylesheet" type="text/css"/>
</html>