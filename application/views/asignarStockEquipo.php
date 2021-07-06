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
                    <form role="form" id="addEquipos" action="<?php echo base_url() ?>updateEquipos55555" method="post" role="form">
                        <div class="box-body">
                            <div id="IMPRESORA" class="row">  
                                <div class="col-md-12">
                                    <div id="" class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Nro de Serie</label>
                                                <input require type="text" disabled class="form-control required" id="serie" placeholder="Ingrese numero de serie" name="serie" maxlength="50">
                                            </div>
                                        </div>
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
                                                <label for="fname">Nombre Host</label>
                                                <input readonly type="text" class="form-control" id="host" name="host" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Número de Servicio</label>
                                                <input readonly type="text" class="form-control" id="servicio"  name="servicio" maxlength="50">
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div id="PC" class="row">
                                <div class="col-md-12">
                                    <div id="" class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Nro de Serie</label>
                                                <input require type="text" disabled class="form-control required" id="serie" placeholder="Ingrese numero de serie" name="serie" maxlength="50">
                                            </div>
                                        </div>
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
                                                <label for="fname">Nombre Host</label>
                                                <input readonly type="text" class="form-control" id="host" name="host" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Número de Servicio</label>
                                                <input readonly type="text" class="form-control" id="servicio"  name="servicio" maxlength="50">
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div id="MONITOR" class="row">
                                <div class="col-md-12">
                                    <div id="" class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Nro de Serie</label>
                                                <input require type="text" disabled class="form-control required" id="serie" placeholder="Ingrese numero de serie" name="serie" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <textarea maxlength="150" disabled class="form-control" style="resize:none" rows="1" id="descripcion" name="descripcion"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="MONITOR" class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Pulgadas</label>
                                                <input type="number" disabled class="form-control required" id="pulgadas" name="pulgadas">
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Marca</label>
                                        <input type="text"  disabled class="form-control required" id="marca" name="marca" value="<?php echo $equipo->marca; ?>">
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Modelo</label>
                                        <input type="text"  disabled class="form-control required" id="modelo" name="modelo" value="<?php echo $equipo->modelo; ?>">
                                    </div>   
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Proveedor</label>
                                        <input type="text"  disabled class="form-control required" id="proveedor" name="proveedor" value="<?php echo $equipo->proveedor; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Factura</label>
                                        <br><a name="pdf" href="<?php echo base_url().$equipo->archivo_factura; ?>" title="Descargar">Descargar Factura <i class="fa fa-file-pdf-o"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha Factura</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="fecha" name="fecha" disabled value="<?php echo $equipo->fecha; ?>">
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Garantía</label>
                                        <input type="number" disabled class="form-control" id="garantia" name="garantia" value="<?php echo $equipo->garantia; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Expediente</label>
                                        <input type="text" disabled class="form-control" id="expediente" name="expediente" value="<?php echo $equipo->expediente; ?>">
                                    </div>
                                </div>
                            </div>
                                
                            <div class="box-footer">
                                <a class="btn btn-primary" href="javascript:location.href= baseURL + 'stock'"> Volver Atrás</a>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_asignar_<?php echo $tipo; ?>">
                                    Asignar
                                </button>
                                <div class="form-group">
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal_asignar_PC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Asignar persona</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <label for="fname">Personas</label>
                                                    <select class="form-control selectpicker" data-live-search="true" id="equipo_select" name="equipo_select">
                                                        <option disabled selected="selected" value="0">Seleccione la persona</option>
                                                        <?php
                                                        if (!empty($persona)) {
                                                            foreach ($persona as $per) {
                                                                echo "<option value=" . $per->login  .  set_select('persona',$per->nombre).">" . $per->nombre. "</option  >";
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
                                    <div class="modal fade" id="modal_asignar_MONITOR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Asignar computadora</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="fname">Equipos</label>
                                                            <select class="form-control custom-select" id="monitor_select" name="monitor_select">
                                                                <option disabled selected="selected" value="0">Seleccione el equipo</option>
                                                                <?php
                                                                if (!empty($lista_equipo)) {
                                                                    foreach ($lista_equipo as $equ) {
                                                                        if ($equ->tipo=="PC")
                                                                            echo "<option value=" . $equ->codigo  .  set_select('equipo',$equ->numero_serie." - ".$equ->descripcion).">" . $equ->numero_serie." - ".$equ->descripcion . "</option  >";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row grid_MONITOR">
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
                                    <div class="modal fade" id="modal_asignar_IMPRESORA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Asignar oficina</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <label for="fname">Oficinas - Edificios</label>
                                                    <select class="form-control custom-select" id="impresora_select" name="impresora_select">
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
        $("#IMPRESORA").hide();
        $("#PC").hide();
        $("#MONITOR").hide();
        $(".grid_MONITOR").hide();
        var tipo = "<?php echo $tipo; ?>";
        switch (tipo) {
            case 'IMPRESORA':
                $("#IMPRESORA").show();
                document.getElementById("serie").value = "<?php echo $equipo->numero_serie; ?>";
                document.getElementById("descripcion").value = "<?php echo $equipo->descripcion; ?>";
                document.getElementById("host").value = "<?php echo $equipo->host; ?>";
                document.getElementById("servicio").value = "<?php echo $equipo->servicio; ?>";
                $('#modal_asignar_IMPRESORA').modal('show');
                break;
            case 'PC':
                $("#PC").show();
                document.getElementById("serie").value = "<?php echo $equipo->numero_serie; ?>";
                document.getElementById("descripcion").value = "<?php echo $equipo->descripcion; ?>";
                document.getElementById("host").value = "<?php echo $equipo->host; ?>";
                document.getElementById("servicio").value = "<?php echo $equipo->servicio; ?>";
                $('#modal_asignar_PC').modal('show');
                break;
            case 'MONITOR': 
                $("#MONITOR").show();
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
                document.getElementById("serie").value = "<?php echo $equipo->numero_serie; ?>";
                document.getElementById("descripcion").value = "<?php echo $equipo->descripcion; ?>";
                document.getElementById("pulgadas").value = "<?php echo $equipo->pulgadas; ?>";
                $('#modal_asignar_MONITOR').modal('show');
                break;
        };
        
        $("#monitor_select").change(function(){
            $(".grid_MONITOR").hide();
            var codigo = document.querySelector("#monitor_select").value;
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
                            loadData[i] = { 'codigo': equipo.codigo, 'serial': equipo.numero_serie, 'tipo': equipo.tipo, 'estado': equipo.estado};
                        }
                        $(".grid_MONITOR").show();
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
            case 'IMPRESORA':
                var codigo = document.getElementById("impresora_select").value;
                if(codigo!=0)
                {
                    var dataString = {
                        "codigo_insumo" : <?php echo $equipo->codigo; ?>,
                        "codigo_oficina" : codigo,
                        "tipo" : "IMPRESORA",
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
            case 'MONITOR':
                var codigo = document.getElementById("monitor_select").value;
                if(codigo!=0)
                {
                    var dataString = {
                        "codigo_insumo" : <?php echo $equipo->codigo; ?>,
                        "codigo_equipo" : codigo,
                        "tipo" : "MONITOR",
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
            case 'PC': 
                var codigo = document.getElementById("equipo_select").value;
                if(codigo!=0)
                {
                    var dataString = {
                        "codigo_insumo" : <?php echo $equipo->codigo; ?>,
                        "codigo_persona" : codigo,
                        "tipo" : "PC",
                    };
                    $.ajax({
                        url: baseURL + "asignarPersona",
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
                } else alert("Seleccione una persona.");    
                break;
        }        
    }
</script>
<?php 
}
else
    redirect('accessDeny');
?>