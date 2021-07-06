<?php 
    if (permiso(2)|| permiso(3)){
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-Empresas"></i> Edición de Computadoras
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Ingresar detalles de la computadora</h3>
                    </div>
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="updateComputadora" action="<?php echo base_url() .'updateComputadora/'.$computadora->codigo;?>" method="post" role="form">
                        <div class="box-body">
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Nro de Serie</label>
                                        <input require type="text" class="form-control required" id="serie" placeholder="Ingrese numero de serie" name="serie" maxlength="50" value="<?php echo $computadora->numero_serie; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea maxlength="150" class="form-control" style="resize:none" rows="1" id="descripcion" name="descripcion"> <?php echo $computadora->descripcion; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Marca</label>
                                        <select class="form-control custom-select" id="marca_select" name="marca_select">
                                            <?php
                                            if (!empty($marca)) {
                                                foreach ($marca as $ma) {
                                                    if ($ma->codigo==$computadora->marca) 
                                                        echo "<option selected value=" . $ma->codigo  .  set_select('marca',$ma->descripcion).">" . $ma->descripcion . "</option  >";
                                                    else
                                                        echo "<option value=" . $ma->codigo  .  set_select('marca',$ma->descripcion).">" . $ma->descripcion . "</option  >";
                                                }
                                            }
                                            ?>
                                        </select>   
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_marca">
                                            Agregar Marca
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal_marca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Agregar Marca</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="text" class="form-control required" id="marca_input" placeholder="Ingrese la Marca" name="marca_input" maxlength="20" value="<?php echo set_value('marca'); ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-primary" onclick="addMarca()">Guardar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Modelo</label>
                                        <select class="form-control custom-select" id="modelo_select" name="modelo_select">
                                            <?php
                                            if (!empty($modelo)) {
                                                foreach ($modelo as $mo) {
                                                    if ($mo->codigo==$computadora->modelo) 
                                                        echo "<option selected value=" . $mo->codigo  .  set_select('modelo',$mo->descripcion).">" . $mo->descripcion . "</option  >";
                                                    else
                                                        echo "<option value=" . $mo->codigo  .  set_select('modelo',$mo->descripcion).">" . $mo->descripcion . "</option  >";
                                                }
                                            }
                                            ?>
                                        </select>    
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_modelo">
                                            Agregar Modelo
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal_modelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Agregar Modelo</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="text" class="form-control required" id="modelo_input" placeholder="Ingrese el Modelo" name="modelo_input" maxlength="20" value="<?php echo set_value('modelo'); ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-primary" onclick="addModelo()">Guardar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Nombre Host</label>
                                        <input type="text" class="form-control" id="host" placeholder="Ingrese nombre del host" name="host" maxlength="50" value="<?php echo $computadora->host; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Número de Servicio</label>
                                        <input type="text" class="form-control" id="servicio" placeholder="Ingrese número de servicio" name="servicio" maxlength="50" value="<?php echo $computadora->servicio; ?>">
                                    </div>
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Proveedor</label>
                                        <select class="form-control custom-select" id="proveedor_select" name="proveedor_select">
                                            <?php
                                            if (!empty($proveedor)) {
                                                foreach ($proveedor as $pro) {
                                                    if ($pro->codigo==$computadora->codigo_proveedor) 
                                                        echo "<option selected value=" . $pro->codigo  .  set_select('proveedor',$pro->nombre_fantacia).">" . $pro->nombre_fantacia . "</option  >";
                                                    else
                                                        echo "<option value=" . $pro->codigo  .  set_select('proveedor',$pro->nombre_fantacia).">" . $pro->nombre_fantacia . "</option  >";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Factura</label>
                                        <input type="file" class="custom-file-input" name="factura">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha Factura</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="fecha" name="fecha" value="<?php echo $computadora->fecha; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Garantía</label>
                                        <input type="number" min="1" class="form-control" id="garantia" placeholder="Ingrese la garantía en meses" name="garantia" value="<?php echo $computadora->garantia; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Expediente</label>
                                        <input type="text" class="form-control" id="expediente" placeholder="Ingrese el número de expediente" name="expediente" value="<?php echo $computadora->expediente; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Actualizar">
                                <a class="btn btn-primary" href="javascript:location.href= baseURL + 'computadoras'"> Volver Atrás</a>
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

<script language="javascript" type="text/javascript">
    function addModelo(){
        var modelo = document.getElementById("modelo_input").value;
        var dataString = {
                        "modelo_descripcion" : modelo,
                        "origen" : "IMPRESORA",
                    };
        $.ajax({
                url: baseURL + "addModelo",
                type:"POST",
                data: dataString,
                dataType: 'json',
                success: function(data){
                    alert("Se creo el modelo con éxito.");
                    $('#modal_modelo').modal('hide');
                    var id_marca = data;
                    combo_modelo = document.getElementById('modelo_select');
                    var opt = document.createElement('option');
                    opt.value = id_marca;
                    opt.innerHTML = modelo;
                    combo_modelo.appendChild(opt);
                },
                error:function(data){
                    alert('Ocurio un error, al crear el modelo.');
                }
            });
    }; 
    function addMarca(){
        var marca = document.getElementById("marca_input").value;
        var dataString = 'marca_descripcion='+ marca;
        $.ajax({
                url: baseURL + "addMarca",
                type:"POST",
                data: dataString,
                dataType: 'json',
                success: function(data){
                    alert("Se creo la marca con éxito.");
                    $('#modal_marca').modal('hide');
                    var id_marca = data;
                    combo_marca = document.getElementById('marca_select');
                    var opt = document.createElement('option');
                    opt.value = id_marca;
                    opt.innerHTML = marca;
                    combo_marca.appendChild(opt);
                },
                error:function(data){
                    alert('Ocurio un error, al crear la marca.');
                }
            });
    };
</script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js"></script>
<script type="text/javascript">
    $(document).ready(function(){      
        $('#fecha').datepicker({
            autoclose: true,
            language: 'es',
            format: 'yyyy-mm-dd',
        });
    });    
</script>
<?php 
}
else
    redirect('accessDeny');
?>