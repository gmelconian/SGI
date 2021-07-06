<?php 
    if (permiso(2)||permiso(3)) {
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-bank"></i>Cambiar estado del Equipo
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Seleccione el nuevo estado</h3>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="personaUbicacion" action="<?php echo base_url().'cambiarEstado/'.$equipo."/".$tipo;?>" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Codigo Equipo</label>
                                        <input  class="form-control" readonly id="codigo"  name="codigo" value="<?php echo $equipo; ?>" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select class="form-control required" required id="estado" name="estado">
                                            <option value="0" selected="selected" disabled="disabled">Seleccione el estado</option>
                                            <option value="DISPONIBLE" >Disponible</option>
                                            <option value="DESECHADO" >Desechado</option>                                            
                                        </select>    
                                    </div>    
                                </div>                                
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Enviar" />
                                <input type="reset" class="btn btn-default" value="Limpiar">
                                <?php if ($tipo=="impresora") {?>
                                    <a class="btn btn-primary" href="javascript:location.href= baseURL + 'impresoras'"> Volver Atrás</a>
                                <?php } if ($tipo=="pc"){?>    
                                    <a class="btn btn-primary" href="javascript:location.href= baseURL + 'computadoras'"> Volver Atrás</a>
                                <?php } if ($tipo=="monitor"){?>
                                    <a class="btn btn-primary" href="javascript:location.href= baseURL + 'monitores'"> Volver Atrás</a>
                                <?php }?>
                            </div>
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
<?php 
}
else
    redirect('accessDeny');
?>