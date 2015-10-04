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
//        var_dump($deta);
//        foreach ($deta as $row => $value) {
//            echo $value->idtipo_cursos;
//        }
            ?>
            <div class="box-body">
                <table class="table table-bordered table-responsive">
                    <th>Área</th>
                    <th>Curso</th>
                    <th>Frecuencia</th>
                    <th>Porcentaje</th>

                    <?php
                    foreach ($deta as $row => $value) {
                        echo '<tr>';
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
