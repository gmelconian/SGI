<?php 
    if (permiso(2)||permiso(3)){
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-Empresas"></i> Actualizacion de Componentes
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Ingresar detalles del componentes</h3>
                    </div>
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="updateComponente" action="<?php echo base_url().'updateComponente/'. $componente->codigo; ?>" enctype="multipart/form-data" method="post" role="form">
                        <div class="box-body">
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Tipo de Componente</label>
                                        <input type="text" readonly class="form-control required" id="tipo" name="tipo" value="<?php echo $componente->tipo; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group oculto">
                                        <label for="fname">Detalle tipo Componente</label>
                                        <input type="text" class="form-control required" id="otro" placeholder="Ingrese detalle" name="otro" value="<?php echo $componente->descripcion;?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="oculto2">
                                <div class="row oculto3" id="div_TECLADO">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Puerto</label>
                                            <select class="form-control mr-sm-2 custom-select" id="puerto_teclado" name="puerto_teclado">
                                                <option disabled selected="disabled" value="0">Seleccione el puerto de conexion</option>
                                                <?php
                                                switch ($componente->puerto) {
                                                    case 'USB':
                                                        echo "<option selected value='USB'>USB</option>";
                                                        echo "<option value='PS2'>PS2</option>";
                                                        echo "<option value='INALAMBRICO'>INALAMBRICO</option>";
                                                        break;
                                                    case 'PS2':
                                                        echo "<option value='USB'>USB</option>";
                                                        echo "<option selected value='PS2'>PS2</option>";
                                                        echo "<option value='INALAMBRICO'>INALAMBRICO</option>";
                                                        break; 
                                                    case 'INALAMBRICO':
                                                        echo "<option value='USB'>USB</option>";
                                                        echo "<option value='PS2'>PS2</option>";
                                                        echo "<option selected value='INALAMBRICO'>INALAMBRICO</option>";
                                                        break;
                                                    default:
                                                        echo "<option value='USB'>USB</option>";
                                                        echo "<option value='PS2'>PS2</option>";
                                                        echo "<option value='INALAMBRICO'>INALAMBRICO</option>";
                                                        break;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 oculto4">
                                        <div class="form-group">
                                            <?php
                                                if($componente->tipo=='TECLADO'){
                                                    if ($componente->conex_puerto == 'conectorUSB')
                                                    {    
                                                    ?>
                                                            <label>Metodo de conexion del teclado</label><br>
                                                            <input type="radio" id="conex1" name="conex" value="bluetooth">
                                                            <span>Bluetooth</span>
                                                            <input type="radio" id="conex2" checked  name="conex" value="conectorUSB">
                                                            <span>Conector USB</span>
                                                    <?php
                                                    }elseif ($componente->conex_puerto == 'bluetooth')
                                                    {
                                                    ?>        
                                                        <label>Metodo de conexion del teclado</label><br>
                                                        <input type="radio" id="conex1" checked name="conex" value="bluetooth">
                                                        <span>Bluetooth</span>
                                                        <input type="radio" id="conex2" name="conex" value="conectorUSB">
                                                        <span>Conector USB</span>
                                                    <?php        
                                                    }
                                                }
                                            ?>       
                                        </div>
                                    </div>
                                </div>
                                <div class="row oculto3" id="div_RATON">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Puerto</label>
                                            <select class="form-control mr-sm-2 custom-select" id="puerto_raton" name="puerto_raton">
                                                <option disabled selected="disabled" value="0">Seleccione el puerto de conexion</option>
                                                <?php
                                                switch ($componente->puerto) {
                                                    case 'USB':
                                                        echo "<option selected value='USB'>USB</option>";
                                                        echo "<option value='PS2'>PS2</option>";
                                                        echo "<option value='INALAMBRICO'>INALAMBRICO</option>";
                                                        break;
                                                    case 'PS2':
                                                        echo "<option value='USB'>USB</option>";
                                                        echo "<option selected value='PS2'>PS2</option>";
                                                        echo "<option value='INALAMBRICO'>INALAMBRICO</option>";
                                                        break; 
                                                    case 'INALAMBRICO':
                                                        echo "<option value='USB'>USB</option>";
                                                        echo "<option value='PS2'>PS2</option>";
                                                        echo "<option selected value='INALAMBRICO'>INALAMBRICO</option>";
                                                        break;
                                                    default:
                                                        echo "<option value='USB'>USB</option>";
                                                        echo "<option value='PS2'>PS2</option>";
                                                        echo "<option value='INALAMBRICO'>INALAMBRICO</option>";
                                                        break;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 oculto5">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <?php
                                                if($componente->tipo=='RATON'){
                                                    if ($componente->conex_puerto == 'conectorUSB')
                                                    {    
                                                    ?>
                                                            <label>Metodo de conexion del raton</label><br>
                                                            <input type="radio" id="conex1" name="conex" value="bluetooth">
                                                            <span>Bluetooth</span>
                                                            <input type="radio" id="conex2" checked  name="conex" value="conectorUSB">
                                                            <span>Conector USB</span>
                                                    <?php
                                                    }elseif ($componente->conex_puerto == 'bluetooth')
                                                    {
                                                    ?>        
                                                        <label>Metodo de conexion del raton</label><br>
                                                        <input type="radio" id="conex1" checked name="conex" value="bluetooth">
                                                        <span>Bluetooth</span>
                                                        <input type="radio" id="conex2" name="conex" value="conectorUSB">
                                                        <span>Conector USB</span>
                                                    <?php        
                                                    }
                                                }
                                                ?>        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row oculto3" id="div_DISCO">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fname">Capacidad</label>
                                            <input type="number" class="form-control" step="10" id="capasidad" placeholder="Ingrese capacidad en GB" name="capasidad" value="<?php echo $componente->capasidad; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <select class="form-control mr-sm-2 custom-select" id="tipo_disco" name="tipo_disco">
                                                <option disabled selected="disabled" value="0">Seleccione el tipo de disco</option>
                                                <?php
                                                switch ($componente->tipo_disco) {
                                                    case 'SOLIDO':
                                                        echo "<option selected value='SOLIDO'>SOLIDO</option>";
                                                        echo "<option value='MECANICO'>MECANICO</option>";
                                                        echo "<option value='USB'>USB</option>";
                                                        break;
                                                    case 'MECANICO':
                                                        echo "<option value='SOLIDO'>SOLIDO</option>";
                                                        echo "<option selected value='MECANICO'>MECANICO</option>";
                                                        echo "<option value='USB'>USB</option>";
                                                        break; 
                                                    case 'USB':
                                                        echo "<option value='SOLIDO'>SOLIDO</option>";
                                                        echo "<option value='MECANICO'>MECANICO</option>";
                                                        echo "<option selected value='USB'>USB</option>";
                                                        break;
                                                    default:
                                                        echo "<option value='SOLIDO'>SOLIDO</option>";
                                                        echo "<option value='MECANICO'>MECANICO</option>";
                                                        echo "<option value='USB'>USB</option>";
                                                        break;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row oculto3" id="div_FUENTE">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                            <label for="fname">Potencia</label>
                                            <input type="number" class="form-control" step="50" id="potencia" placeholder="Ingrese potencia en W" name="potencia" value="<?php echo $componente->potencia; ?>">
                                        </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>                         
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Marca</label>
                                        <select class="form-control custom-select" id="marca_select" name="marca_select">
                                            <option selected="selected" value="0">Seleccione la marca</option>
                                            <?php
                                            if (!empty($marca)) {
                                                foreach ($marca as $ma) {
                                                    if ($ma->descripcion==$componente->marca)
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
                                                    if ($mo->descripcion==$componente->modelo) 
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
                                        <label>Cantidad</label>
                                        <input type="number" min="1" class="form-control required" id="cantidad" name="cantidad" value="<?php echo $componente->cantidad; ?>">
                                    </div>             
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Proveedor</label>
                                        <select class="form-control custom-select" id="proveedor_select" name="proveedor_select">
                                            <?php
                                            if (!empty($proveedor)) {
                                                foreach ($proveedor as $pro) {
                                                    if ($pro->codigo==$componente->codigo_proveedor) 
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
                                            <input type="text" class="form-control pull-right" id="fecha" name="fecha" value="<?php echo $componente->fecha; ?>">
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Garantía</label>
                                        <input type="number" min="1" class="form-control" id="garantia" name="garantia" value="<?php echo $componente->garantia; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Expediente</label>
                                        <input type="text" class="form-control" id="expediente" name="expediente" value="<?php echo $componente->expediente; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Actualizar">
                                <input type="reset" class="btn btn-default" value="Limpiar">
                                <a class="btn btn-primary" href="javascript:location.href= baseURL + 'componentes'"> Volver Atrás</a>
                            </div>
                        </div>
                    </form>
                </div><!-- div box-->
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
        <!-- div section principal-->
    </section>
</div>
<script language="javascript" type="text/javascript">
    function addModelo(){
        var modelo = document.getElementById("modelo_input").value;
        var dataString = {
                "modelo_descripcion" : modelo,
                "origen" : "COMPONENTE",
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
        $(".oculto").hide();
        $(".oculto2").hide();
        $(".oculto3").hide();
        $(".oculto4").hide();
        $(".oculto5").hide();
        
        var tipo = document.getElementById("tipo").value;
        if (tipo == 'OTRO'){
            $(".oculto2").hide();
            $(".oculto3").hide()
            $(".oculto").show();
        }
        else if (tipo != 'OTRO' || tipo != 0){
            $(".oculto").hide();
            $(".oculto3").hide()
            $(".oculto2").show();
            $("#div_" + tipo).show();
        }
        else{
            $(".oculto").hide();
            $(".oculto2").hide();
            $(".oculto3").hide()
        }
        
        if (tipo == 'TECLADO'|| tipo == 'RATON'){
            var teclado = document.getElementById("puerto_teclado").value;
            if (teclado == 'INALAMBRICO'){
                $(".oculto4").show();
            }    
            var raton = document.getElementById("puerto_raton").value;
            if (raton == 'INALAMBRICO'){
                $(".oculto5").show();
            }    
        }
                
        $("#puerto_teclado").change(function(){
            var seleccion = document.querySelector("#puerto_teclado");
            var puerto = seleccion.value;
            if (puerto == 'INALAMBRICO'){
                $(".oculto4").show();
            }
            else $(".oculto4").hide();
        });
        $("#puerto_raton").change(function(){
            var seleccion = document.querySelector("#puerto_raton");
            var puerto = seleccion.value;
            if (puerto == 'INALAMBRICO'){
                $(".oculto5").show();
            }
            else $(".oculto5").hide();
        });
        
        $('#fecha').datepicker({
            autoclose: true,
            language: 'es',
            format: 'yyyy-mm-dd',
        });
        
        $('#marca_select').change(function(){
            var marca = $(this).val();
            var dataString = {
                    "codigo_marca" : marca,
                    "tipo" : "COMPONENTE", 
                };
            if(marca==0){ 
                $.ajax({
                    url: baseURL + "getModelos",
                    type:"POST",
                    dataType: 'json',
                    data: dataString,
                    success: function(data){
                        $('#modelo_select').find('option').remove();
                        $('#modelo_select').append(data);
                    },
                    error:function(data){
                        alert('Ocurio un error, no fue posible obtener el listado de modelos.');
                    }
                });
            }
            else{
                $.ajax({
                    url: baseURL + "getModeloMarca",
                    type:"POST",
                    dataType: 'json',
                    data: dataString,
                    success: function(data){
                        $('#modelo_select').find('option').remove();
                        $('#modelo_select').append(data);
                    },
                    error:function(data){
                        alert('No existen modelos asociados para esa marca.');
                        $('#modelo_select').find('option').remove();
                        $.ajax({
                            url: baseURL + "getModelos",
                            type:"POST",
                            dataType: 'json',
                            data: dataString,
                            success: function(data){
                                $('#modelo_select').find('option').remove();
                                $('#modelo_select').append(data);
                            },
                            error:function(data){
                                alert('Ocurio un error, no fue posible obtener el listado de modelos.');
                            }
                        });
                    }
                });
            }    
        });
    });    
</script>
<?php 
}
else
    redirect('accessDeny');
?>