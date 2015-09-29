<section class = "content">
    <div class="container">
    <div class="col-md-3 col-lg-3">
        <select id="departamentos" class="form-control">
            <option>Seleccione...</option>
            <?php
            foreach ($dpto as $row) {
                echo "<option value=$row[idDepa]>$row[departamento]</option>";
            }
            ?>
        </select>
    </div>
    <div class="col-md-3 col-lg-3">
        <select class="form-control" id="provincias" name="provincias">
        <option>Seleccione...</option>
        </select>
    </div>

    <div class="col-md-3 col-lg-3">
        <select class="form-control" id="distritos" name="distritos">
            <option>Seleccione...</option>
        </select>
    </div>
    
    <div style="padding-top: 50px" class="col-md-11 col-lg-11">
        <table id="table" data-search="true" data-show-export="true" data-show-columns="true" data-pagination="true" class="table table-responsive table-hover table-condensed"
               data-toggle="table"
               data-toolbar=".toolbar"
               data-url="getDataPersona">
           
            <thead>
            <tr>
                <th data-field="id_persona">ID</th>
                <th data-field="nombres">Nombres</th>
                <th data-field="apellidos">Apellidos</th>
                <th data-field="telefono">Telefono</th>
                <th data-field="celular">Celular</th>
                <th data-field="edad">Edad</th>
                <th data-field="sexo">Sexo</th>
                <th data-field="departamento">Departamento</th>
                <th data-field="provincia">Provincia</th>
                <th data-field="distrito">Distrito</th>
            </tr>
            </thead>
        </table>
<!--        <pre>
            <?php //var_dump($chartDpto) ?>
        </pre>-->
        <div class="col-lg-4 col-md-4 col-xs-4" id="container"></div>
        <div class="col-lg-4 col-md-4 col-xs-4" id="container2"></div>
        <div class="col-lg-4 col-md-4 col-xs-4" id="container3"></div>
    </div>
        
        
    </div>
