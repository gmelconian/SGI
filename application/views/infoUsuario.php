<?php
    if (permiso(2)|| permiso(3)|| permiso(4)){
        $login = $userInfo->login;
        $name = $userInfo->nombres;
        $apellido = $userInfo->apellidos;
        $email = $userInfo->email;
        $mobile = $userInfo->telefono;
        $rolee = $userInfo->tipo;
        $names = $userInfo->nombre;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Información de usuario
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Detalles del usuario</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form   action="<?php echo base_url() ?>editUser" method="post" id="editUser" role="form">
                        <?php $this->load->helper('form'); ?>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label>Login</label>
                                        <input  class="form-control" readonly id="login"  name="login" value="<?php echo set_value('login', $login); ?>" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input readonly="readonly" type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email', $email); ?>" maxlength="128">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Nombre</label>
                                        <input readonly="readonly" type="text" class="form-control" id="fname" name="fname"  value="<?php echo set_value('fname', $name); ?>" maxlength="128" />    
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Apellido</label>
                                        <input readonly="readonly" type="text" class="form-control" id="apellido" name="apellido" maxlength="128" value="<?php echo set_value('apellido', $apellido); ?>">
                                    </div>
                                </div>
                            </div>
                             
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Teléfono Interno</label>
                                        <input readonly="readonly" type="text" class="form-control" id="mobile" name="mobile" value="<?php echo set_value('mobile', $mobile); ?>" maxlength="10">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Rol</label>
                                        <input readonly="readonly" type="text" readonly class="form-control" id="role" name="role" value="<?php echo $rolee; ?>">
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <a class="btn btn-primary" href="javascript:history.back()"> Volver Atrás</a>
                        </div>
                    </form>
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