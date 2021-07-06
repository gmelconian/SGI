<?php 
    if (permiso(2)||permiso(3)) {
        $login = $userInfo->login;
        $name = $userInfo->nombres;
        $apellido = $userInfo->apellidos;
        $email = $userInfo->email;
        $mobile = $userInfo->telefono;
        $rolee = $userInfo->tipo;
        $names = $userInfo->nombre;
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Modificación de usuarios
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Modificar detalles del usuario</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo base_url() ?>editUser" method="post" id="editUser" role="form">
                        <?php $this->load->helper('form'); ?>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Login</label>
                                        <input class="form-control" readonly id="login" name="login" value="<?php echo set_value('login', $login); ?>" minlength="5" maxlength="30">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Ingrese su email" name="email" value="<?php echo set_value('email', $email); ?>" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Nombre</label>
                                        <input type="text" class="form-control" id="fname" name="fname" value="<?php echo set_value('fname', $name); ?>" pattern="[a-zA-Z]{1,60}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido" pattern="[a-zA-Z]{1,60}" value="<?php echo set_value('apellido', $apellido); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Teléfono</label>
                                        <input type="tel" class="form-control" id="mobile" placeholder="Mobile Number" name="mobile" value="<?php echo set_value('mobile', $mobile); ?>" minlength="8" maxlength="15">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Rol</label>
                                        <input type="text" readonly class="form-control" id="role" name="role" value="<?php echo $rolee; ?>">
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Actualizar" />
                            <a class="btn btn-primary" href="javascript:location.href= baseURL + 'userListing'"> Volver Atrás</a>
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
<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>
<?php 
}
else
    redirect('accessDeny');
?>