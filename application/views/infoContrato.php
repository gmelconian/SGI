<?php 
if (permiso(2)|| permiso(3)|| permiso(4)){
    $codigo = $contrato->codigo;
    $descripcion = $contrato->descripcion;
    $fecha_creacion = $contrato->fecha_creacion;
    $fecha_vencimiento = $contrato->fecha_vencimiento;
    $nombre_cliente = $contrato->nombre_cliente;
    $archivo = $contrato->archivo;
    $periodicidad = $contrato->periodicidad;
    $total = $contrato->total;
    $res_total = $contrato->restante_total;
    $max_mensual = $contrato->max_mensual;
    $res_mensual = $contrato->restante_mensual;
    $tipo = $contrato->tipo;
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-bank"></i> Información de contrato
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Detalles del contrato</h3>
                    </div>
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="editContrato" action="<?php echo base_url().'editContrato/'.$contrato->codigo; ?>" method="post" role="form">
                        <div class="box-body">
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre del cliente</label>
                                        <input type="text" disabled class="form-control" id="nombre_cliente" name="nombre_cliente" value="<?php echo $nombre_cliente ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea disabled class="form-control" rows="3" id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
                                    </div>
                                </div>
                                <?php 

                                if (!empty($archivo)) {
                      # code...

                                  ?>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descargar Contrato</label>
                                        <a name="pdf" href="<?php echo base_url().$archivo; ?>"  title="Descargar"><i class="fa fa-file-pdf-o"></i></a>          
                                    </div>
                                </div>
                                <?php 


                            }
                            ?>
                        </div>

                        <div class="row oculto" id="div_2">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label>Catidad de visitas contratadas</label>
                                    <input readonly="readonly" type="text" class="form-control" id="cv" name="cv" value="<?php echo $total ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Catidad de visitas disponibles</label>
                                    <input disabled type="text" class="form-control" id="cvd" name="cvd" value="<?php echo $res_total ?>">
                                </div>
                            </div>  
                        </div>

                        <div class="row oculto" id="div_3">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label>Catidad máxima de visitas mensuales</label>
                                    <input readonly="readonly" type="text" class="form-control" id="mcv" name="mcv" value="<?php echo $max_mensual?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Catidad de visitas restantes del mes</label>
                                    <input disabled type="text" class="form-control" id="mcvd" name="mcvd" value="<?php echo $res_mensual?>">
                                </div>
                            </div>  
                        </div>

                        <div class="row oculto" id="div_1">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Periodicidad de visitas</label>
                                    <input disabled type="text" class="form-control" id="periodo" name="periodo" value="">
                                </div>
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fecha de creación</label>
                                    <input disabled type="text" class="form-control" id="fc" name="fc" value="<?php echo $fecha_creacion?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fecha de Vencimiento</label>
                                    <input disabled type="text" class="form-control" id="fv" name="fv" value="<?php echo $fecha_vencimiento?>">
                                </div>
                            </div>
                        </div>
                        <?php
                        $now = date("Y-m-d");
                        if($now >= $fecha_vencimiento || ($res_total == 0 && $tipo == 2)){
                            ?>    
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    $date1=new DateTime($fecha_creacion);
                                    $date2=new DateTime($fecha_vencimiento);

                                    $interval=$date1->diff($date2);
                                    $meses=$interval->format("%m");
                                    $anos = $interval->format("%y")*12;
                                    ?>
                                    <input type="checkbox" id="renueva" name="renueva" value="<?php echo $anos+$meses?>" onclick="vencimiento()"> ¿Desea renovar el contrato por <?php echo $anos+$meses?> meses?                                 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div>
                                        <br><br>
                                        <input type="submit" class="btn btn-success" value="Renovar" id="renovar" style="display: none">
                                    </div>
                                </div>

                                <?php        
                            }    
                            ?>

                            <a class="btn btn-primary" href="javascript:history.back()"> Volver Atrás</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>   
        
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
    </div>
</section>
</div>

<script language="javascript" type="text/javascript">
    $(document).ready(function(){
        $(".oculto").hide();
        var tipoC = "<?php echo $tipo;?>";
        if (tipoC == 1){
            $("#div_1").show();
            $("#div_2").hide();
            $("#div_3").hide();
        }
        if (tipoC == 2){
            $("#div_2").show();
            $("#div_3").show();
            $("#div_1").hide();
        }   
        
        var per = "<?php echo $periodicidad?>";
        switch(per) {
            case '1':
            document.getElementById("periodo").value = "Cada mes";
            break;
            case '3':
            document.getElementById("periodo").value = "Cada 3 mes";
            break;
            case '4':
            document.getElementById("periodo").value = "Cada 4 mes";
            break;
            case '6':
            document.getElementById("periodo").value = "Cada 6 mes";
            break;  
            case '12':
            document.getElementById("periodo").value = "Cada 1 año";
        }
    });
    
    function vencimiento() 
    {
        var checkBox = document.getElementById("renueva");
        if (checkBox.checked == true){
            document.getElementById("renovar").style.display = "block";
        } else {
            document.getElementById("renovar").style.display= "none";
        }
    };
</script>        
<?php 
}
else
    redirect('accessDeny');
?>