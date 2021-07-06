<?php 
    if (permiso(2)||permiso(3)||permiso(4)||permiso(5)) {
        $userId = $userInfo->login;
        $name = $userInfo->nombres;
        $apellido = $userInfo->apellidos;
        $email = $userInfo->email;
        $mobile = $userInfo->telefono;
        $role = $userInfo->tipo;
        $names = $userInfo->nombre;
        $foto = $userInfo->foto;
        $notifica = $userInfo->notificacion;

        if ($foto == NULL)
            $foto = 'subir.jpg';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-user-circle"></i> Mi perfil
            <small>Ver o modificar información</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-3">
                <!-- general form elements -->
                <div class="box box-warning">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();
                        echo ("./assets/dist/img/perfil/" . $foto); ?>" alt="User profile picture">
                        <h3 class="profile-username text-center"><?= $names ?></h3>

                        <p class="text-muted text-center"><?= $role ?></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right"><?= $email ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Int.</b> <a class="pull-right"><?= $mobile ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="<?= ($active == "details") ? "active" : "" ?>"><a href="#details" data-toggle="tab">Detalles</a></li>
                        <li class="<?= ($active == "changepass") ? "active" : "" ?>"><a href="#changepass" data-toggle="tab">Cambiar contraseña</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="<?= ($active == "details") ? "active" : "" ?> tab-pane" id="details">
                            <form enctype="multipart/form-data" action="<?php echo base_url() ?>profileUpdate" method="post" id="editProfile" role="form">
                                <?php $this->load->helper('form'); ?>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">Nombres</label>
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="<?php echo $name; ?>" value="<?php echo set_value('fname', $name); ?>" required pattern="[a-zA-Z]{1,60}" />

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="apellido">Apellidos</label>
                                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="<?php echo $apellido; ?>" value="<?php echo set_value('apellido', $apellido); ?>" required pattern="[a-zA-Z]{1,60}" />

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Número de teléfono</label>
                                                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="<?php echo $mobile; ?>" minlength="4" maxlength="15" value="<?php echo set_value('mobile', $mobile); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Notificaciones correo</label><br>
                                                <?php
                                                log_message('error', $notifica);
                                                if ($notifica == 1) {
                                                    echo "<input checked type='checkbox' data-on='SI' data-off='NO' data-onstyle='success' data-offstyle='danger' data-toggle='toggle' id='notifica' name='notifica'>";
                                                } else {
                                                    echo "<input type='checkbox' data-on='SI' data-off='NO' data-onstyle='success' data-offstyle='danger' data-toggle='toggle' id='notifica' name='notifica'>";
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $email; ?>" maxlength="50" value="<?php echo set_value('email', $email); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Foto de perfil</label>
                                                <input type="file" accept="image/png, .jpeg, .jpg, image/gif" id="mi_archivo" class="custom-file-input" name="mi_archivo">
                                            </div>
                                        </div>

                                    </div>


                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" value="Guardar cambios" />

                                </div>
                            </form>
                        </div>
                        <div class="<?= ($active == "changepass") ? "active" : "" ?> tab-pane" id="changepass">
                            <form role="form" action="<?php echo base_url() ?>changePassword" method="post">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputPassword1">Contraseña anterior</label>
                                                <input type="password" class="form-control" id="inputOldPassword" placeholder="Contraseña anterior" name="inputOldPassword" maxlength="20" required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputPassword1">Nueva contraseña</label>
                                                <input type="password" class="form-control" id="newPassword" placeholder="Nueva contraseña" name="newPassword" maxlength="20" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputPassword2">Confirmar nueva contraseña</label>
                                                <input type="password" class="form-control" id="cNewPassword" placeholder="Confirme contraseña" name="cNewPassword" maxlength="20" required>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->

                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" value="Actualizar" />
                                    <input type="reset" class="btn btn-default" value="Limpiar" />
                                </div>
                            </form>
                        </div>
                </div>
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

            <?php
            $noMatch = $this->session->flashdata('nomatch');
            if ($noMatch) {
                ?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('nomatch'); ?>
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
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
<?php 
}
else
    redirect('accessDeny');
?>