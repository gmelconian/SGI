<?php 
    if (permiso(2)|| permiso(3)|| permiso(4)){
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-bank"></i>Informacion de la Oficina
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="infoOficina" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre *</label>
                                        <input type="text" class="form-control"  id="fname" disabled name="fname" value="<?php echo $oficina->nombre; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre de Edificio</label>
                                        <input type="text" disabled class="form-control"  id="edificio" name="edificio" value="<?php echo $oficina->edificio; ?>"> 
                                    </div>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Unidad Ejecutora *</label>
                                    <?php 
                                        switch ($oficina->unidad) {
                                            case 1:
                                                    echo "<input type='text' disabled class='form-control'  id='uinidad' name='uinidad' value='DGS'>";
                                                break;
                                            case 2:
                                                    echo "<input type='text' disabled class='form-control'  id='uinidad' name='uinidad' value='DINAVI'>";
                                                break;
                                            case 3:
                                                    echo "<input type='text' disabled class='form-control'  id='uinidad' name='uinidad' value='DINOT'>";
                                                break;
                                            case 4:
                                                    echo "<input type='text' disabled class='form-control'  id='uinidad' name='uinidad' value='DINAGUA'>";
                                                break;
                                            case 5:
                                                    echo "<input type='text' disabled class='form-control'  id='uinidad' name='uinidad' value='DINAMA'>";
                                                break;                                                                    
                                        }                                                        
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Piso</label>
                                        <input type="text" class="form-control" id="piso" disabled name="piso" value="<?php echo $oficina->piso; ?>">
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <input type="text" class="form-control" id="telefono" disabled name="telefono" value="<?php echo $oficina->telefono; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Correo</label>
                                        <input type="text" class="form-control" id="correo"  disabled name="correo" value="<?php echo $oficina->correo; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Responsable</label>
                                    <input type="text" class="form-control" id="responsable" disabled name="responsable" value="<?php echo $oficina->responsable; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Referencia</label>
                                        <input type="email" class="form-control" id="referencia"  disabled name="referencia" value="<?php echo $oficina->referencia; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a class="btn btn-primary" href="javascript:history.back()"> Volver Atrás</a>
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

