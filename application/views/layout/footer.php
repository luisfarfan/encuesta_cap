
</div><!-- /.content-wrapper -->

<footer class="main-footer">

    <strong>Copyright &copy; 2015 <a href="#">LF Desarrollo de Software</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->      
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>
</div><!-- ./wrapper -->
</body>
<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/app.min.js" type="text/javascript"></script>

<!-- Demo -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/my_js/index.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-table.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/tableExport.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/bootstrap-table-master/dist/extensions/export/bootstrap-table-export.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.battatech.excelexport.js" type="text/javascript"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function () {
        alert($('#color1').css('background-color'));
    }); 
    var $table = $('#table');
    $(function () {

        $('#table').bootstrapTable({
            showExport: true,
            exportTypes: ['excel'],
        });
        $('tbody').add("<tr bgcolor='#FF0000'><td>1</td><tr>")
        $(".mybtn-top").click(function () {
            $('#table').bootstrapTable('scrollTo', 0);
        });

        $(".mybtn-row").click(function () {
            var index = +$('.row-index').val(),
                    top = 0;
            $('#table').find('tbody tr').each(function (i) {
                if (i < index) {
                    top += $(this).height();
                }
            });
            $('#table').bootstrapTable('scrollTo', top);
        });

        $(".mybtn-btm").click(function () {
            $('#table').bootstrapTable('scrollTo', 'bottom');
        });

    });

    $('#departamentos').change(function () {
        $table.bootstrapTable('refresh', {
            url: '<?php echo base_url() ?>index.php/administrator/getDataPersonabyDepartamento/' + this.value
        });
    });

    $('#provincias').change(function () {
        $table.bootstrapTable('refresh', {
            url: '<?php echo base_url() ?>index.php/administrator/getDataPersonabyProvincia/' + this.value
        });
    });

    $('#distritos').change(function () {
        $table.bootstrapTable('refresh', {
            url: '<?php echo base_url() ?>index.php/administrator/getDataPersonabyDistrito/' + this.value,
        });
    });


    //TABLE CON JSON


</script>
<script>
    $(function () {

        $(document).ready(function () {

            // Build the chart
            $('#container').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Grafico cantidad de Encuestados por Departamento'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y}</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                        name: "Cantidad",
                        colorByPoint: true,
                        data: [
<?php
if (isset($chartDpto)) {
    foreach ($chartDpto as $pro => $valor) {
        ?>
                                    ['<?php echo $valor['departamento'] ?>', <?php echo $valor['cantidad'] ?>],
        <?php
    }
}
?>
                        ],
                        dataLabels: {
                            enabled: true,
//                            rotation: -360,
                            color: '#FFFFFF',
                            align: 'center',
                            format: '{point.y}', // one decimal
                            y: 10, // 10 pixels down from the top
                            style: {
                                fontSize: '12px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    }]
            });

            $('#container2').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Grafico cantidad de Encuestados por Distrito'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y}</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                        name: "Cantiadad",
                        colorByPoint: true,
                        data: [
<?php
if (isset($chartDist)) {
    foreach ($chartDist as $pro => $valor) {
        ?>
                                    ['<?php echo $valor['distrito'] ?>', <?php echo $valor['cantidad'] ?>],
        <?php
    }
}
?>
                        ],
                        dataLabels: {
                            enabled: true,
//                            rotation: -360,
                            color: '#FFFFFF',
                            align: 'center',
                            format: '{point.y}', // one decimal
                            y: 10, // 10 pixels down from the top
                            style: {
                                fontSize: '12px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    }]
            });

            $('#container3').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Grafico cantidad de Encuestados por Provincia'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y}</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                        name: "Cantiadad",
                        colorByPoint: true,
                        data: [
<?php
if (isset($chartProv)) {
    foreach ($chartProv as $pro => $valor) {
        ?>
                                    ['<?php echo $valor['provincia'] ?>', <?php echo $valor['cantidad'] ?>],
        <?php
    }
}
?>
                        ],
                        dataLabels: {
                            enabled: true,
//                            rotation: -360,
                            color: '#FFFFFF',
                            align: 'center',
                            format: '{point.y}', // one decimal
                            y: 10, // 10 pixels down from the top
                            style: {
                                fontSize: '12px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    }]
            });


            $('#top10cursos').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Top 5 Cursos mas Escogidos'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y}</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                        name: "Cantidad",
                        colorByPoint: true,
                        data: [
<?php
if (isset($topcursos)) {
    foreach ($topcursos as $pro => $valor) {
        ?>
                                    ['<?php echo $valor['descripcion_curso'] ?>', <?php echo $valor['cantidad'] ?>],
        <?php
    }
}
?>
                        ],
                        dataLabels: {
                            enabled: true,
//                            rotation: -360,
                            color: '#FFFFFF',
                            align: 'center',
                            format: '{point.y}', // one decimal
                            y: 10, // 10 pixels down from the top
                            style: {
                                fontSize: '12px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    }]
            });
        });
    });

    $("#departamentos").on('change', function () {
        $.ajax({
            url: '<?php echo base_url() ?>index.php/encuesta/getProvincias/' + this.value,
            success: function (response, textStatus, jqXHR) {
                $('#provincias').html("<option>Seleccione...</option>" + response);
                $('#distritos').empty();
//            $('#provincias').html("<option>Seleccione...</option>");
                console.log(response)
            }
        })
    });

    $("#provincias").on('change', function () {
        $.ajax({
            url: '<?php echo base_url() ?>index.php/encuesta/getDistritos/' + this.value,
            success: function (response, textStatus, jqXHR) {
                $('#distritos').html("<option>Seleccione...</option>" + response);
//            $('#distritos').html("<option>Seleccione...</option>");
                console.log(response)
            }
        });
    });

    $("#btnExport").click(function () {
        $("#tableExport").battatech_excelexport({
            containerid: "tableExport",
            datatype: 'table'
        });
    });
</script>
<script>


</script>
</html>