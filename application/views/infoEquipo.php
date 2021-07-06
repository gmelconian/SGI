<?php 
    if (permiso(2)|| permiso(3)|| permiso(4)){
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-Empresas"></i> Información de Equipo
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Detalles del Equipo</h3>
                    </div>
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addEquipos" action="<?php echo base_url() ?>updateEquipos" method="post" role="form">
                        <div class="box-body">
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Nro de Serie</label>
                                        <input readonly type="text" class="form-control" id="serie" name="serie" maxlength="50" value="<?php echo $equipo->numero_serie; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea readonly maxlength="150" class="form-control" style="resize:none" rows="1" id="descripcion" name="descripcion"> <?php echo $equipo->descripcion; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Marca</label>
                                        <input readonly type="text" class="form-control" id="marca" name="marca" value="<?php echo $equipo->marca; ?>">    
                                    </div>   
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Modelo</label> 
                                        <input readonly type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $equipo->modelo; ?>">
                                    </div>    
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Nombre Host</label>
                                        <input readonly type="text" class="form-control" id="host" name="host" maxlength="50" value="<?php echo $equipo->host; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Número de Servicio</label>
                                        <input readonly type="text" class="form-control" id="servicio"  name="servicio" maxlength="50" value="<?php echo $equipo->servicio; ?>">
                                    </div>
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Proveedor</label>
                                        <input readonly type="text" class="form-control" id="proveedor" name="proveedor" value="<?php echo $equipo->proveedor; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Factura</label>
                                        <br><a name="pdf" href="<?php echo base_url().$equipo->archivo_factura; ?>"  title="Descargar">Descargar Factura <i class="fa fa-file-pdf-o"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha Factura</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input readonly type="text" class="form-control pull-right" id="fecha" name="fecha" value="<?php echo $equipo->fecha; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Garantía</label>
                                        <input readonly type="number" min="1" class="form-control" id="garantia" name="garantia" value="<?php echo $equipo->garantia; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Expediente</label>
                                        <input readonly type="text" class="form-control" id="expediente" name="expediente" value="<?php echo $equipo->expediente; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a class="btn btn-primary" href="javascript:history.back()"> Volver Atrás</a>
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
<?php 
}
else
    redirect('accessDeny');
?>