<?php 
    if (permiso(2)||permiso(3)) {
        $codigo = $userInfo->codigo;
        $apellido = $userInfo->razon_social;
        $email = $userInfo->email; 
        $telefono = $userInfo->telefono;
        $rut = $userInfo->rut;
        $contacto = $userInfo->contacto;
        $nombre_fantacia = $userInfo->nombre_fantacia;
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-bank"></i> Modificación Proveedores
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Modificar detalles del Proveedor</h3>
                    </div>
                    <?php $this->load->helper("form"); ?>
                    <form action="<?php echo base_url() . 'updateEmpresa/' . $codigo; ?>" method="post" id="editEmpresa" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="razon_social">Razón Social</label>
                                        <input class="form-control" id="razon_social" name="razon_social" value="<?php echo $apellido; ?>" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Nombre de fantacia</label>
                                        <input type="text" class="form-control" id="Nombre_fantacia" name="fname" value="<?php echo $nombre_fantacia; ?>" maxlength="128" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rut">Rut</label>
                                        <input type="number" required class="form-control" id="rut" placeholder="Rut" name="rut" value="<?php echo $rut; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contacto</label>
                                        <input type="text" required class="form-control required" id="contacto" name="contacto" maxlength="20" placeholder="Nombre de persona de Contacto" value="<?php echo $contacto; ?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Correo</label>
                                        <input type="email" class="form-control" id="email" placeholder="Ingrese su email" name="email" value="<?php echo  $email; ?>" maxlength="128" value="<?php echo set_value('email');?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telefono">Télefono</label>
                                        <input type="text" required class="form-control" id="telefono" placeholder="Numero de telefono" name="telefono" value="<?php echo $telefono; ?>" maxlength="10">
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Guardar" />
                            <a class="btn btn-primary" href="javascript:location.href= baseURL + 'empresas'"> Volver Atrás</a>                           
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
          <?php
            $this->load->helper('form');
              $error = $this->session->flashdata('error');
              if($error)
              {?>
            <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <?php echo $this->session->flashdata('error'); ?>                    
            </div>
              <?php } ?>
              <?php  
                $success = $this->session->flashdata('success');
                if($success){?>
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