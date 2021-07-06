<?php 
    if (permiso(2)) {
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-bank"></i>Nuevo Proveedor
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Ingresar detalles del Provedor</h3>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addEmpresa" action="<?php echo base_url() ?>addNewEmpresa" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre Fantacía</label>
                                        <input type="text" class="form-control"  id="fname" placeholder="Nombre" name="fname" required  minlength="5" maxlength="50" pattern="[Aa-Zz]{1,15}"  value="<?php echo set_value('fname'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Razón Social</label>
                                        <input type="text" required class="form-control" id="razon_social" placeholder="Razon Social" name="razon_social" maxlength="50" minlength="6"  value="<?php echo set_value('razon_social'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rut">Rut</label>
                                        <input type="number" required class="form-control" id="rut" placeholder="Rut" name="rut" value="<?php echo set_value('rut'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contacto</label>
                                        <input type="text" required class="form-control required" id="contacto" name="contacto" maxlength="20" placeholder="Nombre de persona de Contacto" value="<?php echo set_value('contacto'); ?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Correo</label>
                                        <input type="email" required class="form-control required email" id="email" placeholder="Correo" name="email" maxlength="128" value="<?php echo set_value('email'); ?>">
                                    </div>
                                 </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" required class="form-control" id="telefono" placeholder="Telefono" name="telefono" value="<?php echo set_value('telefono'); ?>" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Enviar" />
                            <input type="reset" class="btn btn-default" value="Limpiar" />
                            <a class="btn btn-primary" href="javascript:location.href= baseURL + 'empresas'"> Volver Atrás</a>                           
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
              <?php
                $this->load->helper('form');
                $error = $this->session->flashdata('error');
                if ($error) { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?>
                <?php
                    $success = $this->session->flashdata('success');
                    if ($success) { ?>
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

<script src="<?php echo base_url(); ?>assets/js/addEmpresa.js" type="text/javascript"></script>
<?php 
}
else
    redirect('accessDeny');
?>