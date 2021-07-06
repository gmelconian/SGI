<?php 
    if (permiso(2)||permiso(3)||permiso(4)) {
?>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Estadísticas
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cantidad de Impresoras/Equipos/Telefonos por Unidad Ejecutora</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="equipoUnidad" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cantidad de insumos por tipo.</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <canvas id="cantidadInsumos" style="height:250px"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cantidad de insumos utilizados por mes en el corriente año</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="insumosline" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cantidad de componentes utilizados por mes en el corriente año</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="compoline" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>    
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js" charset="utf-8"></script>
<script>
$(function () {
    //EMPIRZA GRAFICA UNO
    var insumoDISCO = <?php echo json_encode($insumoDISCO) ?>;
    var insumoRATON = <?php echo json_encode($insumoRATON) ?>;
    var insumoFUENTE = <?php echo json_encode($insumoFUENTE) ?>;
    var insumoTECLADO = <?php echo json_encode($insumoTECLADO) ?>;
    var insumoOTRO = <?php echo json_encode($insumoOTRO) ?>;
    var insumosCanvas = document.getElementById("cantidadInsumos");
    var insumosData = {
        labels: ["Discos","Ratones","Fuentes","Teclados","Otros"],
        datasets: [{
            data: [insumoDISCO, insumoRATON, insumoFUENTE, insumoTECLADO, insumoOTRO],
            backgroundColor: [
                "rgba(255, 0, 0, 0.5)",
                "rgba(100, 255, 0, 0.5)",
                "rgba(200, 50, 255, 0.5)",
                "rgba(0, 100, 255, 0.5)",
                "rgba(50, 250, 255, 0.5)"
            ]
        }]
    };
    //TERMINA GRAFICA UNO
    //EMPIRZA GRAFICA DOS
    var polarAreaChart = new Chart(insumosCanvas, {
      type: 'polarArea',
      data: insumosData
    });    
    var pcDGS = <?php echo json_encode($pcDGS) ?>;
    var pcDINAVI = <?php echo json_encode($pcDINAVI) ?>;
    var pcDINOT = <?php echo json_encode($pcDINOT) ?>;
    var impresorasDGS = <?php echo json_encode($impresorasDGS) ?>;
    var impresorasDINAVI = <?php echo json_encode($impresorasDINAVI) ?>;
    var impresorasDINOT = <?php echo json_encode($impresorasDINOT) ?>;
    var telefonosDGS = <?php echo json_encode($telefonosDGS) ?>;
    var telefonosDINAVI = <?php echo json_encode($telefonosDINAVI) ?>;
    var telefonosDINOT = <?php echo json_encode($telefonosDINOT) ?>;
    var equipoUnidad = document.getElementById("equipoUnidad");
    var data = {
        labels: ["DGS", "DINAVI", "DINOT"],
        datasets: [
            {
                label: "Impresoras",
                backgroundColor: "rgba(255, 0, 0, 0.5)",
                data: [impresorasDGS,impresorasDINAVI,impresorasDINOT]
            },
            {
                label: "Computadoras",
                backgroundColor: "rgba(100, 255, 0, 0.5)",
                data: [pcDGS,pcDINAVI,pcDINOT]
            },
            {
                label: "Telefonos",
                backgroundColor: "rgba(200, 50, 255, 0.5)",
                data: [telefonosDGS,telefonosDINAVI,telefonosDINOT]
            }
        ]
    };
    var myBarChart = new Chart(equipoUnidad, {
        type: 'bar',
        data: data,
        options: {
            barValueSpacing: 20,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        stepSize: 1,
                    }
                }]
            }
        }
    });
    //TERMINA GRAFICA DOS
    //EMPIRZA GRAFICA TRES
    var disco_1 = <?php echo json_encode($disco_1) ?>;
    var disco_2 = <?php echo json_encode($disco_2) ?>;
    var disco_3 = <?php echo json_encode($disco_3) ?>;
    var disco_4 = <?php echo json_encode($disco_4) ?>;
    var disco_5 = <?php echo json_encode($disco_5) ?>;
    var disco_6 = <?php echo json_encode($disco_6) ?>;
    var disco_7 = <?php echo json_encode($disco_7) ?>;
    var disco_8 = <?php echo json_encode($disco_8) ?>;
    var disco_9 = <?php echo json_encode($disco_9) ?>;
    var disco_10 = <?php echo json_encode($disco_10) ?>;
    var disco_11 = <?php echo json_encode($disco_11) ?>;
    var disco_12 = <?php echo json_encode($disco_12) ?>;
    var fuente_1 = <?php echo json_encode($fuente_1) ?>;
    var fuente_2 = <?php echo json_encode($fuente_2) ?>;
    var fuente_3 = <?php echo json_encode($fuente_3) ?>;
    var fuente_4 = <?php echo json_encode($fuente_4) ?>;
    var fuente_5 = <?php echo json_encode($fuente_5) ?>;
    var fuente_6 = <?php echo json_encode($fuente_6) ?>;
    var fuente_7 = <?php echo json_encode($fuente_7) ?>;
    var fuente_8 = <?php echo json_encode($fuente_8) ?>;
    var fuente_9 = <?php echo json_encode($fuente_9) ?>;
    var fuente_10 = <?php echo json_encode($fuente_10) ?>;
    var fuente_11 = <?php echo json_encode($fuente_11) ?>;
    var fuente_12 = <?php echo json_encode($fuente_12) ?>;
    var otro_1 = <?php echo json_encode($otro_1) ?>;
    var otro_2 = <?php echo json_encode($otro_2) ?>;
    var otro_3 = <?php echo json_encode($otro_3) ?>;
    var otro_4 = <?php echo json_encode($otro_4) ?>;
    var otro_5 = <?php echo json_encode($otro_5) ?>;
    var otro_6 = <?php echo json_encode($otro_6) ?>;
    var otro_7 = <?php echo json_encode($otro_7) ?>;
    var otro_8 = <?php echo json_encode($otro_8) ?>;
    var otro_9 = <?php echo json_encode($otro_9) ?>;
    var otro_10 = <?php echo json_encode($otro_10) ?>;
    var otro_11 = <?php echo json_encode($otro_11) ?>;
    var otro_12 = <?php echo json_encode($otro_12) ?>;
    var teclado_1 = <?php echo json_encode($teclado_1) ?>;
    var teclado_2 = <?php echo json_encode($teclado_2) ?>;
    var teclado_3 = <?php echo json_encode($teclado_3) ?>;
    var teclado_4 = <?php echo json_encode($teclado_4) ?>;
    var teclado_5 = <?php echo json_encode($teclado_5) ?>;
    var teclado_6 = <?php echo json_encode($teclado_6) ?>;
    var teclado_7 = <?php echo json_encode($teclado_7) ?>;
    var teclado_8 = <?php echo json_encode($teclado_8) ?>;
    var teclado_9 = <?php echo json_encode($teclado_9) ?>;
    var teclado_10 = <?php echo json_encode($teclado_10) ?>;
    var teclado_11 = <?php echo json_encode($teclado_11) ?>;
    var teclado_12 = <?php echo json_encode($teclado_12) ?>;
    var raton_1 = <?php echo json_encode($raton_1) ?>;
    var raton_2 = <?php echo json_encode($raton_2) ?>;
    var raton_3 = <?php echo json_encode($raton_3) ?>;
    var raton_4 = <?php echo json_encode($raton_4) ?>;
    var raton_5 = <?php echo json_encode($raton_5) ?>;
    var raton_6 = <?php echo json_encode($raton_6) ?>;
    var raton_7 = <?php echo json_encode($raton_7) ?>;
    var raton_8 = <?php echo json_encode($raton_8) ?>;
    var raton_9 = <?php echo json_encode($raton_9) ?>;
    var raton_10 = <?php echo json_encode($raton_10) ?>;
    var raton_11 = <?php echo json_encode($raton_11) ?>;
    var raton_12 = <?php echo json_encode($raton_12) ?>;
    var config = {
        type: 'line',
        data: {
            labels: ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','setiembre','octubre','noviembre','diciembre'],
            datasets: [{
                label: 'Discos',
                showLine: true,
                fill: false,
                borderColor: "rgba(50, 250, 255, 0.5)",
                data: [disco_1, disco_2,disco_3,disco_4,disco_5,disco_6,disco_7,disco_8,disco_9,disco_10,disco_11,disco_12],
            }, {
                label: 'Fuentes',
                showLine: true,
                fill: false,
                borderColor: "rgba(200, 50, 255, 0.5)",
                data: [fuente_1, fuente_2,fuente_3,fuente_4,fuente_5,fuente_6,fuente_7,fuente_8,fuente_9,fuente_10,fuente_11,fuente_12],
            }, {
                label: 'Otros',
                showLine: true,
                fill: false,
                borderColor: "rgba(255, 50, 255, 0.5)",
                data: [otro_1, otro_2,otro_3,otro_4,otro_5,otro_6,otro_7,otro_8,otro_9,otro_10,otro_11,otro_12],
            },
            {
                label: 'Teclados',
                showLine: true,
                fill: false,
                borderColor: "rgba(0, 100, 255, 0.5)",
                data: [teclado_1, teclado_2,teclado_3,teclado_4,teclado_5,teclado_6,teclado_7,teclado_8,teclado_9,teclado_10,teclado_11,teclado_12],
            }, {
                label: 'Ratones',
                showLine: true,
                fill: false,
                borderColor: "rgba(100, 255, 0, 0.5)",
                data: [raton_1, raton_2,raton_3,raton_4,raton_5,raton_6,raton_7,raton_8,raton_9,raton_10,raton_11,raton_12],
            }]
        },
        options: {
            spanGaps: true,
            responsive: true,
            /*title: {
                display: true,
                text: 'Chart.js Line Chart'
            },*/
            tooltips: {
                //mode: 'index',
                intersect: false,
            },
            hover: {
                //mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        //labelString: 'Labels'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        //labelString: 'Values'
                    },
                    ticks: {
                        min: 0,
                        beginAtZero:true
                    }
                }]
            }
        }
    };
    var ctx = document.getElementById('compoline').getContext('2d');
    var compoline = new Chart(ctx, config);
    //TERMINA GRAFICA TRES
    //EMPIRZA GRAFICA CUATRO
    var tonner_1 = <?php echo json_encode($tonner_1) ?>;
    var tonner_2 = <?php echo json_encode($tonner_2) ?>;
    var tonner_3 = <?php echo json_encode($tonner_3) ?>;
    var tonner_4 = <?php echo json_encode($tonner_4) ?>;
    var tonner_5 = <?php echo json_encode($tonner_5) ?>;
    var tonner_6 = <?php echo json_encode($tonner_6) ?>;
    var tonner_7 = <?php echo json_encode($tonner_7) ?>;
    var tonner_8 = <?php echo json_encode($tonner_8) ?>;
    var tonner_9 = <?php echo json_encode($tonner_9) ?>;
    var tonner_10 = <?php echo json_encode($tonner_10) ?>;
    var tonner_11 = <?php echo json_encode($tonner_11) ?>;
    var tonner_12 = <?php echo json_encode($tonner_12) ?>;
    var foto_1 = <?php echo json_encode($fotoconductor_1) ?>;
    var foto_2 = <?php echo json_encode($fotoconductor_2) ?>;
    var foto_3 = <?php echo json_encode($fotoconductor_3) ?>;
    var foto_4 = <?php echo json_encode($fotoconductor_4) ?>;
    var foto_5 = <?php echo json_encode($fotoconductor_5) ?>;
    var foto_6 = <?php echo json_encode($fotoconductor_6) ?>;
    var foto_7 = <?php echo json_encode($fotoconductor_7) ?>;
    var foto_8 = <?php echo json_encode($fotoconductor_8) ?>;
    var foto_9 = <?php echo json_encode($fotoconductor_9) ?>;
    var foto_10 = <?php echo json_encode($fotoconductor_10) ?>;
    var foto_11 = <?php echo json_encode($fotoconductor_11) ?>;
    var foto_12 = <?php echo json_encode($fotoconductor_12) ?>;
    var kit_1 = <?php echo json_encode($kit_1) ?>;
    var kit_2 = <?php echo json_encode($kit_2) ?>;
    var kit_3 = <?php echo json_encode($kit_3) ?>;
    var kit_4 = <?php echo json_encode($kit_4) ?>;
    var kit_5 = <?php echo json_encode($kit_5) ?>;
    var kit_6 = <?php echo json_encode($kit_6) ?>;
    var kit_7 = <?php echo json_encode($kit_7) ?>;
    var kit_8 = <?php echo json_encode($kit_8) ?>;
    var kit_9 = <?php echo json_encode($kit_9) ?>;
    var kit_10 = <?php echo json_encode($kit_10) ?>;
    var kit_11 = <?php echo json_encode($kit_11) ?>;
    var kit_12 = <?php echo json_encode($kit_12) ?>;
    var config = {
        type: 'line',
        data: {
            labels: ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','setiembre','octubre','noviembre','diciembre'],
            datasets: [{
                label: 'Tonners',
                showLine: true,
                fill: false,
                borderColor: "rgba(255, 100, 50, 0.5)",
                data: [tonner_1, tonner_2,tonner_3,tonner_4,tonner_5,tonner_6,tonner_7,tonner_8,tonner_9,tonner_10,tonner_11,tonner_12],
            }, {
                label: 'Fotoconductores',
                showLine: true,
                fill: false,
                borderColor: "rgba(255, 50, 100, 0.5)",
                //data:[1,5,9,7],
                data: [foto_1, foto_2,foto_3,foto_4,foto_5,foto_6,foto_7,foto_8,foto_9,foto_10,foto_11,foto_12],
            }, {
                label: 'Kits de Mantenimiento',
                showLine: true,
                fill: false,
                borderColor: "rgba(255, 50, 255, 0.5)",
                data: [kit_1, kit_2,kit_3,kit_4,kit_5,kit_6,kit_7,kit_8,kit_9,kit_10,kit_11,kit_12],
            }]
        },
        options: {
            spanGaps: true,
            responsive: true,
            /*title: {
                display: true,
                text: 'Chart.js Line Chart'
            },*/
            tooltips: {
                //mode: 'index',
                intersect: false,
            },
            hover: {
                //mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        //labelString: 'Labels'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        //labelString: 'Values'
                    },
                    ticks: {
                        min: 0,
                        beginAtZero:true
                    }
                }]
            }
        }
    };
    var ctx = document.getElementById('insumosline').getContext('2d');
    var insumosline = new Chart(ctx, config);
    //TERMINA GRAFICA CUATRO
});
</script>
<?php 
}
else
    redirect('accessDeny');
?>