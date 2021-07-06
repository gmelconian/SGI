<?php 
    if (permiso(2)|| permiso(3)){
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-Empresas"></i> Información de Equipamiento
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Detalles del Equipamiento</h3>
                    </div>
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="asignar" method="post" role="form">
                        <div class="box-body">
                            <div id="INSUMOS" class="row">
                                <div class="col-md-12">
                                    <div id="" class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <textarea maxlength="150" disabled class="form-control" style="resize:none" rows="1" id="descripcion" name="descripcion"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="" class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Cantidad de Copias</label>
                                                <input readonly type="text" class="form-control" id="copias" name="copias">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Cantidad</label>
                                                <input readonly type="text" class="form-control" id="cantidad" name="cantidad">
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div id="TELEFONO" class="row">
                                <div class="col-md-12">
                                    <div id="" class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Cantidad</label>
                                                <input type="number" disabled class="form-control required" id="cantidad" name="cantidad">
                                            </div>
                                            <div class="form-group">
                                                <label>Tipo de Telefono</label>
                                                <input type="number" disabled class="form-control required" id="tel_tipo" name="tel_tipo">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <textarea disabled class="form-control" style="resize:none" rows="3" id="descripcion" name="descripcion"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div id="COMPONENTE" class="row">
                                <div class="col-md-12">
                                    <div id="" class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Tipo de Componente</label>
                                                <input type="text" class="form-control required" id="tipo" name="tipo" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Detalle del Componente</label>
                                                <input type="text" class="form-control required" id="descripcion" disabled name="descripcion">
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Marca</label>
                                        <input type="text"  disabled class="form-control required" id="marca" name="marca" value="<?php echo $insumos->marca; ?>">
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Modelo</label>
                                        <input type="text"  disabled class="form-control required" id="modelo" name="modelo" value="<?php echo $insumos->modelo; ?>">
                                    </div>   
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Proveedor</label>
                                        <input type="text"  disabled class="form-control required" id="proveedor" name="proveedor" value="<?php echo $insumos->proveedor; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Factura</label>
                                        <br><a name="pdf" href="<?php echo base_url().$insumos->archivo_factura; ?>" title="Descargar">Descargar Factura <i class="fa fa-file-pdf-o"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha Factura</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="fecha" name="fecha" disabled value="<?php echo $insumos->fecha; ?>">
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Garantía</label>
                                        <input type="number" disabled class="form-control" id="garantia" name="garantia" value="<?php echo $insumos->garantia; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Expediente</label>
                                        <input type="text" disabled class="form-control" id="expediente" name="expediente" value="<?php echo $insumos->expediente; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a class="btn btn-primary" href="javascript:location.href= baseURL + 'stock'"> Volver Atrás</a>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_asignar_<?php echo $modal; ?>">
                                    Asignar
                                </button>
                                <div class="form-group">
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal_asignar_COMPONENTE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Asignar componente a computadora</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">    
                                                            <label for="fname">Equipos</label>
                                                            <select class="form-control selectpicker" id="equipo_select" data-live-search="true"  name="equipo_select">
                                                                <option disabled selected="selected" value="0">Seleccione el equipo</option>
                                                                <?php
                                                                if (!empty($lista_equipo)) {
                                                                    foreach ($lista_equipo as $equ) {
                                                                        if ($equ->tipo=="PC")
                                                                            echo "<option value=" . $equ->codigo  .  set_select('equipo',$equ->numero_serie." - ".$equ->descripcion." - ".$equ->host).">" . $equ->numero_serie." - ".$equ->descripcion ." - ".$equ->host . "</option  >";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>    
                                                    <div class="row grid_COMPONENTE">
                                                        <div class="col-md-12">                                
                                                            <div class="form-group">
                                                                <div id="dataForm" class="container-fluid">
                                                                    <table id="tblAppendGrid"></table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary" onclick="asignar()">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modal_asignar_TELEFONO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Asignar telefono a oficina</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <label for="fname">Oficinas - Edificios</label>
                                                    <select class="form-control custom-select" id="oficina_select" name="oficina_select">
                                                        <option disabled selected="selected" value="0">Seleccione la oficina</option>
                                                        <?php
                                                        if (!empty($oficina)) {
                                                            foreach ($oficina as $ofi) {
                                                                echo "<option value=" . $ofi->codigo  .  set_select('oficina',$ofi->nombre." - ".$ofi->edificio).">" . $ofi->nombre." - ".$ofi->edificio . "</option  >";
                                                            }
                                                        }
                                                        ?>
                                                    </select>                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary" onclick="asignar()">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modal_asignar_INSUMO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Asignar insumo a impresora</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <label for="fname">Impresoras</label>
                                                    <select class="form-control selectpicker" id="impresora_select" data-live-search="true" name="impresora_select">
                                                        <option disabled selected="selected" value="0">Seleccione la impresora</option>
                                                        <?php
                                                        if (!empty($lista_equipo)) {
                                                            foreach ($lista_equipo as $equ) {
                                                                if ($equ->tipo=="IMPRESORA")
                                                                    echo "<option value=" . $equ->codigo  .  set_select('equipo',$equ->numero_serie." - ".$equ->descripcion."-".$equ->marca."/".$equ->modelo).">" . $equ->numero_serie." - ".$equ->descripcion."-".$equ->marca."/".$equ->modelo . "</option  >";
                                                            }
                                                        }
                                                        ?>
                                                    </select> 
                                                </div>    
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary" onclick="asignar()">Guardar</button>
                                                </div>    
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
                <?php } ?>
                <?php
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
    </section>
</div>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" />
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/jquery.appendgrid@2/dist/AppendGrid.js'></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<script language="javascript" type="text/javascript">
    $(document).ready(function(){                 
        $("#COMPONENTE").hide();
        $("#TELEFONO").hide();
        $("#INSUMOS").hide();
        $(".grid_COMPONENTE").hide();
        var tipo = "<?php echo $tipo; ?>";
        switch (tipo) {
            case 'TECLADO':
            case 'RATON':
            case 'DISCO':
            case 'FUENTE': 
            case 'OTRO':    
                $("#COMPONENTE").show();
                document.getElementById("tipo").value = tipo;
                document.getElementById("descripcion").value = "<?php echo $insumos->descripcion; ?>"; 
                if(tipo=='DISCO'||tipo=='OTRO'){
                    window.myAppendGrid = new AppendGrid({
                        element: "tblAppendGrid",
                        uiFramework: "bootstrap4",
                        iconFramework: "fontawesome5",
                        initRows: 1,
                        hideButtons: {
                            moveUp: true,
                            moveDown: true,
                            insert: true,
                            remove: true,
                            append: true,
                            removeLast: true,
                        },
                        columns: [
                        {
                            name: "codigo",
                            display: "Nro de Codigo",
                            type: "readonly",
                        },
                        {
                            name: "serial",
                            display: "Nro de Serie",
                            type: "readonly",
                        },
                        {
                            name: "tipo",
                            display: "Tipo",
                            type: "readonly",
                        },
                        {
                            name: "estado",
                            display: "Estado",
                            type: "select",
                            ctrlOptions: [
                                "NUEVA",
                                "ASIGNADO",
                                "DISPONIBLE",
                                "GARANTIA",
                                "SERVICE",
                                "ELIMINADO"
                            ],
                            events: {
                                change: function(e) {
                                    var rowIndex = myAppendGrid.getRowIndex(parseInt(e.uniqueIndex));
                                    var codigo = myAppendGrid.getCtrlValue('codigo', rowIndex);
                                    var estado = e.target.value;
                                    var dataString = {
                                        "codigo_equipo" : codigo,
                                        "estado" : estado,
                                    };
                                    $.ajax({
                                        url: baseURL + "cambiarEstado",
                                        type:"POST",
                                        data: dataString,
                                        dataType: 'json',
                                        success: function(data){
                                            alert("Se cambio el estado del insumo");
                                        },
                                        error:function(data){
                                            alert('Ocurio un error, cambiar el estado.');
                                        }
                                    });                                
                                },
                            },
                        }
                        ],
                    });
                }    
                $('#modal_asignar_COMPONENTE').modal('show');
                break;
            case 'TELEFONO':
                $("#TELEFONO").show();
                document.getElementById("descripcion").value = "<?php echo $insumos->descripcion; ?>";
                document.getElementById("tel_tipo").value = "<?php echo $insumos->tel_tipo; ?>";
                document.getElementById("cantidad").value = "<?php echo $insumos->cantidad; ?>";
                $('#modal_asignar_TELEFONO').modal('show');
                break;
            case 'tonner':
            case 'kit_mantenimiento':  
            case 'fotoconductor':
                $("#INSUMOS").show();
                document.getElementById("descripcion").value = "<?php echo $insumos->descripcion; ?>";
                document.getElementById("copias").value = "<?php echo $insumos->copias; ?>";
                document.getElementById("cantidad").value = "<?php echo $insumos->cantidad; ?>";
                $('#modal_asignar_INSUMO').modal('show');
                break;
        };
        
        $("#equipo_select").change(function(){
            $(".grid_COMPONENTE").hide();
            var codigo = document.querySelector("#equipo_select").value;
            var dataString = {
                "codigo_equipo" : codigo,
            };
            $.ajax({
                url: baseURL + "insumosAsiganados",
                type:"POST",
                data: dataString,
                dataType: 'json',
                success: function(data){
                    if(data.equipos_load != "vacio"){
                        var loadData = [];
                        for (var i=0; i< data.equipos_load.length; i++)
                        {
                            var equipo = data.equipos_load[i];
                            loadData[i] = { 'codigo': equipo.codigo, 'serial': equipo.numero_serie,'tipo': equipo.tipo, 'estado': equipo.estado};
                        }
                        $(".grid_COMPONENTE").show();
                        myAppendGrid.load(loadData);
                    }    
                    else alert("VACIO");
                },
                error:function(data){
                    alert('Ocurio un error, al traer el equipo asignado.');
                }
            });
        });
    });    
</script>
<script language="javascript" type="text/javascript">
    function asignar(){
        var tipo = "<?php echo $tipo; ?>";
        switch (tipo) {
            case 'tonner':
            case 'kit_mantenimiento':  
            case 'fotoconductor':
                var codigo = document.getElementById("impresora_select").value;
                if(codigo!=0)
                {
                    var dataString = {
                        "codigo_insumo" : <?php echo $insumos->codigo; ?>,
                        "codigo_equipo" : codigo,
                        "tipo" : tipo,
                    };
                    $.ajax({
                        url: baseURL + "asignarEquipo",
                        type:"POST",
                        data: dataString,
                        dataType: 'json',
                        success: function(data){
                            alert('El equipo se asigno correctamente.');
                            window.location.href = "<?php echo site_url('stock'); ?>"
                        },
                        error:function(data){
                            alert('Ocurio un error, al asignar el equipo.');
                        }
                    });
                } else alert("Seleccione una impresora.");
                break;
            case 'TELEFONO':
                var codigo = document.getElementById("oficina_select").value;
                if(codigo!=0)
                {
                    var dataString = {
                        "codigo_insumo" : <?php echo $insumos->codigo; ?>,
                        "codigo_oficina" : codigo,
                        "tipo" : "TELEFONO",
                    };
                    $.ajax({
                        url: baseURL + "asignarOficina",
                        type:"POST",
                        data: dataString,
                        dataType: 'json',
                        success: function(data){
                            alert('El equipo se asigno correctamente.');
                            window.location.href = "<?php echo site_url('stock'); ?>"
                        },
                        error:function(data){
                            alert('Ocurio un error, al asignar el equipo.');
                        }
                    });
                } else alert("Seleccione una oficina.");
                break;
            case 'TECLADO':
            case 'RATON':
            case 'DISCO':
            case 'FUENTE': 
            case 'OTRO': 
                var codigo = document.getElementById("equipo_select").value;
                if(codigo!=0)
                {
                    var dataString = {
                        "codigo_insumo" : <?php echo $insumos->codigo; ?>,
                        "codigo_equipo" : codigo,
                        "tipo" : tipo,
                    };
                    $.ajax({
                        url: baseURL + "asignarEquipo",
                        type:"POST",
                        data: dataString,
                        dataType: 'json',
                        success: function(data){
                            alert('El equipo se asigno correctamente.');
                            window.location.href = "<?php echo site_url('stock'); ?>"
                        },
                        error:function(data){
                            alert('Ocurio un error, al asignar el equipo.');
                        }
                    });
                } else alert("Seleccione un equipo.");    
                break;
        }        
    }
</script>
<?php 
}
else
    redirect('accessDeny');
?>