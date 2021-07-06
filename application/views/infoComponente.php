<?php 
    if (permiso(2)|| permiso(3)|| permiso(4)){
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-Empresas"></i> Informacion de Componentes
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="infoComponente" enctype="multipart/form-data" method="post" role="form">
                        <div class="box-body">
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Tipo de Componente</label>
                                        <input type="text" class="form-control required" id="tipo" name="tipo" disabled value="<?php echo $componente->tipo; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Detalle del Componente</label>
                                        <input type="text" class="form-control required" id="descripcion" disabled name="descripcion" value="<?php echo $componente->descripcion; ?>">
                                    </div>
                                </div>
                            </div>                                                       
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Marca</label>
                                        <input readonly type="text" class="form-control" id="marca" name="marca" value="<?php echo $componente->marca; ?>">    
                                    </div>   
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Modelo</label>
                                        <input readonly type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $componente->modelo; ?>">    
                                    </div>    
                                </div>
                            </div>
                            <div id="" class="row">                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cantidad</label>
                                        <input type="number" min="1" disabled class="form-control required" id="cantidad" name="cantidad" value="<?php echo $componente->cantidad; ?>">
                                    </div>             
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Proveedor</label>
                                        <input readonly type="text" class="form-control" id="proveedor" name="proveedor" value="<?php echo $componente->proveedor; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Factura</label>
                                        <br><a name="pdf" href="<?php echo base_url().$componente->archivo_factura; ?>"  title="Descargar">Descargar Factura <i class="fa fa-file-pdf-o"></i></a>          
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha Factura</label>
                                        <input readonly type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $componente->fecha; ?>">
                                    </div>
                                </div>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Garantía</label>
                                        <input readonly type="text" min="1" class="form-control" id="garantia" name="garantia" value="<?php echo $componente->garantia; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Expediente</label>
                                        <input readonly type="text" class="form-control" id="expediente" name="expediente" value="<?php echo $componente->expediente; ?>">
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