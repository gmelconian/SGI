<?php 
    if (permiso(2)) {
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-bank"></i> Alta de contrato
        </h1> 
    </section>
    <section class="content">        
        <div class="box box-primary">
            <div class="box-header">
            <h3 class="box-title">Ingresar detalles del contrato</h3>
        </div>
        <!-- form start -->
        <?php $this->load->helper("form"); ?>
        <form enctype="multipart/form-data" role="form" id="addContrato" method="post" role="form">
            <div class="box-body">
            <!--divrow-->
                <div id="" class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Proveedor</label>
                            <select required class="form-control custom-select" id="cliente" name="cliente">
                            <option value="0">Seleccione el cliente</option>
                            <?php
                                if (!empty($proveedores)) {
                                    foreach($proveedores as $prov){
                                        echo "<option value=".$prov->codigo.">".$prov->nombre_fantacia."</option>";
                                    }
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 oculto2">
                        <div class="form-group">
                            <label>Tipo de contrato</label>
                            <select required class="form-control custom-select" id="tipo" name="tipo">
                            </select>
                        </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea maxlength="150" class="form-control" style="resize:none" rows="3" id="descripcion" name="descripcion"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Adjuntar Contrato  (*PDF*)</label>
                            <input type="file" class="custom-file-input" name="pdf">
                        </div>
                    </div>
                </div>
                <div class="row oculto" id="div_2">
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label>Cantidad de visitas</label>
                            <input type="number" min="1" class="form-control" id="cv" placeholder="Cantidad de visitas" name="cv" maxlength="10">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cantidad maxima de visitas mensuales</label>
                            <input type="number" min="1" class="form-control" id="mcv" placeholder="Catidad maxima de visitas mensuales" name="mcv" maxlength="10">
                        </div>
                    </div>  
                </div>
                <div class="row oculto" id="div_1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control mr-sm-2 custom-select" id="periodo" name="periodo">
                                <option disabled selected="disabled" value="0">Seleccione la periodicidad de la visita</option>
                                <option value="1">Cada mes</option>
                                <option value="3">Cada 3 meses</option>
                                <option value="6">Cada 6 meses</option>
                                <option value="12">Cada 12 meses</option>
                            </select>
                        </div>
                    </div> 
                </div>
                <div class="row oculto3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Duración</label>
                            <select required class="form-control mr-sm-2 custom-select" id="duracion" name="duracion">
                                <option disabled selected="disabled" value="0">Duración del Contrato</option>
                                <option id="6" value="6">6 Meses</option>
                                <option value="12">12 Meses</option>
                                <option value="24">24 Meses</option>
                                <!-- <option value="1">Sin vencimiento</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha de Vencimiento</label>
                            <input required type="text" class="form-control" id="fecha" name="fecha" readonly="readonly">
                        </div>
                    </div>
                </div>  
                <div class="box-footer">
                    <input type="button" class="btn btn-primary" onclick="creaVisitaMantenimiento()" value="Enviar">
                    <input type="reset" class="btn btn-default" value="Limpiar">
                    <a class="btn btn-primary" href="javascript:location.href= baseURL + 'Contratos'"> Volver Atrás</a>
                </div>
            </div>
        </form>
        <div class="row">
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
    $(document).ready(function(){
        $(".oculto").hide();
        $(".oculto2").hide();
        $(".oculto3").hide();
        
        $("#tipo").change(function(){
            $(".oculto").hide();
            $(".oculto3").hide();
            $("#div_" + $(this).val()).show();
            $(".oculto3").show();
        });       
        
        $("#cliente").change(function(){
            var select2 = document.querySelector("#cliente");
            var cliente = select2.value;
            if (cliente == 0){
                $(".oculto").hide();
                $(".oculto2").hide();
                $(".oculto3").hide();
            }
            else{
                $(".oculto2").show();
                var dataString = 'cliente_login='+cliente;
                $.ajax({
                    url: baseURL + "getAllContratoCliente",
                    type:"POST",
                    data: dataString,
                    dataType: 'json',
                    success: function(data){
                        if(data == ''){
                            alert("Este cliente tiene todos sus contratos vigentes");
                            $('#tipo').find('option').remove();
                            $(".oculto").hide();
                            $(".oculto2").hide();
                            $(".oculto3").hide();
                            document.getElementById("cliente").selectedIndex = "0"; 
                            document.getElementById("tipo").selectedIndex = "0";
                            document.getElementById("duracion").selectedIndex = "0";
                            document.getElementById("fecha").value = "";
                        }
                        else{
                            $('#tipo').find('option').remove();
                            $('#tipo').append(data);
                            $(".oculto").hide();
                            $(".oculto3").hide();
                            document.getElementById("duracion").selectedIndex = "0";
                            document.getElementById("fecha").value = "";
                        }
                    },
                    error:function(data){
                        $(".oculto").hide();
                        $(".oculto2").hide();
                        $(".oculto3").hide();
                        alert("error");
                    }
                });
            }
        });
        
        var select = document.querySelector("#duracion");
        select.addEventListener('change', capturarValor);
        function capturarValor(){
            var duracion = select.value;
            var now = new Date();
            if (duracion == 1){
                document.getElementById("fecha").value = "Sin vencimiento";
            }else if(duracion == 6){
                var periodicidad = document.querySelector("#periodo").value;
                if(periodicidad>=6){
                    alert('La periodicidad debe ser menor que la duracion del contrato.');
                    document.querySelector("#duracion").value=0;
                    document.getElementById("fecha").value = "";
                }
                now.setMonth(now.getMonth() + 6);
                document.getElementById("fecha").value = now.toISOString().slice(0, 10);
            }else if(duracion == 12){
                var periodicidad = document.querySelector("#periodo").value;
                if(periodicidad>=12){
                    alert('La periodicidad debe ser menor que la duracion del contrato.');
                    document.querySelector("#duracion").value=0;
                    document.getElementById("fecha").value = "";
                }
                now.setMonth(now.getMonth() + 12);
                document.getElementById("fecha").value = now.toISOString().slice(0, 10);
            }else if(duracion == 24){
                now.setMonth(now.getMonth() + 24);
                document.getElementById("fecha").value = now.toISOString().slice(0, 10);
            }else if(duracion == 0){
                document.getElementById("fecha").value = "";
            }
        };
        
        $("#periodo").change(function(){
            var seleccion = document.querySelector("#periodo");
            var periodicidad = seleccion.value;
            if(periodicidad==0){
                $(".oculto3").hide();
                document.querySelector("#duracion").value=0;
            }
            else{
                $(".oculto3").show();
            }
        });
        
        $('#mcv').on('input', function(){
            var cant_visitas=document.getElementById("cv").value;
            var cant_mes=document.getElementById("mcv").value;
            var mensuales = cant_visitas / 4;
            if(cant_mes > mensuales)
            {
                alert('Las visitas mensuales tienen que ser 1/4 de las totales');
                document.getElementById("mcv").value='';
            }
        });
    });
</script>
<script language="javascript" type="text/javascript">
    function creaVisitaMantenimiento(){
        var dataString = $("#addContrato").serialize();
        $.ajax({
                url: baseURL + "addContrato",
                type:"POST",
                data: dataString,
                dataType: 'json',
                success: function(data){
                    alert('Se creo el contrato correctamente.');
                    var codigo_contrato = data;
                    var tipo=document.getElementById("tipo").value;
                    if(tipo == 1){
                        var periodo = document.querySelector("#periodo").value;
                        var vence = document.querySelector("#fecha").value;
                        var login = document.querySelector("#cliente").value;
                        var dataString = {
                                "periodicidad" : periodo,
                                "vencimiento" : vence,
                                "cliente" : login,
                                "contrato" : codigo_contrato,
                            };
                        $.ajax({
                            url: baseURL + "creaVisitaMantenimiento",
                            type:"POST",
                            data: dataString,
                            dataType: 'json',
                            success: function(data){
                                alert('Se crearon las visitar correspondientes al contrato.');
                            },
                            error:function(data){
                                alert('Ocurio un error.');
                            }
                        });
                    }
                    location.href= baseURL + "Contratos";
                },
                error:function(data){
                    alert('Ocurio un error, al crear el contrato.');
                }
            });
    }; 
</script>
<?php 
}
else
    redirect('accessDeny');
?>