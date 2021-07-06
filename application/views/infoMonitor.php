<?php 
    if (permiso(2)|| permiso(3)|| permiso(4)){
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-Empresas"></i> Informacion de Monitores
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="infoMonitor" action="<?php echo base_url(); ?>" enctype="multipart/form-data" method="post" role="form">
                        <div class="box-body">
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Nro de Serie</label>
                                        <input require type="text" disabled class="form-control required" id="serie" placeholder="Ingrese numero de serie" name="serie" maxlength="50" value="<?php echo $monitor->numero_serie; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea maxlength="150" disabled class="form-control" style="resize:none" rows="1" id="descripcion" name="descripcion"> <?php echo $monitor->descripcion; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pulgadas</label>
                                        <input type="number" disabled class="form-control required" id="pulgadas" name="pulgadas" value="<?php echo $monitor->pulgadas; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Marca</label>
                                        <input type="text"  disabled class="form-control required" id="marca" name="marca" value="<?php echo $monitor->marca; ?>">
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Modelo</label>
                                        <input type="text" disabled class="form-control required" id="modelo" name="modelo" value="<?php echo $monitor->modelo; ?>">
                                    </div>   
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Proveedor</label>
                                        <input type="text"  disabled class="form-control required" id="proveedor" name="proveedor" value="<?php echo $monitor->proveedor; ?>"> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Factura</label>
                                        <br><a name="pdf" href="<?php echo base_url().$monitor->archivo_factura; ?>"  title="Descargar">Descargar Factura <i class="fa fa-file-pdf-o"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha Factura</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="fecha" name="fecha" disabled value="<?php echo $monitor->fecha; ?>">
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Garantía</label>
                                        <input type="number" disabled class="form-control" id="garantia" name="garantia" value="<?php echo $monitor->garantia; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Expediente</label>
                                        <input type="text" disabled class="form-control" id="expediente" name="expediente" value="<?php echo $monitor->expediente; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a class="btn btn-primary" href="javascript:location.href= baseURL + 'monitores'"> Volver Atrás</a>
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
<?php 
}
else
    redirect('accessDeny');
?>