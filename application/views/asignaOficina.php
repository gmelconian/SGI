<?php 
    if (permiso(2)||permiso(3)) {
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-bank"></i>Asignar Oficina a Persona
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Seleccione la Oficina</h3>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="personaUbicacion" action="<?php echo base_url() ?>personaUbicacion" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Persona</label>
                                        <input  class="form-control" readonly id="login"  name="login" value="<?php echo set_value('login', $login); ?>" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre de Oficina</label>
                                        <select class="form-control required" required id="oficina" name="oficina">
                                            <option value="0" selected="selected" disabled="disabled">Seleccione la Oficina</option>
                                            <?php
                                                if (!empty($oficina)) {
                                                    foreach($oficina as $prov){
                                                        switch ($prov->unidad) {
                                                            case 1:
                                                                $unidad="DGS";
                                                                break;
                                                            case 2:
                                                                $unidad="DINAVI";
                                                                break;
                                                            case 3:
                                                                $unidad="DINOT";
                                                                break;
                                                            case 4:
                                                                $unidad="DINAMA";
                                                                break;
                                                            case 5:
                                                                $unidad="DINAGUA";
                                                                break;
                                                        }
                                                        echo "<option value=".$prov->codigo.">".$unidad."-".$prov->nombre."</option>";
                                                    }
                                                }
                                            ?>
                                        </select>    
                                    </div>    
                                </div>                                
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Enviar" />
                                <input type="reset" class="btn btn-default" value="Limpiar">
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
