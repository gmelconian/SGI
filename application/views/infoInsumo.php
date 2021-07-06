<?php 
    if (permiso(2)|| permiso(3)|| permiso(4)){
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-Empresas"></i> Información de Insumos
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Información del insumo</h3>
                    </div>
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addInsumo" action="<?php echo base_url() ?>" enctype="multipart/form-data" method="post" role="form">
                        <div class="box-body">
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Tipo de Insumo</label>
                                        <input readonly type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $insumo->tipo; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label for="fname">Impresora relacionada al insumo</label>
                                        <input readonly type="text" class="form-control" id="tipo" name="impresora" value="<?php echo $insumo->impresora; ?>">
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea readonly maxlength="150" class="form-control" style="resize:none" rows="3" id="descripcion" name="descripcion"> <?php echo $insumo->descripcion; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Marca</label>
                                        <input readonly type="text" class="form-control" id="marca" name="marca" value="<?php echo $insumo->marca; ?>">    
                                    </div>   
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Modelo</label>
                                        <input readonly type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $insumo->modelo; ?>">    
                                    </div>    
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Cantidad de Copias</label>
                                        <input readonly type="text" class="form-control" id="copias" name="copias" value="<?php echo $insumo->copias;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cantidad</label>
                                        <input readonly type="text" class="form-control" id="cantidad" name="cantidad" value="<?php echo $insumo->cantidad; ?>">
                                    </div>
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Proveedor</label>
                                        <input readonly type="text" class="form-control" id="proveedor" name="proveedor" value="<?php echo $insumo->proveedor; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Factura</label>
                                        <br><a name="pdf" href="<?php echo base_url().$insumo->archivo_factura; ?>"  title="Descargar">Descargar Factura <i class="fa fa-file-pdf-o"></i></a>          
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha Factura</label>
                                        <input readonly type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $insumo->fecha; ?>">
                                    </div>
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Garantía</label>
                                        <input readonly type="text" min="1" class="form-control" id="garantia" name="garantia" value="<?php echo $insumo->garantia; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Expediente</label>
                                        <input readonly type="text" class="form-control" id="expediente" name="expediente" value="<?php echo $insumo->expediente; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a class="btn btn-primary" href="javascript:history.back()"> Volver Atrás</a>
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