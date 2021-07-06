<?php 
    if (permiso(2) || permiso(3)||permiso(4)) {
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-home" aria-hidden="true"></i> Reportes
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
              <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <div class="box-body">
                        <form method="POST" id="searchList">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Seleccione el Reporte</label>
                                        <select required class="form-control custom-select" id="reporte" name="reporte" required>
                                            <option disabled selected="selected" value="0">Seleccione el reporte</option>
                                            <?php
                                            if (!empty($reportes)){
                                                foreach($reportes as $r){
                                                    echo "<option value=".$r->id.">".$r->detalle."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group" id="filtroF">
                                        <label>Filtros</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input name="rango" type="text" class="form-control pull-right" id="reservation">
                                        </div>
                                    </div>
                                    <div class="form-group" id="filtroC">
                                        <label>Filtros</label>
                                        <div class="input-group">
                                            <select required class="form-control custom-select" id="select_equipo" name="select_equipo" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row grilla1">
                                 <div class="col-xs-12">
                                    <div class="box">
                                        <h3 class="box-title"> &nbsp Resultados </h3>
                                        <div class="box-header">
                                            <div class="col-xs-12">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="table table-hover nuevaTable table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Codigo</th>
                                                                <th>Serial</th>
                                                                <th>Oficina</th>
                                                                <th>Edificio</th>                                                                
                                                            </tr>
                                                        </thead>
                                                    </table>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row grilla2">
                                 <div class="col-xs-12">
                                    <div class="box">
                                        <h3 class="box-title"> &nbsp Resultados </h3>
                                        <div class="box-header">
                                            <div class="col-xs-12">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="table table-hover nuevaTable table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Codigo Insumo</th>
                                                                <th>Tipo</th>
                                                                <th>Descripcion</th>
                                                                <th>Codigo Equipo</th>  
                                                                <th>Numero de Serie</th>
                                                                <th>Descripcion</th>
                                                                <th>Tipo</th>
                                                                <th>Fecha</th>
                                                            </tr>
                                                        </thead>
                                                    </table>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php
                        $this->load->helper('form');
                        $error = $this->session->flashdata('error');
                        if ($error) {
                    ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } 
                        $success = $this->session->flashdata('success');
                        if ($success) {
                            ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>    
    </section>
</div>
<script src="<?php echo base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js" charset="utf-8"></script>
<script language="javascript" type="text/javascript">
    $(document).ready(function(){
        $('#filtroF').hide();
        $('#filtroC').hide();
        $('.grilla1').hide();
        $('.grilla2').hide();
        
        $('#reservation').daterangepicker({
            timePicker: false,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
        
        $('#select_equipo').change(function(){
            var valor = document.getElementById("reporte").value;
            var codigo = document.getElementById("select_equipo").value;
            var dataString2 = {
                "reporte" : valor,
                "codigo" : codigo,
            };
            $.ajax({
                url: baseURL + "getDatosReporte",
                type:"POST",
                dataType: 'json',
                data: dataString2,
                success: function(datos){
                    switch (valor) {
                        case '2':
                            $('.grilla2').show();
                            $('.nuevaTable').DataTable({
                                destroy: true,
                                reload: true,
                                'columns': [
                                    { data: 'insumo' },
                                    { data: 'tipo' },
                                    { data: 'descripcion' },
                                    { data: 'equipo' },
                                    { data: 'numero_serie' },
                                    { data: 'descripcion2' },
                                    { data: 'tipo2' },
                                    { data: 'fecha' }
                                ],
                                'data': datos,
                                'paging': true,
                                'lengthChange': true,
                                'searching': true,
                                'ordering': true,
                                'deferRender': true,
                                'info': true,
                                'autoWidth': true,
                                'filter': true,
                                "language": {
                                    "url": "<?php echo base_url(); ?>assets/bower_components/datatables.net/Spanish.json"
                                },
                                dom: 'Bfrtip',
                                buttons: [
                                    'copy', 'csv', 'excel', 'pdf', 'print'
                                ]
                            });
                            break;
                        case '3':
                            $('.grilla2').show();
                            $('.nuevaTable').DataTable({
                                destroy: true,
                                reload: true,
                                'columns': [
                                    { data: 'insumo' },
                                    { data: 'tipo' },
                                    { data: 'descripcion' },
                                    { data: 'equipo' },
                                    { data: 'numero_serie' },
                                    { data: 'descripcion2' },
                                    { data: 'tipo2' },
                                    { data: 'fecha' }
                                ],
                                'data': datos,
                                'paging': true,
                                'lengthChange': true,
                                'searching': true,
                                'ordering': true,
                                'deferRender': true,
                                'info': true,
                                'autoWidth': true,
                                'filter': true,
                                "language": {
                                    "url": "<?php echo base_url(); ?>assets/bower_components/datatables.net/Spanish.json"
                                },
                                dom: 'Bfrtip',
                                buttons: [
                                    'copy', 'csv', 'excel', 'pdf', 'print'
                                ]
                            });
                            break;  
                    }
                },
                error:function(datos){
                    alert('Ocurio un error');
                }
            });
        });
        
        $('#reporte').change(function(){
            $('.grilla1').hide();
            $('.grilla2').hide();
            var valor = $(this).val();
            var dataString = 'reporte='+valor;
            $.ajax({
                url: baseURL + "getFiltroReporte",
                type:"POST",
                dataType: 'json',
                data: dataString,
                success: function(data){
                    if (data.filtro=="fecha") {
                        $('#filtroF').show();                        
                    }else $('#filtroF').hide();
                    if (data.filtro=="codigo") {
                        if(valor==2||valor==3){
                            var dataString = 'reporte='+valor;
                            $.ajax({
                                url: baseURL + "getComboReporte",
                                type:"POST",
                                dataType: 'json',
                                data: dataString,
                                success: function(data){
                                    $('#select_equipo').find('option').remove();
                                    $('#select_equipo').append(data);
                                },
                                error:function(data){
                                    $('#filtroC').hide();
                                    alert('Ocurio un error');
                                }
                            });    
                        }
                        $('#filtroC').show();                        
                    }else $('#filtroC').hide();
                    if (data.filtro=="vacio"){
                        var dataString = 'reporte='+valor;
                        $.ajax({
                            url: baseURL + "getDatosReporte",
                            type:"POST",
                            dataType: 'json',
                            data: dataString,
                            success: function(datos){
                                $('.nuevaTable').DataTable({
                                    destroy: true,
                                    reload: true,
                                    'columns': [
                                        { data: 'codigo' },
                                        { data: 'numero_serie' },
                                        { data: 'oficina' },
                                        { data: 'edificio' }
                                    ],
                                    'data': datos,
                                    'paging': true,
                                    'lengthChange': true,
                                    'searching': true,
                                    'ordering': true,
                                    'deferRender': true,
                                    'info': true,
                                    'autoWidth': true,
                                    'filter': true,
                                    "language": {
                                        "url": "<?php echo base_url(); ?>assets/bower_components/datatables.net/Spanish.json"
                                    },
                                    dom: 'Bfrtip',
                                    buttons: [
                                        'copy', 'csv', 'excel', 'pdf', 'print'
                                    ]
                                });
                                $('.grilla1').show();
                            },
                            error:function(datos){
                                $('#filtroF').hide();
                                alert('Ocurio un error');
                            }
                        });                        
                    }   
                },
                error:function(data){
                    $('#filtroF').hide();
                    alert('Ocurio un error');
                }
            });
        });
    });   
</script>
<?php 
}
else
    redirect('accessDeny');
?>      