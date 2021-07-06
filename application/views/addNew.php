<?php 
    if (permiso(2)) {
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Alta de usuario
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Ingresar detalles del usuario</h3>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addUser" action="<?php echo base_url() ?>addNewUser" enctype="multipart/form-data" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Nombre</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Nombre" name="fname" required pattern="[a-zA-Z]{1,60}" value="<?php echo set_value('fname'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 ocultar">
                                    <div class="form-group">
                                        <label for="fname">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido" required pattern="[a-zA-Z]{1,60}" value="<?php echo set_value('apellido'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ocultar">
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password" minlength="6" maxlength="100" pattern="(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*" title="La contraseña debe tener como minimo 6 digitos conteniendo al menos una mayúscula, una minúscula y un dígito" required value="<?php echo set_value('password'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 ocultar">
                                    <div class="form-group">
                                        <label for="cpassword">Confirme la contraseña</label>
                                        <input type="password" class="form-control required equalTo" id="cpassword" name="cpassword" minlength="6" maxlength="100" placeholder="Confirme contraseña" value="<?php echo set_value('cpassword'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Correo Electrónico</label>
                                        <input type="email" class="form-control required email" id="email" placeholder="Email" name="email" maxlength="50" value="<?php echo set_value('email'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Login</label>
                                        <input type="text" class="form-control required loginValidation" required id="login" placeholder="Login" name="login" minlength="5" maxlength="30" value="<?php echo set_value('login'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Teléfono interno</label>
                                        <input type="tel" class="form-control required digits" id="mobile" placeholder="Interno" name="mobile" minlength="4" maxlength="15" value="<?php echo set_value('mobile'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Rol</label>
                                        <select class="form-control required" id="role" name="role">
                                            <option disabled selected value="0"<?php set_select ( 'role' ,'0');?>>Seleccione un rol</option>
                                        <?php if (permiso()) { ?>
                                            <option value="Super Administrador" <?php set_select ( 'role' ,'Super Administrador');?>>Super Administrador</option>
                                        <?php } ?>    
                                            <option value="Administrador" <?php set_select ( 'role' ,'Administrador');?>>Administrador</option>
                                            <option value="Tecnico"<?php set_select ( 'role' ,'Tecnico');?>>Técnico</option>
                                            <option value="Consulta"<?php set_select ( 'role' ,'Consultas');?>>Consultas</option>
                                            <option value="Auditor"<?php set_select ( 'role' ,'Auditor');?>>Auditor</option>
                                            <option value="Persona"<?php set_select ( 'role' ,'Persona');?>>Persona</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Enviar" />
                                <input type="reset" class="btn btn-default" value="Limpiar" />
                                <a class="btn btn-primary" href="javascript:location.href= baseURL + 'userListing'"> Volver Atrás</a>
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
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){      
        $(".ocultar").hide();
        
        $('#role').change(function(){
            var role = $(this).val();
            if(role!="Persona"){
                $(".ocultar").show();
            }else $(".ocultar").hide();
        });
    });    
</script>
<?php 
}
else
    redirect('accessDeny');
?>