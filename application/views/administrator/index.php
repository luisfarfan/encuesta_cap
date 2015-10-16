<style>
    .class1{
        background-color: yellowgreen;
    }
    .class2{
        background-color: gold;
    }
    .class3{
        background-color: aqua;
    }
    .class4{
        background-color: lightblue;
    }
    .class5{
        background-color: antiquewhite;
    }

</style>
<section class = "content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Reporte de respuestas sobre líneas de capacitación</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
            <?php
//        var_dump($detacursos);

            $deta = json_decode($detacursos);
            echo '<pre>';
            var_dump($deta);
            foreach ($deta as $row => $value) {
                if ($deta[$row]['cantidad'] === 0) {
                    unset($deta[$row]);
                }
            }
            var_dump($deta);
//        var_dump($deta);
//        foreach ($deta as $row => $value) {
//            echo $value->idtipo_cursos;
//        }
            ?>
            <div class="box-body">
                <button id="btnExport" class="btn-bitbucket">Generar Excel</button>
                <table id="tableExport" class="table table-bordered table-responsive">
                    <th>Área</th>
                    <th>Curso</th>
                    <th>Frecuencia</th>
                    <th>Porcentaje</th>

                    <?php
                    $count = 0;
                    foreach ($deta as $row => $value) {
                        $count++;

                        echo "<tr id='color$count' style='background-color:$value->color_tr'>";
                        echo '<td>' . $value->nombre_tipo . '</td>';
                        echo '<td>' . $value->descripcion_curso . '</td>';
                        echo '<td>' . $value->cantidad . '</td>';
                        echo '<td>' . $value->porcentaje . '</td>';
                        echo '</tr>';
                    }
//                        echo '<td>' . $value->nombre_tipo . '</td>';
                    ?>

                </table>
            </div>

        </div>


    </div>
