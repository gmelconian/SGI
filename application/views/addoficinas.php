<?php 
    if (permiso(2)) {
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-bank"></i>Nueva Oficina
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Ingresar detalles de la Oficina</h3>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addNewOficina" action="<?php echo base_url() ?>addNewOficina" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre *</label>
                                        <input type="text" class="form-control"  id="fname" placeholder="Nombre" name="fname" required  minlength="5" maxlength="50" pattern="[Aa-Zz]{1,15}"  value="<?php echo set_value('fname'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre de Edificio</label>
                                        <select class="form-control required" required id="edificio" name="edificio">
                                            <option value="0" selected="selected" disabled="disabled">Seleccione el edificio</option>
                                            <?php
                                                if (!empty($edificios)) {
                                                    foreach($edificios as $prov){
                                                        echo "<option value=".$prov->codigo.">".$prov->nombre."</option>";
                                                    }
                                                }
                                            ?>
                                        </select>    
                                    </div>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Unidad Ejecutora *</label>
                                    <select class="form-control required" required id="unidad" name="unidad">
                                        <option value="0" selected="selected" disabled="disabled">Seleccione la unidad</option>
                                        <option value="1" >DGS</option>
                                        <option value="2" >DINAVI</option>
                                        <option value="3" >DINOT</option>
                                        <option value="4" >DINAGUA</option>
                                        <option value="5" >DINAMA</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Piso</label>
                                        <input type="text" class="form-control" id="piso" required placeholder="Piso" name="piso" value="<?php echo set_value('piso'); ?>">
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <input type="text" class="form-control" id="telefono" placeholder="Telefono" name="telefono" value="<?php echo set_value('telefono'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Correo</label>
                                        <input type="email" class="form-control" id="correo"  placeholder="Correo electronico" name="correo" value="<?php echo set_value('correo'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Responsable</label>
                                    <input type="text" class="form-control" id="responsable" placeholder="Responsable" name="responsable" value="<?php echo set_value('responsable'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Referencia</label>
                                        <input type="email" class="form-control" id="referencia"  placeholder="Referencia" name="referencia" value="<?php echo set_value('referencia'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Enviar" />
                                <input type="reset" class="btn btn-default" value="Limpiar">
                                <a class="btn btn-primary" href="javascript:location.href= baseURL + 'oficina'"> Volver Atrás</a>
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
